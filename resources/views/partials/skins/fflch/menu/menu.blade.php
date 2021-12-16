@section('skin_styles')
<style>
    #menu{
        background-color: #273e74;
        color: #fff;
    }
    #menu .navbar .navbar-brand{
        margin-right: 0;
    }
    #menu .navbar a{
        color: #fff;
        text-transform: uppercase;
        font-family: "Roboto", sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 28px;  
        padding: 10px 15px;
        border-right-color: rgb(255, 255, 255);
        border-right-style: solid;
        border-right-width: 1px;
    }
    .dropdown, .dropdown .dropdown-menu, .dropdown .dropdown-item, .dropdown a{
        background-color: #273e74;
        color: #fff;
    }
    #menu .navbar .dropdown a{
        border-bottom: 1px dotted #003954;
        border-right: 0;
    }

</style>
@endsection

@section('menu')
<nav class="navbar navbar-expand-sm mb-3  p-0 border-gray">
    
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

    <a class="navbar-brand font-weight-bold" href="{{ $app_url }}">
        @section('sitename') {{ $title }} @show
    </a>

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
