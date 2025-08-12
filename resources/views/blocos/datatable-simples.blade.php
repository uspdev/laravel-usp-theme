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

@author Masakik, em 23/3/2023
@author Masakik, em 25/4/2023, incluindo classes de modificação
@author Masakik, em 21/9/2023, incluindo classes dt-button-pdf e dt-button-pdf-landscape #115
@author Masakik, em 10/5/2024, fixed header abaixo de card-header-sticky se houver
@author Masakik, em 03/7/2025, adicionado a opção $dtSlot
@author Masakik, em 11/08/2025, salva o estado da tabela no localStorage
--}}

@section('styles')
  @parent
  <style>
    .datatable-simples,
    .dataTables_wrapper .dataTables_info {
      padding-top: 3px !important;
      padding-bottom: 3px !important;
      padding-left: 8px !important;
      padding-right: 8px !important;
    }
  </style>
@endsection

@section('javascripts_bottom')
  @once
    @parent
    <script>
      jQuery(function() {

        let dtContadorId = 1; // contador global para ids gerados

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

          // ajusta o dom para mostrar menu de paginação se necessário
          let dtDom = (dtPaging == -1) ?
            '<"row"<"col-md-12 form-inline"<"mr-2"f>B<"ml-3 border rounded border-info"i><"dt-slot">>>t' :
            '<"row"<"col-md-12 form-inline"<"mr-2"f>B<"ml-2 btn-sm"p><"ml-3 border rounded border-info"i><"dt-slot">>>t'

          // verifica se tem botões
          let dtButtons = [];
          if ($tabela.hasClass('dt-buttons')) {
            let pdfButton = '';
            if ($tabela.hasClass('dt-buttons-pdf')) {
              pdfButton = {
                extend: 'pdfHtml5',
                className: 'btn btn-sm btn-outline-primary'
              };
            }
            if ($tabela.hasClass('dt-buttons-pdf-landscape')) {
              pdfButton = {
                extend: 'pdfHtml5',
                className: 'btn btn-sm btn-outline-primary',
                text: 'PDF-L',
                orientation: 'landscape'
              };
            }

            let excelButton = [{
                extend: 'excelHtml5',
                className: 'btn btn-sm btn-outline-primary'
              },
              {
                extend: 'csvHtml5',
                className: 'btn btn-sm btn-outline-primary'
              }
            ];
            if (pdfButton) excelButton.push(pdfButton);

            dtButtons = {
              buttons: excelButton,
              dom: {
                button: {
                  className: 'btn'
                }
              }
            };
          }

          // inicializa o datatable para esta tabela
          $tabela.DataTable({
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
            language: {
              search: '',
              searchPlaceholder: 'Pesquisar ..'
            },
            buttons: dtButtons,
            initComplete: function(settings, json) {
              // Insere conteúdo do $dtSlot dentro do .dt-slot desta tabela
              var container = $(settings.nTableWrapper).find('.dt-slot');
              container.html(@json($dtSlot ?? ''));
            }
          });

        });

      });
    </script>
  @endonce
@endsection
