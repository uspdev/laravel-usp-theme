<a class="nav-link nav-item {{ $item['class'] }}"

  @isset($item['url'])
    href="{{ $item['url'] }}"
  @endisset

  @isset($item['title'])
    title="{{ $item['title'] }}"
  @endisset

  @isset($item['target'])
    target="{{ $item['target'] }}"
  @endisset
  >

  @isset($item['text'])
    {!! $item['text'] !!}
  @endisset
</a>
