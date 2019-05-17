# Laravel package theme for USP projects

Desenvolver um sistema web é uma atividade que envolve diversas camadas
de complexidade e é natural termos mais habilidade ou gosto por apenas
uma ou algumas dessas camadas.
Esse pacote laravel é um template com alguns estilos da USP
é direcionado para aqueles(as) que preferem se debruçar
no desenvolvimento do backend com laravel sem se preocupar muito
com frontend, evita também que fiquemos copiando código do template
de um projeto para o outro. Foi inspirado no [adminLte para laravel](https://github.com/jeroennoten/Laravel-AdminLTE)
e está aberto a contribuições e melhorias dos devs da USP.
Inicialmente desenvolvido por [@marcelomodesto](https://github.com/marcelomodesto) do IME-USP.

![theme image](https://raw.githubusercontent.com/uspdev/laravel-usp-theme/master/docs/example.png)

Para instalação, use o composer:

    composer require uspdev/laravel-usp-theme

Publique os assets:

    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force

E por fim os arquivos de configuração:

    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=config

Edite o arquivo com as variáveis de seu ambiente:

 - config/laravel-usp-theme.php

Por fim, extenda o **laravel-usp-theme master** no template do seu projeto:

    @extends('laravel-usp-theme::master')

Seçoes disponíveis:

 - title
 - content
 - stylesheets (it is a good idea to use: *{{ parent() }}*)
 - javascripts (it is a good idea to use: *{{ parent() }}*)

Exemplo básico:

    @extends('laravel-usp-theme::master')

    @section('title') Sistema USP @endsection

    @section('content')
        Seu código
    @endsection
