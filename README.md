# Pacote de tema do Laravel para projetos USPdev

Desenvolver um sistema web é uma atividade que envolve diversas camadas
de complexidade e é natural termos mais habilidade ou gosto por apenas
uma ou algumas dessas camadas.
Esse pacote laravel é um template com alguns estilos da USP e
é direcionado para aqueles(as) que preferem se debruçar
no desenvolvimento do backend com laravel sem se preocupar muito
com frontend.

Evita também que fiquemos copiando código do template
de um projeto para o outro. Foi inspirado no [adminLte para laravel](https://github.com/jeroennoten/Laravel-AdminLTE)
e está aberto a contribuições e melhorias dos devs da USP.
Inicialmente desenvolvido por [@marcelomodesto](https://github.com/marcelomodesto) do IME-USP.

![theme image](https://raw.githubusercontent.com/uspdev/laravel-usp-theme/master/docs/tela-principal.png)

## Funcionalidades

Estão disponíveis no template:

- Uma bara com o logo da USP que não aparece no tamanho sm (mobile);
- Uma faixa com as informações de usuário/login/logout à direita;
- Uma barra de menus e sub-menus totalmente configurável;
- Possibilidade de oferecer link para outras aplicações da Unidade;
- Personalização do tema por meio de **skins**;

O tema possui as seguintes bibliotecas incorporadas:

- bootstrap 4.6
- jquery
- jqueryUI
- fontawesome
- datatables (responsive), agora com [HTML5 export buttons](https://datatables.net/extensions/buttons/examples/html5/simple.html)
- select2
- datepicker

## Requisitos

Este tema foi testado no Laravel 5.6.x, 7.24.x, 8.x mas deve funcionar em outras versões.

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

A variável `'can' => 'meu lindo gate'` controla a disponibilidade
dos itens do menu conforme os gates configurados na aplicação.
Se can estiver vazio, `'can' => ''` ou ausente, o menu será exibido sempre.
Para que o menu apareça somente para o gate `admin` por exemplo,
use `'can' => 'admin'`.

Se seu projeto utilizar o [senhaunica-socialite](http://github.com/uspdev/senhaunica-socialite), ele já tem os gates `user`, `gerente` e `admin` pré-definidos.

É possível que o menu tenha itens com subitens no estilo dropdown, para isso, em um item do array do menu crie uma chave _submenu_ com um array seguindo a mesma estrutura do array principal.

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

    composer dump -o

Uma vez publicado, você pode querer colocar a pasta `public/vendor` no `.gitignore`.

### Estenda o **laravel-usp-theme master** no layout do seu projeto

Edite ou crie o seu arquivo `resources/views/layouts/app.blade.php` para estender o laravel-usp-theme. Veja um exemplo:

```php
@extends('laravel-usp-theme::master')

@section('title') Sistema USP @endsection

@section('styles')
@parent
<style>
    /*seus estilos*/
</style>
@endsection

@section('skin_footer')
    Seu código
@endsection

@section('javascripts_bottom')
@parent
<script>
    // Seu código .js
</script>
@endsection
```

Depois disso, em suas views, estenda o seu layout básico:

```php
@extends('layouts.app')

@section('content')
    Seu html que será inserido no meio do layout
@endsection
```

### Configure o .env.example

O laravel-usp-theme é uma biblioteca que pode usar configurações no `.env`. Para isso você deve instruir o `.env.example` adequadamente. Note que todas as configurações são opcionais:

    # LARAVEL-USP-THEME
    # https://github.com/uspdev/laravel-usp-theme
    
    # O laravel-usp-theme permite que seja criado links
    # para outras aplicações da unidade
    #USP_THEME_SISTEMAS_1='{"text":"Pessoas","url":"http://localhost/pessoas"}'
    #USP_THEME_SISTEMAS_2='{"text":"LDAP","url":"http://localhost/ldap"}'

    # Escolha o skin a ser utilizado
    #USP_THEME_SKIN=uspdev

## Outros sistemas

Você pode ter um menu dropdown no menu principal, à esquerda, que direciona os usuários para outros sistemas.

Para ativar acrescente as linhas correspondentes ao `USP_THEME_SISTEMAS_X=` no seu .env, onde X é um número com a ordem que vai aparecer no menu.

![theme image](https://raw.githubusercontent.com/uspdev/laravel-usp-theme/master/docs/tela-outros-sistemas.png)

Esta configuração irá habilitar o link para outros sistemas. Aparecerá na barra de menu, à esquerda.

## Opções do menu

Há dois menus principais, um alinhado à esquerda e outro alinhado à direita. Veja o arquivo publicado em `config/laravel-usp-theme.php` como exemplo.

Cada item do menu deve conter os seguintes atributos:

- **text**: conteúdo a ser exibido;
- **url**: url que será direcionado ao clicar. O caminho é relativo à raiz da aplicação mas pode-se colocar um caminho absoluto também;
- **can**: irá exibir o item para o gate especificado. Se inexistente ou vazio, o item é acessivel por todos. De fato não é obrigatório mas você provavelmente irá utilizar.

```php
[
    'text' => '<i class="fas fa-user-lock"></i> Menu do admin',
    'url' => 'admin_path',
    'can' => 'admin',
]
```

Outros atributos opcionais:

- **title**: preenche a tag _title_ para mostrar texto de ajuda
- **target**: mesmo comportamento do atributo target do html

### Submenus

Se o item for um submenu, deve possuir o atributo **submenu**, que é um array contendo os itens do submenu.

Opcionalmente pode conter o atributo **align** - se **right** o submenu será alinhado à direita. Se inexistente, o alinhamento é o padrão (à esquerda).

Os submenus, além dos atributos do menu principal (text, url, can, title), podem ter o atributo **type** com os seguintes valores:

- se **header**, aplica a classe _dropdown-header_ do bootstrap. Deve conter **text**
- se **divider**, aplica a classe _dropdown-divider_ do bootstrap. Não exige outras opções

```php
[
    'text' => 'Menu admin',
    'can' => 'admin',
    'submenu' => [
        [
            'text' => 'SubItem 2',
            'url' =>  'subitem2',
            'can' => 'admin',
        ],
        [
            'type' => 'divider',
        ],
        [
            'type' => 'header',
            'text' => 'Cabeçalho',
        ],
    ],
],
```

## Menus dinâmicos

É possível adicionar e remover itens do menu dinamicamente. Para isso é necessário criar um item do menu com o nome `key` que será substituído pelo menu dinâmico:

```php
[
    'key' => 'meu menu dinamico',
]
```

Depois, em seu controller, por exemplo, você deve atribuir o conteúdo desse item. A sintaxe é igual ao utilizado no menu estático e pode conter inclusive submenus:

```php
\UspTheme::addMenu('meu menu dinamico', [
    'text' => 'Menu dinâmico',
    'url' => 'caminho_do_menu',
]);
```

### Eventos de menu dinâmico

A biblioteca emite um evento ao montar o menu dinâmico. O evento é similar ao `\UspTheme::addMenu()` no sentido de substituir as entradas com `key`. É apropriado para ser escutado por outras bibliotecas. Para isso, no `EventServiceProvider` coloque:

```php
use Illuminate\Support\Facades\Event;
use Uspdev\UspTheme\Events\UspThemeParseKey;
...

public function boot()
{
    ...

    Event::listen(function (UspThemeParseKey $event) {
        if ($event->item['key'] == 'chave-definida-no-config') {
            ....
            $event->item = [
                'text' => 'descreva o ítem aqui',
                'url' => '',
            ];
        }
        return $event->item;
    };
}
```

Ele deve retornar `$event->item` sem alterações ou substituir o conteúdo pelo menu desejado.

### Menu dinâmico global

Se o menu dinâmico vai ser aplicado em todas as views, é possível utilizar [**View Composers**](https://laravel.com/docs/8.x/views#view-composers). Passo a passo:

* em `app/Providers` crie o arquivo ViewServiceProvider.php com o conteúdo indocado na documentação;
* coloque as chamadas ao menu dinâmico em `boot()`;
* em `config/app.php`->`providers` registre o novo arquivo;


## Menu ativo

O menu ativo contém a classe `active` do bootstrap e fica destacado em relação aos demais itens de menu. Para indicar o menu ativo utilize o método:

```php
\UspTheme::activeUrl('caminho_do_menu');
```

O `'caminho_do_menu'` deve corresponder à variável `url` do item.

## Skins

A partir da versão 2, o laravel-usp-theme pode ser personalizado por meio de skins. O skin permite personalizar a aparência do sistema.

Um skin pode, por exemplo, trocar o logo da USP pelo logo da Unidade ou trocar a cor da faixa de login.

Para usar um skin, coloque no .env da sua aplicação a varável:

    USP_THEME_SKIN = nome_do_skin

Você também pode definir o skin no seu controller ou em outra parte do sistema com:

```php
    \UspTheme::setSkin('nome-do-skin');
```

O skin pode ser setado uma única vez e será persistido na sessão. Então pode-se criar uma rota para que o usuário troque a skin da aplicação.

Geralmente o nome do skin é a sigla da unidade, mas pode ser qualquer string. Uma unidade pode ter uma skin chamada 'EESC' e outra skin chamada 'EESC65Anos'.

### Criando um skin

Para criar um skin você deve alterar o projeto laravel-usp-theme. Crie uma issue, faça fork/clone do projeto, altere e faça um pull request.

Vamos supor que você vai criar um skin de nome **USP**. Dentro do projeto localize a pasta resources/view/partials/skins. Nessa pasta, utilize como modelo o skin **uspdev**: crie a pasta **usp** e copie o conteúdo da pasta **uspdev** para ela. Os arquivos que foram copiados podem ser alterados para refletir a aparência desejada.

Os assets que forem utilizados na skin devem ser colocados em pasta própria também. Localize a pasta resources/assets/skins. Crie a pasta **USP** referente ao skin e coloque todos os assets necessários.

Depois de mergear sua skin no laravel-usp-theme você deve atualizar o composer da sua aplicação para poder usar o novo skin.

**Nome da pasta do skin**: o nome da pasta deve ser sempre em minúsculo. Ao setar o USP_THEME_SKIN no .env você pode usar qualquer combinação de maiusculas e minúsculas pois, ao buscar a pasta, a variável é convertida para minúsculas.

**Sistemas existentes**: se você já usa o theme e quer implementar o skin, lembre de ajustar o config/laravel-usp-theme.php para refletir as novas configurações da versão 2 do tema.

## Issues

O menu de outros sistemas pode não aparecer ao usar o servidor embutido do php com artisan. Isso está relacionado com o config:cache / config:clear.

Por outro lado usando servidor nginx ou apache deve funcionar corretamente.

Issue aberta (#42).

## Changelog

15/06/2021

- Menu dinâmico

04/03/2021

- Incluido js e css para Datatables HTML5 export buttons

26/10/2020

- Incluido submenu divider, submenu header e alinhamento direito do submenu (#47)

28/08/2020

- Layout responsivo com suporte mobile: ajustes no menu
- Organizando js e css
- Exemplo das bibliotecas js carregadas

31/08/2020

- Acrescentado menu para outras aplicações

15/11/2020

- versão 2
- nova funcionalidade: skins
- pasta views reorganizada
- dashboard_url renomeado para app_url
