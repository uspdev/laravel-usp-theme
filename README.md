# Laravel theme for USP projects

![theme image](https://raw.githubusercontent.com/uspdev/laravel-usp-theme/master/docs/theme.png)
static files: https://www.ime.usp.br/~marcelom/template/

To install the package:

    composer require uspdev/laravel-usp-theme

Extends **laravel-usp-theme master** on your template:

    @extends('laravel-usp-theme::master')

Sections availables:

 - title
 - sitename
 - menu
 - content
 - stylesheets (it is a good idea to use: *{{ parent() }}*)
 - javascripts (it is a good idea to use: *{{ parent() }}*)

Publish assets configuring in your webpack.mix.js:

    TODO: inserir comandos

An example that can be inserted in your base.html.twig:

    @extends('laravel-usp-theme::master')

    @section('title') Sistema USP @endsection

    @section('menu')
    <ul>
        <li> <a href="#"> Sobre </a> </li>
    </ul>
    @endsection

    @section('content')
        Seu código
    @endsection
