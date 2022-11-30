# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Seções

O template `master` possui as seguintes seções pré-definidas utilizáveis na aplicação, nessa ordem:
- title
- styles
- skin_header: barra de topo
- skin_login_bar: barra de login/logout
- menu: barra de menu da aplicação
- flash
- content: conteúdo principal
- skin_footer
- javascripts_bottom

Para atribuir conteúdo em uma seção utilize:

```
@section('nome_da_secao')
  ....
@endsection
```

Em alguns casos você pode/deve manter o conteúdo existente incluindo `@parent`.

Algumas seções estão dentro de `<div id="nome-da-secao">`:
  * skin_header
  * skin_login_bar
  * menu
  * content
  * skin_footer
