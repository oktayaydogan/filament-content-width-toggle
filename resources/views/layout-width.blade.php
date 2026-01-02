@php
use Oktayaydogan\FilamentContentWidthToggle\Support\ContentWidthResolver;

$mode = ContentWidthResolver::resolve();
@endphp

<style>
    /* sadece güvenlik için */
</style>

<script>
    document.documentElement.dataset.fcwt = "{{ $mode }}";
</script>