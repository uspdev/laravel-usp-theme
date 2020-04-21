<li class="nav-item">
    <div class="dropdown">

      <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{$item['text']}}
      </button>

      <div class="dropdown-menu">
        @foreach ($item['submenu'] as $submenu_item)
          @isset($submenu_item['can'])
            @if (Gate::check($submenu_item['can']))
              <button class="dropdown-item" type="button">
              <a href="{{ $submenu_item['url'] }}"> {{$submenu_item['text']}} </a>
              </button>
            @endif
          @else
            <button class="dropdown-item" type="button">
            <a href="{{ $submenu_item['url'] }}"> {{$submenu_item['text']}} </a>
            </button>
         @endisset
        @endforeach
      </div>
    </div>
</li>
