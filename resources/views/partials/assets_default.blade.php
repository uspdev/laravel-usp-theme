    @section('styles_default')

    {{-- Botstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    {{-- Botstrap 4 --}}

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous">
    {{-- FontAwesome --}}

    {{-- JqueryUI --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous">
    {{-- JqueryUI --}}

    {{-- DataTables --}}
    {{-- Utilizando forma concatenada de https://datatables.net/download/ --}}
    {{-- bootstrap4, jszip, datatable 1.13.4, buttons, fixed headers, responsive --}}
    <link href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.css" rel="stylesheet">
    {{-- DataTables --}}

    {{-- Select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous">
    {{-- não encontrei em cdn este arquivo --}}
    <link rel="stylesheet" href="vendor/laravel-usp-theme/css/select2-bootstrap4.min.css">
    {{-- Select2 --}}

    @parent
    @endsection

    @section('javascripts_default')

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    {{-- Jquery --}}

    {{-- JqueryUI --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
    {{-- JqueryUI --}}

    {{-- Botstrap 4 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    {{-- Botstrap 4 --}}

    {{-- FontAwesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    {{-- FontAwesome --}}

    {{-- DataTables --}}
    {{-- Utilizando forma concatenada de https://datatables.net/download/ --}}
    {{-- bootstrap4, datatable 1.13.4, buttons, jszip, pdfmake, fixed headers, responsive --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/2.0.7/filtering/type-based/accent-neutralise.js"></script>
    {{-- DataTables --}}

    {{-- Select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/pt-BR.min.js" integrity="sha512-H1yBoUnrE7X+NeWpeZvBuy2RvrbvLEAEjX/Mu8L2ggUBja62g1z49fAboGidE5YEQyIVMCWJC9krY4/KEqkgag==" crossorigin="anonymous"></script>
    {{-- Select2 --}}

    {{-- Mask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    {{-- Mask --}}

    @parent
    @endsection
