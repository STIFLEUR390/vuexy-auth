@props(['route', 'sub', 'icon', 'type'])

<li class="{{ currentRouteActive($route) }} nav-item">
    <a class="d-flex align-items-center" href="{{ route($route) }}">
        <i @isset($sub) data-feather="circle" @endisset
            @isset($icon) @if ($type == 'font')
                    class="{{ $icon }}"
                @else
                    data-feather="{{ $icon }}" @endif
        @endisset></i>
    <span class="menu-title text-truncate" data-i18n="{{ $slot }}">{{ $slot }}</span>
</a>
</li>
