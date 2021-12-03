# Tema do Laravel para projetos USPdev

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

- Uma barra com o logo da USP que não aparece no tamanho **sm** (mobile);
- Uma faixa com as informações de usuário/login/logout alinhado à direita;
- Uma barra de menus e sub-menus totalmente configurável;
- Possibilidade de oferecer [**link**](docs/outros-sistemas.md) para outras aplicações da Unidade;
- Personalização do tema por meio de [**skins**](docs/skins.md);

O tema possui as seguintes bibliotecas incorporadas:

- bootstrap 4.6
- jquery
- jqueryUI
- fontawesome
- datatables
  - [responsive plugin](https://datatables.net/extensions/responsive/)
  - [HTML5 export buttons](https://datatables.net/extensions/buttons/examples/html5/simple.html)
- jquery select2
- datepicker
- jquery mask

As bibliotecas js são carregadas a partir de CDN.

## Requisitos

Este tema foi testado no Laravel 5.6.x, 7.24.x, 8.x mas deve funcionar em outras versões.


## Documentação

* [Instalação e configuração básica](docs/configuracao.md)
* [Configuração do menu](docs/opcoes-menu.md)
* [Menu ativo](docs/menu-ativo.md)
* [Link para outros sistemas](docs/outros-sistemas.md)
* [Menu dinâmico](docs/menu-dinamico.md)
* [Issues](docs/issues.md)

## Changelog

3/12/2021

- refatorado a documentação
- refatorado `src/UspTheme.php` - construção do menu

15/06/2021

- Incluído menu dinâmico

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
