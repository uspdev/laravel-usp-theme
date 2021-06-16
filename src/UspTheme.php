<?php

namespace Uspdev\UspTheme;

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
     * Percorre o menu fazendo vários tratamentos
     */
    public function parseMenu($menu)
    {
        foreach ($menu as $k => &$item) {
            if (!$item = SELF::parseKey($item)) {
                unset($menu[$k]);
                continue;
            }
            if (!$item = SELF::evaluateCan($item)) {
                unset($menu[$k]);
                continue;
            }
            $item = SELF::submenuAddRight($item);
            $item = SELF::addActiveClass($item);
            $item = SELF::parseTitleTarget($item);
        }
        return $menu;
    }

    # alinhamento do submenu opcional à direita
    protected function submenuAddRight($item)
    {
        if (isset($item['submenu']) && isset($item['align']) && $item['align'] == 'right') {
            $item['align'] = 'dropdown-menu-right';
        } else {
            $item['align'] = '';
        }
        return $item;
    }

    /**
     * Mescla o menu dinâmico usando key. Se não houver menu para inserir, o item será removido.
     */
    protected function parseKey($item)
    {
        if (isset($item['key'])) {
            $s = session(config('laravel-usp-theme.session_key') . '.menu.' . $item['key']);
            if (empty($s)) {
                return false;
            }
            $item = array_merge($item, $s);
        }
        return $item;
    }

    /**
     * Insere a classe 'active' no item quando setado em activeUrl()
     */
    protected function addActiveClass($item)
    {
        if (isset($item['url']) && session(config('laravel-usp-theme.session_key') . '.active_url') == $item['url']) {
            $item['class'] = 'active';
        } else {
            $item['class'] = '';
        }
        return $item;
    }

    /**
     * Remove o item do menu se o gate não permitir
     */
    protected function evaluateCan($item)
    {
        if (empty($item['can'])) {
            // sem can ou se vazio é livre
            return $item;
        } else if (\Gate::check($item['can'])) {
            // com can vamos testar o gate
            return $item;
        }
        return false;
    }

    /**
     * Insere valores default em title e target caso não estejam presentes
     */
    protected function parseTitleTarget($item)
    {
        if (!isset($item['title'])) {
            $item['title'] = strip_tags($item['text']);
        }
        if (!isset($item['target'])) {
            $item['target'] = '';
        }
        return $item;
    }
}
