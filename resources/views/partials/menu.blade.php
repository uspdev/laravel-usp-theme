@section('menu')

<nav class="navbar navbar-expand-sm navbar-light bg-light mb-3 py-0 border-bottom border-top border-gray">
    <div class="container">
        <a class="navbar-brand" href="{{ $dashboard_url }}"> <strong>
                @section('sitename')
                {{ $title }}
                @show
            </strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($menu as $item)
                    @empty($item['can'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $item['url'] }}"> {{$item['text']}} </a>
                        </li>
                    @else
                        @if (Gate::check($item['can']))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $item['url'] }}"> {{$item['text']}} </a>
                            </li>
                        @endif
                    @endempty
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@show