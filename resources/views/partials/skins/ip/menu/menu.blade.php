@section('menu')
<nav class="navbar navbar-light navbar-expand-sm mb-3  p-0 border-gray">
    
    @if (config('laravel-usp-theme.sistemas')) {{-- menu de sistemas --}}
    <a class="navbar-brand dropdown-toggle" href="#" data-toggle="dropdown" title="Outros sistemas">
        <i class="fas fa-globe"></i>
    </a>
    <div class="dropdown-menu" role="menu">
        @foreach (config('laravel-usp-theme.sistemas') as $sistema)
            <a class="dropdown-item" href="{{$sistema['url']}}" target="_{{$sistema['text']}}">
                {{ $sistema['text'] }}
            </a>
        @endforeach
    </div>
    @endif

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <div class="navbar-nav mr-auto"> {{-- menu esquerdo --}}
            @include('laravel-usp-theme::partials.skins.'.strtolower($skin).'.menu.itens_menu')
        </div>
        
        @isset($right_menu) {{-- menu direito --}}
        <div class="navbar-nav ml-md-auto">
            @include('laravel-usp-theme::partials.skins.'.strtolower($skin).'.menu.itens_menu', ['menu' => $right_menu])
        </div>
        @endisset
        
    </div>
</nav>

@endsection
