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

            if (!$item = SELF::parseKey($item)) { // pode retornar array vazio, registro (array simples) ou coleção (array de arrays)
                // se vazio vamos para o próximo item
                continue;
            }

            if (\has_string_keys($item)) { // registro (array simples)
                $item = SELF::evaluateCan($item); // pode retornar null
                $item = SELF::submenuAddRight($item);
                $item = SELF::addActiveClass($item);
                $item = SELF::parseTitleTarget($item);
                $out[] = $item;
            } else { // coleção, vamos iterar sobre cada item
                $itens = $item;
                foreach ($itens as $item) {
                    $item = SELF::evaluateCan($item); // pode retornar null
                    $item = SELF::submenuAddRight($item);
                    $item = SELF::addActiveClass($item);
                    $item = SELF::parseTitleTarget($item);
                    $out[] = $item;
                }
            }
        }
        return $out;
    }

    /**
     * Mescla o menu dinâmico usando key. Se não houver menu para inserir, o item será removido.
     */
    protected function parseKey($item)
    {
        // primeiro verifica por evento. Se não processar, retorna $item intacto
        // se sim, substitui pelo conteúdo correspondente.
        // processa somente a 1a resposta ao evento
        if (isset($item['key'])) {
            $item = event(new UspThemeParseKey($item))[0] ?? $item;
        }

        // depois verifica por sessão.
        if (isset($item['key'])) {
            $item = session(config('laravel-usp-theme.session_key') . '.menu.' . $item['key'], []);
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
     * Alinhamento do submenu opcional à direita
     */
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
