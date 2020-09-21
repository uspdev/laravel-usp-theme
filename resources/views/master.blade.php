<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="@csrf">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @section('title') 
        {{ $title }} 
        @show
    </title>

    <link rel="canonical" href="https://github.com/uspdev/laravel-usp-theme">

    @section('styles_default')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-usp-theme/css/style.css')}}">
    @show
    @yield('styles')

    @section('js_head_def')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    @show
    @yield('javascripts_head')
</head>

<body>
    <div class="container-fluid d-none d-sm-block">
        {{-- Vai ocultar em mobile --}}
        <div class="row">
            <div class="col-md-12 logos-header">
                <a class="logo-imagem" href="/">
                    <img src="{{ asset('/vendor/laravel-usp-theme/images/usp-logo.png') }}"
                        alt="Logo da Universidade de São Paulo" />
                </a>
                <a class="logo-texto" href="/">
                    <img src="{{ asset('/vendor/laravel-usp-theme/images/usp-logo-texto.png') }}"
                        alt="Universidade de São Paulo" />
                </a>
            </div>
        </div>
    </div>

    <div class="logo-faixa">
        @include('laravel-usp-theme::partials.login_bar')
    </div>
    
    <div class="menu">
        @include('laravel-usp-theme::partials.menu')
    </div>

    <div class="container-fluid">
        <div class="row">
            <div id="content" class="col-md-12">
                @yield('flash')
                @section('content')

                <h2>Lorem Ipsum</h2>
                O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o
                texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um
                texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a
                tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a
                disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente
                com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum. Porque é que o
                usamos? É um facto estabelecido de que um leitor é distraído pelo conteúdo legível de uma página quando
                analisa a sua mancha gráfica. Logo, o uso de Lorem Ipsum leva a uma distribuição mais ou menos normal de
                letras, ao contrário do uso de "Conteúdo aqui, conteúdo aqui", tornando-o texto legível. Muitas
                ferramentas de publicação electrónica e editores de páginas web usam actualmente o Lorem Ipsum como o
                modelo de texto usado por omissão, e uma pesquisa por "lorem ipsum" irá encontrar muitos websites ainda
                na sua infância.<br>
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <h2>Datatables</h2>
                        <table class="table table-stripped table-hover table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>25</td>
                                    <td>User</td>
                                </tr>
                                <tr>
                                    <td>Jane</td>
                                    <td>32</td>
                                    <td>User</td>
                                </tr>
                                <tr>
                                    <td>Alice</td>
                                    <td>60</td>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>Maria</td>
                                    <td>48</td>
                                    <td>Admin</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <h2>JqueryUI/Datepicker</h2>
                        <input type="text" class="form-control datepicker" name="data">
                        <br>
                        <h2>Select2</h2>
                        <select class="select2 form-control col-6" name="state">
                            <option value="SP">São Paulo</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="PR">Paraná</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="GO">Goiás</option>
                        </select>
                        <br>
                        <br>
                        <h2>Mask</h2>
                        <input type="text" name="Data" data-mask="00/00/0000" placeholder="__/__/____">

                    </div>
                </div>

                @show
            </div>
        </div>

        @include('laravel-usp-theme::partials.footer')

        @section('js_bottom_def')
        <!-- JqueryUI -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- JqueryUI -->

        <!-- DataTables -->
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <!-- DataTables -->

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        <!-- Select2 -->

        <!-- Mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        <!-- Mask -->

        <!-- FontAwesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        <!-- FontAwesome -->

        <script type="text/javascript" src="{{ asset('/vendor/laravel-usp-theme/js/script.js') }}"></script>
        @show
        @yield('javascripts_bottom')

</body>

</html>
