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

![theme image](docs/tela-principal.png)

## Funcionalidades

Estão disponíveis no template:

- Uma barra com o logo da USP que não aparece no tamanho **sm** (mobile);
- Uma faixa com as informações de usuário/login/logout alinhado à direita;
- Uma barra de menus e sub-menus totalmente configurável;
- Possibilidade de oferecer [**link**](docs/outros-sistemas.md) para outras aplicações da Unidade;
- Personalização do tema por meio de [**skins**](docs/skins.md);
- Mensagens flash pré definidas(à partir da v2.6.0), ativada como padrão agora;
- Blocos (à partir da versão 2.7.0)

O tema possui as seguintes bibliotecas incorporadas:

- bootstrap (v4.6.0)
- jquery (v3.6.0)
- jqueryUI (v1.12.1)
  - datepicker, etc.
- fontawesome (v5.15.3)
- datatables (v1.10.23)
  - [responsive plugin](https://datatables.net/extensions/responsive/) (v2.2.7)
  - [HTML5 export buttons](https://datatables.net/extensions/buttons/examples/html5/simple.html) (v1.6.5)
  - [Fixed header plugin](https://datatables.net/extensions/fixedheader/) (v3.3.2)
- jquery [select2](https://github.com/select2/select2) (v4.0.13)

- jquery mask (v1.14.16)

As bibliotecas js são carregadas a partir de CDN.

## Requisitos

Este tema foi testado no Laravel 8.x e 11.x mas deve funcionar em outras versões.


## Documentação

* [Instalação e configuração básica](docs/configuracao.md)
* [Configuração do menu](docs/opcoes-menu.md)
* [Menu ativo](docs/menu-ativo.md)
* [Link para outros sistemas](docs/outros-sistemas.md)
* [Seções](docs/secoes.md)
* [Menu dinâmico](docs/menu-dinamico.md)
* [Skins](docs/skins.md)
* [Blocos](docs/blocos.md)
* [Issues](docs/issues.md)

## Integração com cadastros-auxiliares

O tema pode exibir mensagens vindas do sistema
[uspdev/cadastros-auxiliares](https://github.com/uspdev/cadastros-auxiliares)
no topo das páginas.

Esta integração nativa do tema cobre somente mensagens.
Os endpoints de programas (`/api/pos/programas`) são consumidos via biblioteca `uspdev/cadastros-auxiliares-client`.

No fluxo atual do tema:
- o navegador faz polling no endpoint local do tema: `/_usp-theme/cadastros-auxiliares/mensagens`;
- o backend do tema consulta este webservice no endpoint derivado de `CADASTROS_AUXILIARES_URL` (`/api/mensagens`);
- `CADASTROS_AUXILIARES_PASSWORD` é enviada apenas no backend (não fica exposta no browser).

Configure no `.env` da aplicação que usa este tema:

```dotenv
CADASTROS_AUXILIARES_URL=https://seu-app
CADASTROS_AUXILIARES_MENSAGENS_INTEGRACAO=false
CADASTROS_AUXILIARES_PASSWORD=
CADASTROS_AUXILIARES_SISTEMA_NAME=
CADASTROS_AUXILIARES_MENSAGENS_LIMITE=5
CADASTROS_AUXILIARES_MENSAGENS_TIMEOUT=5
CADASTROS_AUXILIARES_MENSAGENS_REFRESH=30
```

Significado:

- `CADASTROS_AUXILIARES_MENSAGENS_INTEGRACAO`: habilita/desabilita a integração.
- quando a variável não existir, estiver vazia ou for `false`, a integração fica desabilitada.
- `CADASTROS_AUXILIARES_URL`: URL base do serviço cadastros-auxiliares (ex.: `https://seu-app`).
- `CADASTROS_AUXILIARES_PASSWORD`: senha obrigatória para proteger o endpoint de mensagens em chamadas externas.
- em integrações com `laravel-usp-theme`, a senha é usada no backend do tema (proxy local), sem exposição no navegador.
- `CADASTROS_AUXILIARES_SISTEMA_NAME`: nome do sistema consumidor para aplicar o filtro por sistema (ex.: `cadastros-auxiliares`, `ponto`).
- `CADASTROS_AUXILIARES_MENSAGENS_LIMITE`: quantidade máxima de mensagens consumidas.
- `CADASTROS_AUXILIARES_MENSAGENS_TIMEOUT`: tempo em segundos para cada mensagem desaparecer automaticamente.
- `CADASTROS_AUXILIARES_MENSAGENS_REFRESH`: intervalo (em segundos) para atualizar somente a área de mensagens sem recarregar a página.

Comportamento:

- O filtro por sistema só funciona quando `CADASTROS_AUXILIARES_SISTEMA_NAME` estiver configurada com o nome do sistema USPdev (ex.: `CADASTROS_AUXILIARES_SISTEMA_NAME=ponto` para o sistema `uspdev/ponto`).
- Se `CADASTROS_AUXILIARES_MENSAGENS_TIMEOUT` estiver vazio ou `0`, as mensagens ficam visíveis até o usuário clicar em fechar.
- A área de mensagens é atualizada periodicamente sem `F5`, conforme `CADASTROS_AUXILIARES_MENSAGENS_REFRESH`.
- Cada mensagem exibida possui botão de fechar (`×`).
- O polling no frontend é feito contra endpoint local do tema, evitando envio de credenciais para o cliente.
- Em caso de falha no endpoint, o comportamento é silencioso (não quebra a página).
- Mesmo com `config/laravel-usp-theme.php` antigo publicado na aplicação consumidora, os defaults novos desta integração são mesclados pelo pacote.

## Changelog

02/03/2026
- release 2.8.24
- integração opcional com `uspdev/cadastros-auxiliares` para exibição de mensagens no topo das páginas.
- suporte às variáveis `CADASTROS_AUXILIARES_MENSAGENS_*`.
- mensagens com botão de fechar (`×`) e auto-ocultação baseada em `CADASTROS_AUXILIARES_MENSAGENS_TIMEOUT`.
- comportamento silencioso em falha de consulta ao endpoint.

03/07/2025
- release 2.8.15
- adicionado variável $dtSlot ao datatable-simples
- $dtSlot recebe uma view blade renderizada
- exibe conteúdo da view na parte superior da tabela, a frente da contagem de registros

25/4/2023
- release 2.8
- removido responsive padrão do datatables (issue #114)
- modificado datatable-simples para ativar plugins por meio de classes
- removido datatable-simples-paginado, incorporado no datatable-simples

31/03/2023
- release 2.7
- incluído a opção de blocos que adicionam funcionalidades ao projeto. Ajuste o `layouts.app` da sua aplicação.

30/11/2022
- release 2.6.1
- alterado o config para expor `container` e `key => laravel-tools`. Ajuste o `config` da sua aplicação.

28/10/2022
- release 2.6.0
- [#92](https://github.com/uspdev/laravel-usp-theme/issues/92) - Incluídas mensagens flash pré definidas (desativadas por padrão no `config`) - [Treinamento Laravel](https://uspdev.github.io/laravel#31-mensagens-flash)

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
