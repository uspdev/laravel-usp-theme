@foreach ($menu as $item)
  @empty($item['can'])
    @isset($item['submenu'])
      @include('laravel-usp-theme::partials.submenu')
    @else
      @include('laravel-usp-theme::partials.item')
    @endisset
  @else
    @if (Gate::check($item['can']))
      @isset($item['submenu'])
        @include('laravel-usp-theme::partials.submenu')
      @else
        @include('laravel-usp-theme::partials.item')
      @endisset
    @endif
  @endempty
@endforeach





