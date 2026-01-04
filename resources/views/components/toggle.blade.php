@php
use Oktayaydogan\FilamentContentWidthToggle\Support\ContentWidthResolver;

$mode = ContentWidthResolver::get();
$isFull = $mode === ContentWidthResolver::MODE_FULL;
@endphp

<x-filament::dropdown.list.item
    wire:click="toggle"
    class="hidden md:flex"
    :icon="$isFull
        ? 'heroicon-o-arrows-pointing-in'
        : 'heroicon-o-arrows-pointing-out'">
    {{ $isFull ? 'Centered content' : 'Full width content' }}
</x-filament::dropdown.list.item>

<script>
    window.addEventListener('fcwt-updated', (e) => {
        document.documentElement.dataset.fcwt = e.detail.mode
    })
</script>