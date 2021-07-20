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
        <table class="table table-stripped table-hover table-bordered datatable-demo responsive">
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

@section('javascripts_bottom')
<script>
    $(document).ready(function() {
        $('.datatable-demo').DataTable( {
            dom: 'fBitp', // https://datatables.net/examples/basic_init/dom.html
            "buttons": ['excelHtml5', 'csvHtml5'], // buttons plugin
        } );
    } );
</script>
@endsection