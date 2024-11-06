{{--
Datatables, botoes excel e csv, sem paginação, topo em 1 linha, alinhado esquerda

Uso:
- Incluir no layouts.app ou em outro lugar: @include('laravel-usp-theme::blocos.datatable-simples')
- Adiconar a classe 'datatable-simples'

Classes de modificação:
- 'dt-fixed-header': ativa o fixed header
- 'dt-paging-10' ou 'dt-paging-50': ativa paginação com 10 ou 50 por página
- 'dt-buttons': ativa os botões de excel e csv
- 'dt-button-pdf' e 'dt-button pdf-landscape': se 'dt-buttons', inclui botão para pdf ou pdf-landscape

@author Masakik, em 23/3/2023
@author Masakik, em 25/4/2023, incluindo classes de modificação
@author Masakik, em 21/9/2023, incluindo classes dt-button-pdf e dt-button-pdf-landscape #115
@author Masakik, em 10/5/2024, fixed header abaixo de card-header-sticky se houver
--}}

@section('styles')
  @parent
  <style>
    .datatable-simples,
    .dataTables_info {
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

        var datatableSimples = $('.datatable-simples')

        // verifica se tem fixed header
        if (datatableSimples.hasClass('dt-fixed-header')) {
          var dtFixedHeader = {
            headerOffset: $('.card-header-sticky').outerHeight()
          }
        } else {
          var dtFixedHeader = false
        }

        // verifica se tem paginação
        let dtPaging = -1
        let dtPageLength = -1
        if (datatableSimples.hasClass('dt-paging-10')) {
          dtPaging = true
          dtPageLength = 10
        }
        if (datatableSimples.hasClass('dt-paging-50')) {
          dtPaging = true
          dtPageLength = 50
        }
        // ajusta o dom para mostrar menu de paginação se necessário
        let dtDom = (dtPaging == -1) ?
          '<"row"<"col-md-12 form-inline"<"mr-2"f>B<"ml-3 border rounded border-info"i>>>t' :
          '<"row"<"col-md-12 form-inline"<"mr-2"f>B<"ml-2 btn-sm"p><"ml-3 border rounded border-info"i>>>t'

        // verifica se tem botões
        let dtButtons = []
        if (datatableSimples.hasClass('dt-buttons')) {

          let pdfButton = ''
          if (datatableSimples.hasClass('dt-buttons-pdf')) {
            pdfButton = {
              extend: 'pdfHtml5',
              className: 'btn btn-sm btn-outline-primary'
            }
          }

          if (datatableSimples.hasClass('dt-buttons-pdf-landscape')) {
            pdfButton = {
              extend: 'pdfHtml5',
              className: 'btn btn-sm btn-outline-primary',
              text: 'PDF-L',
              orientation: 'landscape'
            }
          }

          excelButton = [{
            extend: 'excelHtml5',
            className: 'btn btn-sm btn-outline-primary'
          }, {
            extend: 'csvHtml5',
            className: 'btn btn-sm btn-outline-primary'
          }]

          excelButton.push(pdfButton)

          dtButtons = {
            buttons: excelButton,
            dom: {
              button: {
                className: 'btn'
              }
            }
          }
        }

        // vamos inicializar o datatable
        datatableSimples.DataTable({
          dom: dtDom,
          order: [],
          paging: false,
          lengthChange: false,
          searching: true,
          ordering: true,
          info: true,
          fixedHeader: dtFixedHeader,
          autoWidth: false,
          lengthMenu: [
            [10, 25, 50, 100, -1],
            ['10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostar todos']
          ],
          paging: dtPaging,
          pageLength: dtPageLength,
          stateSave: false,
          language: {
            search: '',
            searchPlaceholder: 'Pesquisar ..'
          },
          buttons: dtButtons,
        })
      })
    </script>
  @endonce
@endsection
