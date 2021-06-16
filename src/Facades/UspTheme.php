<?php

namespace Uspdev\UspTheme\Facades;

use Illuminate\Support\Facades\Facade;

class UspTheme extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'uspTheme';
    }
}