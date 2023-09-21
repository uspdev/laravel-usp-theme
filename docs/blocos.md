# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Blocos

### Blocos

A biblioteca possui blocos de código que podem ser incluídas (@include) no seu projeto.

Os blocos são uma forma de adicionar funcionalidades somente quando necessário.
Dessa forma não sobrecarregará o código fonte desnecessariamente.

É similar a ajustar o arquivo de configuração mas optou-se por essa forma pois a opção de carregar ou não
fica disponível preferencialmente em `layouts.app`, que é mais direto a visualização do que no `config`.

Há exemplos dos blocos no `partials.content_sample` da biblioteca.

Blocos disponíveis

#### card-header-sticky

O card-header-stick é uma classe css que fixa o card-header no topo da página quando o conteúdo é rolado para baixo.

Para usar coloque em `layouts.app`

```
@include('laravel-usp-theme::blocos.sticky')
```

No seu código use:

```html
<div class="card">
  <div class="card-header h4 card-header-sticky">
    Bloco <b>Sticky</b>
  </div>
  <div class="card-body">
    ...
  </div>
</div>
```

#### spinner

Adiciona um spinner (do bootstrap) para indicar que está em carregamento, além de invalidar o botão para evitar clique
consecutivo.

Para usar coloque em `layouts.app`
```
@include('laravel-usp-theme::blocos.spinner')
```

No seu código use:

```html
<button class="btn btn-info btn-spinner">Botão com spinner</button>
```
ou

```html
<a href="" onclick="return false;" class="spinner">Link com spinner</a>
```

O link pode ser formatado com `'btn btn-primary'` ou outra classe normalmente.

Obs.: Caso seja ajax, tem de tratar o retorno do botão para sua condição normal. Exemplo:

```js
$.post('ajax/teste', function(data) {
  alert('sucesso', data)
})
.fail(function() {
  alert('erro')
})
.always(function() {
  spinnerRestore()
})
```

#### datatable-simples

Um datatables pré-configurado e pré-formatado que pode ativar recursos usando classes:
- caixa de busca à esquerda
- seguido de botões excel/csv: usando classe `dt-buttons`
- seguido de botão pdf: usando classe `dt-button-pdf` ou `dt-button-pdf-landscape`
- seguido do número de registros
- com paginação: usando classe `dt-paging-10` ou `dt-paging-50`
- com fixed header: usando classe `dt-fixed-header`

Para usar coloque em `layouts.app`
```
@include('laravel-usp-theme::blocos.datatable-simples')
```

No seu código use:

```html
<table class="table datatable-simples">
...
```
ou

```html
<table class="table datatable-simples dt-buttons dt-fixed-header dt-paging-10 responsive">
...
```
