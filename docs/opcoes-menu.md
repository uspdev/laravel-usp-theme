# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Configuração do menu

Edite o arquivo para personalizar os menus.

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



Há dois menus principais, um alinhado à esquerda (`$menu`) e outro alinhado à direita (`$right_menu`). 

Cada item do menu deve conter os seguintes atributos:

- **text**: conteúdo a ser exibido;
- **url**: url que será direcionado ao clicar. O caminho é relativo à raiz da aplicação mas pode-se colocar um caminho absoluto também. Se não for adicionado **url**, ao invés de criar um link o menu será criado como texto normal com \<span>; 
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