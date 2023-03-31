{{--
Datatables, botoes excel e csv, sem paginação, topo em 1 linha, alinhado esquerda

Uso:
- Incluir no layouts.app ou em outro lugar: @include('laravel-usp-theme::components.datatables-simples')
- Adiconar a classe 'datatables-simples'

@author Masakik, em 23/3/2023
--}}
@section('javascripts_bottom')
  @parent
  <script>
    jQuery(function() {
      var datatableSimples = $('.datatable-simples, datatables-simples').DataTable({
        dom: '<"row"<"col-md-12 form-inline"<"mr-2"f>B<"ml-3"i>>>t',
        order: [],
        paging: false,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        lengthMenu: [
          [10, 25, 50, 100, -1],
          ['10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostar todos']
        ],
        pageLength: -1,
        language: {
          search: '',
          searchPlaceholder: 'Filtrar ..'
        },
        buttons: {
          buttons: [{
              extend: 'excelHtml5',
              className: 'btn btn-sm btn-outline-primary'
            },
            {
              extend: 'csvHtml5',
              className: 'btn btn-sm btn-outline-primary'
            }
          ],
          dom: {
            button: {
              className: 'btn'
            }
          }
        }
      })
    })
  </script>
@endsection
