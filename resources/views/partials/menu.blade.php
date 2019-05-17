@section('menu')
    <div class="menu">

      <nav class="navbar navbar-default">
<div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"> <strong>
@section('sitename')
    {{ $title }}
@show
</strong></a>
        </div>
        <ul class="nav navbar-nav">
          @foreach ($menu as $item)
            @isset($item['can'])
              @if (Gate::check($item['can']))
              <li><a href="{{ $item['url'] }}"> {{$item['text']}} </a></li>
              @endif
            @else
              <li><a href="{{ $item['url'] }}"> {{$item['text']}} </a></li>
            @endisset
          @endforeach
        </ul>
      </div>
    </div>
    </nav>
  </div>

@show
