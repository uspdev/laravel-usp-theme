<?php

namespace Uspdev\UspTheme;

use Uspdev\UspTheme\Events\UspThemeParseKey;

class UspTheme
{
    /**
     * Adiciona no menu o $item em $key
     * Não é persistente, ou seja, deve ser atribuído a cada requisição
     */
    public function addMenu(String $key, array $item)
    {
        session()->now(config('laravel-usp-theme.session_key') . '.menu.' . $key, $item);
    }

    /**
     * Define o item de menu ativo
     * Não é persistente, ou seja, deve ser atribuído a cada requisição
     */
    public function activeUrl(String $url)
    {
        session()->now(config('laravel-usp-theme.session_key') . '.active_url', $url);
    }

    /**
     * Muda o skin para a sessão corrente.
     * Substitui o valor do .env
     */
    public function setSkin(String $skin)
    {
        if (empty($skin)) {
            session()->put(config('laravel-usp-theme.session_key'), ['skin' => null]);
        } else {
            session()->put(config('laravel-usp-theme.session_key'), ['skin' => $skin]);
        }
    }

    /**
     * Retorna o nome do skin em uso
     */
    public function getSkin()
    {
        return session()->get(config('laravel-usp-theme.session_key') . '.skin') ?? config('laravel-usp-theme.skin');
    }

    /**
     * Percorre o menu fazendo vários tratamentos
     */
    public function parseMenu($menu)
    {
        $out = [];
        foreach ($menu as $item) {
            foreach (SELF::parseKey($item) as $item) {
                $item = SELF::parseSubmenu($item);
                $item = SELF::parseItem($item);
                if ($item) {$out[] = $item;} // eliminando se false
            }
        }
        // dd($out, session(config('laravel-usp-theme.session_key') . '.active_url'));
        return $out;
    }

    /**
     * Trata o submenu
     */
    protected static function parseSubmenu($item)
    {
        if (isset($item['submenu'])) {
            // vamos tratar cada item do submenu e eliminar os falses
            $item['submenu'] = array_filter(array_map('SELF::parseItem', $item['submenu']));

            # adiciona a class active no menu pai
            if (in_array('active', array_column($item['submenu'], 'class'))) {
                $item['class'] = 'active';
            }
        }

        # alinhamento do submenu opcional à direita
        if (isset($item['align']) && $item['align'] == 'right') {
            $item['align'] = 'dropdown-menu-right';
        } else {
            $item['align'] = '';
        }

        return $item;
    }

    /**
     * Trata as coisas de um item
     */
    protected static function parseItem($item)
    {
        if ($item = SELF::evaluateCan($item)) { // pode retornar false
            $item = SELF::addActiveClass($item);
            $item = SELF::parseTitleTarget($item);
        };

        return $item;
    }

    /**
     * Mescla o menu dinâmico usando key. Se não houver menu para inserir, o item será removido.
     */
    protected static function parseKey($item)
    {
        // primeiro verifica por evento.
        // Vamos retornar a 1a resposta do evento que tenha conteúdo
        if (isset($item['key'])) {
            foreach (event(new UspThemeParseKey($item)) as $eventItem) {
                if (!isset($eventItem['key'])) {
                    $item = $eventItem;
                }
            }
        }

        // depois verifica por sessão.
        if (isset($item['key'])) {
            $item = session(config('laravel-usp-theme.session_key') . '.menu.' . $item['key'], []);
        }

        // vamos remover o item se não houver menu dinamico correspondente
        if (isset($item['key'])) {
            return [];
        }

        // vamos retornar sempre na forma de lista
        return has_string_keys($item) ? [$item] : $item;
    }

    /**
     * Remove o item do menu se o gate não permitir
     */
    protected static function evaluateCan($item)
    {
        // sem can ou se vazio é livre
        if (empty($item['can'])) {
            return $item;
        }

        // com can vamos testar o gate
        return \Gate::check($item['can']) ? $item : false;
    }

    /**
     * Insere a classe 'active' no item quando setado em activeUrl()
     */
    protected static function addActiveClass($item)
    {
        $item['class'] = !isset($item['class']) ? '' : $item['class'];
        if (isset($item['url']) && session(config('laravel-usp-theme.session_key') . '.active_url') == $item['url']) {
            $item['class'] = 'active';
        }
        return $item;
    }

    /**
     * Insere valores default em title e target caso não estejam presentes
     */
    protected static function parseTitleTarget($item)
    {
        if (!isset($item['title'])) {
            $item['title'] = isset($item['text']) ? strip_tags($item['text']) : '';
        }

        $item['target'] = isset($item['target']) ? $item['target'] : '';

        return $item;
    }
}
