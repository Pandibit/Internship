@props([
    'method' => 'POST',
    'action' => '#',
])

<form {{ $attributes(['class' => 'w-full flex flex-col space-y-4  justify-between bg-gray-100']) }}
      method="POST"
      action="{{ $action }}"
>
    @csrf
    @method($method)

    {{ $slot }}
</form>

