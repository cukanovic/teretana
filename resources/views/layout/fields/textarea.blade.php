<div class="form-group">
    <label for="{{ $name }}">{{ __($labelTranslation) }}</label>
    <textarea class="form-control" id="{{ $name }}" rows="3" name="{{ $name }}">{{ old($name, $default ?? '') }}</textarea>
    @if ($errors->has($name)) <label class="error-message" for="{{ $name }}">{{ $errors->first($name) }}</label> @endif
</div>