{{--
Datatables, botoes excel e csv, sem paginação, topo em 1 linha, alinhado esquerda

Uso:
- Incluir no layouts.app ou em outro lugar: @include('laravel-usp-theme::blocos.datatable-simples')
- Adiconar a classe: <table class="... datatable-simples">
- se quiser passar algo adicional no menu do datatables, passar $dtSlot com o conteúdo desejado:
    $dtSlot = view('partials.dt-slot')->render();
    return view('sua-view')->compact('variaveis', 'dtSlot'));

Classes de modificação:
- 'dt-fixed-header': ativa o fixed header
- 'dt-paging-10' ou 'dt-paging-50': ativa paginação com 10 ou 50 por página
- 'dt-buttons': ativa os botões de excel e csv
- 'dt-button-pdf' e 'dt-button pdf-landscape': se 'dt-buttons', inclui botão para pdf ou pdf-landscape
- 'dt-state-save': salva o estado da tabela no localStorage

Filtro inicial via URL:
- Para aplicar um filtro inicial, basta incluir ?filter=termo na URL da página.

@author Masakik, em 23/3/2023
@author Masakik, em 25/4/2023, incluindo classes de modificação
@author Masakik, em 21/9/2023, incluindo classes dt-button-pdf e dt-button-pdf-landscape #115
@author Masakik, em 10/5/2024, fixed header abaixo de card-header-sticky se houver
@author Masakik, em 03/7/2025, adicionado a opção $dtSlot
@author Masakik, em 11/08/2025, salva o estado da tabela no localStorage
@author Masakik, em 03/06/2026, permite filtro inicial via ?filter= na URL, desabilitando stateSave nesse caso
@author Lucas, em 11/06/2026, adicionado botão para limpar busca, pois o nativo não funciona no Firefox
--}}

@section('styles')
  @parent
  @once
    <style>
      .datatable-simples,
      .dataTables_wrapper .dataTables_info {
        padding-top: 3px !important;
        padding-bottom: 3px !important;
        padding-left: 8px !important;
        padding-right: 8px !important;
      }

      .dataTables_wrapper .dataTables_filter .dt-search-field-wrap {
        position: relative;
        display: inline-block;
      }

      .dataTables_wrapper .dataTables_filter .dt-search-field-wrap input[type="search"] {
        padding-right: 1.6rem;
      }

      .dataTables_wrapper .dataTables_filter .dt-search-clear {
        position: absolute;
        top: 50%;
        right: .45rem;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: #6c757d;
        font-size: .85rem;
        line-height: 1;
        padding: 0;
        width: 1rem;
        height: 1rem;
        cursor: pointer;
      }

      .dataTables_wrapper .dataTables_filter .dt-search-clear:hover,
      .dataTables_wrapper .dataTables_filter .dt-search-clear:focus {
        color: #343a40;
        outline: none;
      }

      /* Remove o botão de limpar do campo de busca no WebKit para usar o nosso */
      .dataTables_wrapper .dataTables_filter input[type="search"]::-webkit-search-cancel-button,
      .dataTables_wrapper .dataTables_filter input[type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
        appearance: none;
      }
    </style>
  @endonce
@endsection

@section('javascripts_bottom')
  @once
    @parent
    <script>
      jQuery(function() {

        let dtContadorId = 1; // contador global para ids gerados

        // pega ?filter=?? da URL para aplicar filtro inicial, se houver
        const urlParams = new URLSearchParams(window.location.search);
        const initialSearch = urlParams.get('filter') || '';

        $('.datatable-simples').each(function() {
          var $tabela = $(this);
          var tabelaId = $tabela.attr('id');

          if (!tabelaId) {
            tabelaId = 'datatable-simples-' + dtContadorId++;
            $tabela.attr('id', tabelaId);
            // console.warn('Tabela sem ID, atribuído id: ' + tabelaId);
          }

          // verifica se deve salvar o estado
          var dtStateSave = $tabela.hasClass('dt-state-save');
          if (urlParams.has('filter')) {
            // se tiver ?filter não usa stateSave
            dtStateSave = false;
          }

          // verifica se tem fixed header
          var dtFixedHeader = $tabela.hasClass('dt-fixed-header') ? {
              headerOffset: $('.card-header-sticky').outerHeight() || 0
            } :
            false;

          // verifica se tem paginação
          let dtPaging = false;
          let dtPageLength = 10; // default
          if ($tabela.hasClass('dt-paging-10')) {
            dtPaging = true;
            dtPageLength = 10;
          }
          if ($tabela.hasClass('dt-paging-50')) {
            dtPaging = true;
            dtPageLength = 50;
          }

          let dtButtons = null;
          let dtButtonDom = '';
          if ($tabela.hasClass('dt-buttons')) {
            const buttons = [{
                extend: 'excelHtml5',
                className: 'btn btn-sm btn-outline-primary'
              },
              {
                extend: 'csvHtml5',
                className: 'btn btn-sm btn-outline-primary'
              }
            ];
            const hasPdf = $tabela.hasClass('dt-buttons-pdf');
            const hasPdfLandscape = $tabela.hasClass('dt-buttons-pdf-landscape');
            if (hasPdf || hasPdfLandscape) {
              buttons.push({
                extend: 'pdfHtml5',
                className: 'btn btn-sm btn-outline-primary',
                text: hasPdfLandscape ? 'PDF-L' : 'PDF',
                orientation: hasPdfLandscape ? 'landscape' : 'portrait'
              });
            }
            dtButtons = {
              buttons,
              dom: {
                button: {
                  className: 'btn'
                }
              }
            };
            dtButtonDom = 'B';
          }

          // {{-- https://stackoverflow.com/questions/27678052/usage-of-the-backtick-character-in-javascript --}}
          let dtDom = `<"dt-top-bar"<"col-md-12 form-inline"
                  <"mr-2"f>
                  ${dtButtonDom}
                  ${dtPaging ? '<"ml-2 btn-sm"p>' : ''}
                  <"ml-3 border rounded border-info"i>
                  <"dt-slot">
                >>`;

          function adicionarBotaoLimparBusca(settings) {
            var $wrapper = $(settings.nTableWrapper);
            var $filter = $wrapper.find('.dataTables_filter');
            var $input = $filter.find('input[type="search"]');

            if ($input.length && !$filter.find('.dt-search-clear').length) {
              var dtApi = new $.fn.dataTable.Api(settings);
              var $fieldWrap = $('<span class="dt-search-field-wrap"></span>');
              var $clearButton = $(
                '<button type="button" class="dt-search-clear" aria-label="Limpar busca" title="Limpar busca">' +
                '<i class="fas fa-times" aria-hidden="true"></i>' +
                '</button>'
              );

              $input.before($fieldWrap);
              $fieldWrap.append($input);
              $fieldWrap.append($clearButton);

              var updateClearButton = function() {
                $clearButton.toggle(!!$input.val());
              };

              $input.on('input.dtSearchClear change.dtSearchClear keyup.dtSearchClear', updateClearButton);
              $clearButton.on('click', function() {
                $input.val('').trigger('input').focus();
                dtApi.search('').draw();
                updateClearButton();
              });

              updateClearButton();
            }
          }

          // inicializa o datatable para esta tabela
          var dtConfig = {
            dom: dtDom,
            order: [],
            paging: dtPaging,
            pageLength: dtPageLength,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            fixedHeader: dtFixedHeader,
            autoWidth: false,
            lengthMenu: [
              [10, 25, 50, 100, -1],
              ['10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostrar todos']
            ],
            stateSave: dtStateSave,
            search: {
              search: initialSearch
            },
            language: {
              search: '',
              searchPlaceholder: 'Pesquisar ..'
            },
            initComplete: function(settings, json) {
              // Insere conteúdo do $dtSlot dentro do .dt-slot desta tabela
              var container = $(settings.nTableWrapper).find('.dt-slot');
              container.html(@json($dtSlot ?? ''));

              adicionarBotaoLimparBusca(settings);
            }
          };

          if (dtButtons) {
            dtConfig.buttons = dtButtons;
          }

          $tabela.DataTable(dtConfig);

        });

      });
    </script>
  @endonce
@endsection
