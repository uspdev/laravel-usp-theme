# Pacote de tema do Laravel para projetos USPdev

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


## Requisitos

Este tema foi testado no Laravel 5.6.x e 7.24.x mas deve funcionar em outras versões.

Ele é baseado no bootstrap 4.4 então todos os estilos dele estão disponíveis.

Possui também pré-carregado:
- fontawesome
- jquery
- jqueryUI
- datatables
- select2
- datepicker

## Instalação

Se você vai iniciar uma nova aplicação, instale o laravel primeiro:

    composer create-project --prefer-dist laravel/laravel minha_aplicacao

Se você já tem uma aplicação laravel ou com a nova aplicação 
que você criou instale o tema usando o composer:

    composer require uspdev/laravel-usp-theme

Publique os assets manualmente

    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force

ou configure o composer.json da sua aplicação para publicar automaticamente 
acrescentando a linha acima na seção `scripts`->`post-autoload-dump`. Veja um exemplo:

    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi",
            "@php artisan vendor:publish --provider='Uspdev\\UspTheme\\ServiceProvider' --tag=assets --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi"
        ]
    }


Publique os arquivos de configuração:

    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=config

Edite o arquivo com as variáveis de seu ambiente:

 - config/laravel-usp-theme.php

 Nesse arquivo a variável ```'can' => 'admin'``` controla a disponibilidade 
 dos itens do menu conforme os gates configurados na aplicação. 
 Se can estiver vazio, ```'can' => ''```, o menu será exibido sempre. 
 Para que o menu apareça somente para o gate ```admin``` por exemplo, 
 use ```'can' => 'admin'```. É possível que o menu tenha itens com subitens 
 no estilo dropdown, para isso, em um item do array do menu crie uma chave 
 *submenu* com um array seguindo a mesma estrutura do array principal.

É possível colocar ícones no menu ou outro elemento html.

Há outros exemplos de configurações possíveis no próprio arquivo.

## Configure o .env

Pode-se habilitar link para outros sistemas. Aparecerá na barra de menu, à esquerda. Para isso coloque no .env algo do tipo:

    USP_THEME_SISTEMAS_1='{"text":"Pessoas","url":"http://localhost/pessoas"}'
    USP_THEME_SISTEMAS_2='{"text":"LDAP","url":"http://localhost/ldap"}'


Por fim, estenda o **laravel-usp-theme master** no template do seu projeto:

    @extends('laravel-usp-theme::master')

Seções disponíveis:

 - title
 - content
 - footer

Seções para css e javascript:

 - styles
 - javascripts_head
 - javascripts_bottom

Exemplo básico:

    @extends('laravel-usp-theme::master')

    @section('title') Sistema USP @endsection

    @section('content')
        Seu código
    @endsection

    @section('footer')
        Seu código
    @endsection

## Changelog

28/08/2020
* Layout responsivo com suporte mobile: ajustes no menu
* Organizando js e css
* Exemplo das bibliotecas js carregadas