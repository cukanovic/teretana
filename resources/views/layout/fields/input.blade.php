<div class="form-group">
    <label for="{{ $name }}">{{ __($labelTranslation) }}</label>
    <input type="{{ $inputType ?? 'text' }}"
           name="{{ $name }}"
           class="form-control"
           id="{{ $name }}"
           value="@if(! ($skipDefault ?? false)){{ old($name, $default ?? '')}}@endif"
    >
    @if ($errors->has($name)) <label class="error-message" for="{{ $name }}">{{ $errors->first($name) }}</label> @endif
</div>