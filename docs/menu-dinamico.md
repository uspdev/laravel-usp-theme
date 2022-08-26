# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Menu dinâmico

É possível adicionar e remover itens do menu dinamicamente. Para isso é necessário criar um item do menu com o nome `key` que será substituído pelo menu dinâmico:

```php
[
    'key' => 'meu menu dinamico',
]
```

A substituição pode ser feita de três formas diferentes: no **controller**, no **view composer** ou por **evento**.


### Controller

O menu dinâmico adicionado no controller é aplicado somente na rota correspondente.

```php
\UspTheme::addMenu('meu menu dinamico', [
    'text' => 'Menu dinâmico',
    'url' => 'caminho_do_menu',
]);
```
A sintaxe é igual ao utilizado no menu estático e pode conter inclusive submenus.

### View composer

Para aplicar um menu dinâmico em todas as rotas a melhor forma é utilizar [**View Composers**](https://laravel.com/docs/8.x/views#view-composers). Nesse método, o menu é criado antes da renderização da view.

Passo a passo:

* em `app/Providers` crie o arquivo ViewServiceProvider.php com o conteúdo indicado na [documentação](https://laravel.com/docs/8.x/views#view-composers);
* coloque as chamadas ao menu dinâmico no método `boot()` da mesma forma que é feito no controller;
* em `config/app.php`->`providers` registre o novo arquivo;

### Eventos

Outra forma de adicionar menu dinâmico é por meio de eventos. É apropriado para ser escutado por outras bibliotecas.

A biblioteca emite um evento ao montar o menu dinâmico. O evento é similar ao `\UspTheme::addMenu()` no sentido de substituir as entradas com `key`.  Para isso, no `EventServiceProvider` coloque:

```php
use Illuminate\Support\Facades\Event;
use Uspdev\UspTheme\Events\UspThemeParseKey;
...

public function boot()
{
    ...

    Event::listen(function (UspThemeParseKey $event) {
        if (isset($event->item['key']) && $event->item['key'] == 'chave-definida-no-config') {
            $event->item = [
                'text' => 'descreva o ítem aqui',
                'url' => '',
            ];
        }
        return $event->item;
    });
}
```

Ele deve retornar `$event->item` sem alterações ou substituir o conteúdo pelo menu desejado.
