@if (isset($item['url']))
  <a class="nav-link nav-item {{ $item['class'] }}" href="{{ $item['url'] }}" title="{{ $item['title'] }}"
    target="{{ $item['target'] }}">
    {!! $item['text'] !!}
  </a>
@else
  <span class="nav-link nav-item {{ $item['class'] }}" title="{{ $item['title'] }}" target="{{ $item['target'] }}">
    {!! $item['text'] !!}
  </span>
@endif
