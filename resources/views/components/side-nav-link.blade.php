<li class="menu-item {{ $isActive }}">
    <a href="{{ $link }}" class="menu-link">
        @if (!empty($icon))
            <i class="menu-icon tf-icons bx {{ $icon }}"></i>
        @endif
        <div data-i18n="Basic">{{ $name }}</div>
    </a>
</li>
