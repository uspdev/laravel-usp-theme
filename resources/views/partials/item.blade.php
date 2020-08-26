<li class="nav-item {{ request()->url() == $item['url'] ? 'active' : '' }} ">
    <a class="nav-link" href="{{ $item['url'] }}"> {{ $item['text'] }}</a>
</li>
