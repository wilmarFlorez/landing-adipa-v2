@props([
    'variant' => 'primary',
    'size'    => 'md',
    'text'    => '',
    'type'    => 'button',
    'class'   => '',
])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "c-btn c-btn--{$variant} c-btn--{$size} {$class}"]) }}
>
    {{ $slot->isNotEmpty() ? $slot : $text }}
</button>
