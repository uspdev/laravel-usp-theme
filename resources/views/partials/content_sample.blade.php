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
    <h4>Bloco <b>datatables-simples</b></h4>
    <div>
      Formata o datatables apresentando os botões de Excel/Csv, pesquisa à esquerda, contagem de registros no topo,
      sem paginação, com ordenação.
      <hr />
    </div>
    <table class="table table-stripped table-hover table-bordered datatable-simples responsive">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Idade</th>
          <th>Tipo</th>
          <th>Bla</th>
          <th>Ble</th>
          <th>Blo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Wick Keanu Reeves</td>
          <td>25</td>
          <td>User</td>
          <td>Bla Bla Bla Bla Bla Bla</td>
          <td>Ble Ble Ble Ble Ble Ble</td>
          <td>Ble Ble Ble Ble Ble Ble</td>
        </tr>
        <tr>
          <td>Jane Doe</td>
          <td>32</td>
          <td>User</td>
          <td>Bla 2</td>
          <td>Ble 2</td>
          <td>Ble 2</td>
        </tr>
        <tr>
          <td>Alice in Wonderland</td>
          <td>60</td>
          <td>Admin</td>
          <td>Bla 1</td>
          <td>Ble 1</td>
          <td>Ble 1</td>
        </tr>
        <tr>
          <td>Maria</td>
          <td>48</td>
          <td>Admin</td>
          <td>Bla 1</td>
          <td>Ble 1</td>
          <td>Ble 1</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
    <div class="my-3">
        <h4>Datatables</h4>
        <div>
            Além do datatables propriamente, estão disponíveis os plugins:<br>
            - responsive<br>
            - excel/csv<br>
            - tradução para pt-br<br>
        </div>
    </div>
    <div class="my-3">
      <h4>JqueryUI/Datepicker</h4>
      <input type="text" class="form-control datepicker" name="data">
      <br>
      <h4>Select2</h4>
      <select class="select2 form-control col-6" name="state">
        <option value="SP">São Paulo</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="PR">Paraná</option>
        <option value="SC">Santa Catarina</option>
        <option value="MG">Minas Gerais</option>
        <option value="GO">Goiás</option>
      </select>
    </div>

    <div class="my-3">
      <h4>Mask</h4>
      <input type="text" name="Data" data-mask="00/00/0000" placeholder="__/__/____">
    </div>

    <div class="my-3">
      <h4>Bloco <b>Spinner</b></h4>
      Clique para ver, recarregue a página para resetar<br>
      <button class="btn btn-info btn-spinner">Botão com spinner</button><span class="mx-3"></span>
      <a href="" onclick="return false;" class="spinner">Link com spinner</a>
    </div>

    <div class="my-3">
      <h2></h2>
      <div class="card">
        <div class="card-header h4 card-header-sticky">
          Bloco <b>Sticky</b>
        </div>
        <div class="card-body">
          Fixa o header de um card no topo<br>
          Usa a cor padrão<br>
          Role para cima para ver em funcionamento<br>
          bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>
          bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>
          bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>
          bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>
          bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>bla<br>
        </div>
      </div>
    </div>

  </div>
</div>

@section('javascripts_bottom')
  <script>
    $(document).ready(function() {
      $('.datatable-demo').DataTable({
        dom: 'fBitp', // https://datatables.net/examples/basic_init/dom.html
        "buttons": ['excelHtml5', 'csvHtml5'], // buttons plugin
      });
    });
  </script>
@endsection
