# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Menu ativo

O menu ativo contém a classe `active` do bootstrap e fica destacado em relação aos demais itens de menu. Para indicar o menu ativo utilize o método abaixo dentro do seu controller.

```php
\UspTheme::activeUrl('caminho_do_menu');
```

O `'caminho_do_menu'` deve corresponder à variável `url` do item.

Se o menu ativo for um subitem, o menu principal também ficará ativo.
