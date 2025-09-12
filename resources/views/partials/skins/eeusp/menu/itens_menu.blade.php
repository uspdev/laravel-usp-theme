
@foreach (UspTheme::ParseMenu($menu) as $item)

@isset($item['submenu'])
    @include('laravel-usp-theme::partials.skins.'.strtolower($skin).'.menu.submenu')
  @else
    @include('laravel-usp-theme::partials.skins.'.strtolower($skin).'.menu.item')
  @endisset

@endforeach
