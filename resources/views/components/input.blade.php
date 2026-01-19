@props(['label' => null, 'type' => 'text'])

<div>
    @if($label)
        <label class="form-label">{{ $label }}</label>
    @endif

    <input
        type="{{ $type }}"
        {{ $attributes->merge([
            'class' => 'form-input'
        ]) }}
    >
</div>
