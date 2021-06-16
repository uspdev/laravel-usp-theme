<?php

namespace Uspdev\UspTheme;
use Illuminate\Support\Facades\Session;

class UspTheme
{

    public function parseMenu($menu)
    {
        foreach ($menu as $k => &$item) {
            if (!$item = UspTheme::parseKey($item)) {
                unset($menu[$k]);
                continue;
            }
            if (!$item = UspTheme::parseCan($item)) {
                unset($menu[$k]);
                continue;
            }

            $item = UspTheme::submenuAddRight($item);
            $item = UspTheme::addActiveClass($item);
            $item = UspTheme::parseTitleTarget($item);
        }
        return $menu;
    }

    # alinhamento do submenu opcional à direita
    public function submenuAddRight($item)
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
    public function parseKey($item)
    {
        if (isset($item['key'])) {
            $s = session('laravel-usp-theme.' . $item['key']);
            if (empty($s)) {
                return false;
            }
            $item = array_merge($item, $s);
        }
        return $item;
    }

    /**
     * Insere a classe 'active' no item quando necessário
     */
    public function addActiveClass($item)
    {
        if (isset($item['url']) && session('laravel-usp-theme.active_url') == $item['url']) {
            $item['class'] = 'active';
        } else {
            $item['class'] = '';
        }
        return $item;
    }

    /**
     * Remove o item se o gate não permitir
     */
    public function parseCan($item)
    {
        if (empty($item['can'])) {
            // sem can é livre
            return $item;
        } else if (\Gate::check($item['can'])) {
            // vamos testar o gate
            return $item;
        }
        return false;
    }

    /**
     * Inser valores default em title e target caso não estejam presentes
     */
    public function parseTitleTarget($item)
    {
        if (!isset($item['title'])) {
            $item['title'] = strip_tags($item['text']);
        }
        if (!isset($item['target'])) {
            $item['target'] = '';
        }
        return $item;
    }

    /**
     * Adiciona o $item em $key somente para o request corrente.
     */
    public function addKey(String $key, Array $item)
    {
        Session::now('laravel-usp-theme.'.$key, $item);
    }

    public function activeUrl( String$url)
    {
        Session::now('laravel-usp-theme.active_url', $url);
    }
}
