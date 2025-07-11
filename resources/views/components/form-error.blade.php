@props(['name'])

@error($name)
<p class="text-danger fw-semibold">{{ $message }}</p>
@enderror
