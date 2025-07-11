@props(['active' => false])

<a  class="nav-link {{ $active ? 'bg-dark text-light rounded-3 px-2' : 'bg-light text-black fw-semibold fs-5'}}"
{{ $attributes }}>
    {{ $slot }}</a>
