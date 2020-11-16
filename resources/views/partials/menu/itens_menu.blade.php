@foreach ($menu as $item)
@isset($item['can'])
    @if (Gate::check($item['can']))
      @isset($item['submenu'])
        @include('laravel-usp-theme::partials.menu.submenu')
      @else
        @include('laravel-usp-theme::partials.menu.item')
      @endisset
    @endif
@else
    @isset($item['submenu'])
      @include('laravel-usp-theme::partials.menu.submenu')
    @else
      @include('laravel-usp-theme::partials.menu.item')
    @endisset
@endisset
@endforeach

