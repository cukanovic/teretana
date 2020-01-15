@extends('trainer.layout.trainer')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ $training->name }}</h1>
    </div>

    <div class="mb-3">
        {{ __('first.fields.descriptionLabel') }}:
        <p>
            {{ $training->description }}
        </p>
    </div>

    <div class="mb-3">
        {{ __('first.fields.priceLabel') }}: {{ $training->price }}
    </div>

    <div class="mb-3">
        {{ __('first.fields.countLabel') }}: {{ $training->number_of_sessions }}
    </div>

    <div class="mb-3">
        {{ __('first.fields.enumLabel') }}: {{ $training->difficulty }}
    </div>
@endsection