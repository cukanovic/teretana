<div class="form-group">
    <label for="{{ $name }}">{{ __($labelTranslation) }}</label>
    <select class="form-control" id="{{ $name }}" name="{{ $name }}">
        @foreach ($options as $value => $option)
            <option value="{{ $value }}">{{ $option }}</option>
        @endforeach
    </select>
    @if ($errors->has($name)) <label class="error-message" for="{{ $name }}">{{ $errors->first($name) }}</label> @endif
</div>