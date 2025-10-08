{{--
Estilo que fixa o card header no topo da página quando ela é rolada.

Testado no card-header mas eventualmente pode funcionar em outros elementos
Usando a cor do background padrão do card do bootstrap, sem transparência

Uso:
- Incluir no layouts.app ou em outro lugar: @include('laravel-usp-theme::blocos.sticky')
- Adiconar a classe 'card-header-sticky'
- adicionar data-top="X" se quiser um top diferente de 0 (ex: para evitar sobreposição com navbar fixa)

@author Masakik, em 31/3/2023
@author Kawabata, em 8/10/2025: adicionado data-top para evitar sobreposição com navbar fixa
--}}
@section('styles')
  @once
    @parent
    <style>
      /* Fixando card header no top quando scrool */
      .card-header-sticky {
        position: -webkit-sticky;
        position: sticky !important;
        top: 0;
        z-index: 100;
        background-color: #F0F0F0;
      }
    </style>
  @endonce
@endsection

@section('javascripts_bottom')
  @once
    @parent
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.card-header-sticky').forEach(function(el) {
          if (el.hasAttribute('data-top')) {
            const top = el.getAttribute('data-top');
            el.style.top = `${top}px`;
          }
        });
      });
    </script>
  @endonce
@endsection
