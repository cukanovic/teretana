<div class="d-flex justify-content-center">
    <button type="submit" class="{{ $submitClass ?? 'btn btn-success mr-3' }}">{{ $submitText ?? 'Sačuvaj' }}</button>
    <a href="{{ $cancelUrl }}" class="{{ $cancelClass ?? 'btn btn-danger' }}">{{ $cancelText ?? 'Otkaži' }}</a>
</div>