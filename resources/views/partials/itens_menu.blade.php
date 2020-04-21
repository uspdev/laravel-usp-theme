@foreach ($menu as $item)
@isset($item['can'])
    @if (Gate::check($item['can']))
      @isset($item['submenu'])
        @include('laravel-usp-theme::partials.submenu')
      @else
        @include('laravel-usp-theme::partials.item')
      @endisset
    @endif
@else
    @isset($item['submenu'])
      @include('laravel-usp-theme::partials.submenu')
    @else
      @include('laravel-usp-theme::partials.item')
    @endisset
@endisset
@endforeach

