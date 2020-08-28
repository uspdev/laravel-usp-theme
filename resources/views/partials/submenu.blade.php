<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ preg_replace('/[^\w\d]+/', '', $item['text']) }}"
        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {!! $item['text'] !!}
    </a>
    <div class="dropdown">
        <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ preg_replace('/[^\w\d]+/', '', $item['text']) }}">
            @foreach ($item['submenu'] as $submenu_item)
                @isset($submenu_item['can'])
                    @if (Gate::check($submenu_item['can']))
                        @include('laravel-usp-theme::partials.dropdown_item')
                    @endif
                @else
                    @include('laravel-usp-theme::partials.dropdown_item')
                @endisset
            @endforeach
        </div>
    </div>
</li>
