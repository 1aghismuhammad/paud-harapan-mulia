@props([
    'eyebrow' => null,
    'title',
    'align' => 'left',
])

<div @class(['text-center' => $align === 'center'])>
    @if ($eyebrow)
        <p class="eyebrow">{{ $eyebrow }}</p>
    @endif
    <h2 class="section-title">{{ $title }}</h2>
</div>
