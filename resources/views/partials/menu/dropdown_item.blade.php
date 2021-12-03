@switch($submenu_item['type'] ?? '')
    @case('header')
        <div class="dropdown-header">{!! $submenu_item['text'] !!}</div>
    @break
    @case('divider')
        <div class="dropdown-divider"></div>
    @break
    @default
        <a class="dropdown-item {{ $submenu_item['class'] }}" href="{{ $submenu_item['url'] }}" 
        target="{{ $submenu_item['target'] }}">
            {!! $submenu_item['text'] !!}
        </a>
@endswitch
