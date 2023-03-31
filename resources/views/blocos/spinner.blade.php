{{--
Spinner para ser adicionado em botão de submit de form ou link

Uso:
- Incluir no layouts.app ou em outro lugar: @include('laravel-usp-theme::components.spinner')
- Adiconar a classe 'btn-spinner' ou 'spinner'

@author Masakik, em 31/3/2023
--}}
@section('javascripts_bottom')
  @parent
  <script>
    jQuery(function() {
      // ao clicar no botão/link: salva conteúdo, adiciona spinner, desativa, submete form
      $('.btn-spinner, .spinner').on('click', function() {
        let btn = $(this)
        // salvando o conteúdo do botão
        if (!btn.data('text')) {
          btn.data('text', btn.html())
        }
        // desativando depois de clicar
        btn.addClass('disabled');
        // add spinner to button
        btn.html(
          `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ` +
          'Carregando'.substring(0, btn.data('text').length - 3) + '..' //limita o tamanho do texto do spinner
        );
        // se for botão de submit de form ...
        btn.closest('form').submit()
      })

      // restaurando ao mostrar a página, inclusive quando clicak em back no navegador
      $(window).bind('pageshow', function(event) {
        $('.btn-spinner, .spinner').each(function() {
          let btn = $(this)
          // se houver conteúdo salvo, vamos restaurar e reativar
          if (btn.data('text')) {
            btn.html(btn.data('text'))
            btn.removeClass('disabled')
          }
        })
      });

    })
  </script>
@endsection
