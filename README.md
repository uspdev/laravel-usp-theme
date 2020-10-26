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

![theme image](https://raw.githubusercontent.com/uspdev/laravel-usp-theme/master/docs/tela-principal.png)

## Funcionalidades

Estão disponíveis no template:

* Uma bara com o logo da USP que não aparece no tamanho sm (mobile);
* Uma faixa amarela e azul com as informações de usuário/login/logout à direita;
* Uma barra de menus e sub-menus totalmente configurável;
* Possibilidade de oferecer link para outras aplicações da Unidade;

O tema possui as seguintes bibliotecas incorporadas:
- bootstrap 4.4
- jquery
- jqueryUI
- fontawesome
- datatables
- select2
- datepicker

## Requisitos

Este tema foi testado no Laravel 5.6.x e 7.24.x mas deve funcionar em outras versões.

## Instalação

Se você vai iniciar uma nova aplicação, instale o laravel primeiro:

    composer create-project --prefer-dist laravel/laravel minha_aplicacao

Se você já tem uma aplicação laravel ou com a nova aplicação 
que você criou instale o tema usando o composer:

    composer require uspdev/laravel-usp-theme

Publique os arquivos de configuração:

    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=config

Edite o arquivo para personalizar os menus:

    config/laravel-usp-theme.php

Nesse arquivo, há um exemplo de configurações possíveis para o menu.

A variável ```'can' => 'admin'``` controla a disponibilidade 
dos itens do menu conforme os gates configurados na aplicação. 
Se can estiver vazio, ```'can' => ''```, o menu será exibido sempre. 
Para que o menu apareça somente para o gate ```admin``` por exemplo, 
use ```'can' => 'admin'```. 

É possível que o menu tenha itens com subitens no estilo dropdown, para isso, em um item do array do menu crie uma chave *submenu* com um array seguindo a mesma estrutura do array principal.

É possível colocar ícones (fontawesome) no menu ou outro elemento html.


## Configuração da aplicação

Para poder utilizar o tema, algumas configurações são necessárias.

### Configure o composer.json

Na sua aplicação, configure o composer.json para publicar automaticamente os assets do laravel-usp-theme acrescentando a linha 

    "@php artisan vendor:publish --provider=\"Uspdev\\UspTheme\\ServiceProvider\" --tag=assets --force"

na seção `scripts`->`post-autoload-dump`. Veja um exemplo:

    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi",
            "@php artisan vendor:publish --provider=\"Uspdev\\UspTheme\\ServiceProvider\" --tag=assets --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi"
        ]
    }

Após a inserção da linha mencionada, executar o comando:

    composer install

### Estenda o **laravel-usp-theme master** no template do seu projeto

Edite o seu arquivo ```resources/views/index.blade.php``` e coloque:

    @extends('laravel-usp-theme::master')

Seções disponíveis:

 - title
 - content
 - footer

Seções para css e javascript:

 - styles
 - javascripts_head (carregado antes das bibliotecas incorporadas)
 - javascripts_bottom (carregado depois das bibliotecas incorporadas)

Exemplo básico:

    @extends('laravel-usp-theme::master')

    @section('title') Sistema USP @endsection

    @section('content')
        Seu código
    @endsection

    @section('footer')
        Seu código
    @endsection

    @section('javascripts_bottom')
    @parent
        Seu código .js
    @endsection 


### Configure o .env.example

O laravel-usp-theme é uma biblioteca que funciona junto com uma aplicação laravel e pode usar configurações no .env. Para isso você deve instruir o .env.example adequadamente. Exemplo:

    # https://github.com/uspdev/laravel-usp-theme
    # O laravel-usp-theme permite que seja criado links 
    # para outras aplicações da unidade
    # USP_THEME_SISTEMAS_1='{"text":"Pessoas","url":"http://localhost/pessoas"}'
    # USP_THEME_SISTEMAS_2='{"text":"LDAP","url":"http://localhost/ldap"}'


![theme image](https://raw.githubusercontent.com/uspdev/laravel-usp-theme/master/docs/tela-outros-sistemas.png)

Esta configuração irá habilitar o link para outros sistemas. Aparecerá na barra de menu, à esquerda.

## Opções do menu

Há dois menus principais, um alinhado à esquerda e outro alinhado à direita. Veja o arquivo de configuração como exemplo.

Cada item do menu principal pode conter os seguintes atributos:
* **text**: conteúdo a ser exibido
* **url**: url que será direcionado ao clicar
* **can**: irá exibir se autorizado. Se inexistente, o item é acessivel por todos
* **title**: preenche a tag _title_ para mostrar texto de ajuda (opcional)

Se o item for um submenu, deve possuir o atributo **submenu**, que é um array contendo os itens do submenu. Opcionalmente pode conter:
* **align**: se **right** o submenu será alinhado à direita. Se inexistente, o alinhamento é o padrão (à esquerda)

Os submenus, além dos atributos do menu principal (text, url, can, title), podem ter o atributo **type** com os seguintes valores:

* se **header**, aplica a classe _dropdown-header_ do bootstrap. Deve conter **text** 
* se **divider**, aplica a classe _dropdown-divider_ do bootstrap. Não exige outras opções 

Submenu pode conter também **target** que adiciona o target correspondente no link.

## Issues

O menu de outros sistemas pode não aparecer ao usar o servidor embutido do php com artisan. Isso está relacionado com o config:cache / config:clear.

Por outro lado usando servidor nginx ou apache deve funcionar corretamente.
 
Issue aberta (#42).


## Changelog

26/10/2020
* Incluido submenu divider, submenu header e alinhamento direito do submenu (#47)

28/08/2020
* Layout responsivo com suporte mobile: ajustes no menu
* Organizando js e css
* Exemplo das bibliotecas js carregadas

31/08/2020
* Acrescentado menu para outras aplicações