@props([ 'name', 'checked' => false, 'label' => null ])

<div class="custom-control custom-switch">
    {{-- Hidden input ensures unchecked gives 0 --}}
    <input type="hidden" name="{{ $name }}" value="0">
    <input type="checkbox" class="custom-control-input" id="{{ $name }}" name="{{ $name }}" value="1" {{ $checked ? 'checked' : '' }}>
    <label class="custom-control-label" for="{{ $name }}">{{ $label ?? '' }}</label>
</div>
