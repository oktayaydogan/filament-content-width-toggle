@php
use Oktayaydogan\FilamentContentWidthToggle\Support\ContentWidthResolver;
@endphp

<script>
    document.documentElement.dataset.fcwt = "{{ ContentWidthResolver::get() }}";
</script>