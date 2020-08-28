$(document).ready(function() {

    //JqueryUI:Datepicker
    $('.datepicker, .datePicker').datepicker({
        dateFormat: 'dd/mm/yy'
        , dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado']
        , dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D']
        , dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom']
        , monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
        , monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
        , nextText: 'Próximo'
        , prevText: 'Anterior'
    });

    //DataTables
    $('.dataTable, .datatable').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
        }
        , paging: true
        , lengthChange: true
        , searching: true
        , ordering: true
        , info: true
        , autoWidth: true
        , lengthMenu: [
            [10, 25, 50, 100, -1]
            , ['10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostar todos']
        ]
        , pageLength: -1
    });

    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: "Selecione"
        , allowClear: true
    });

});