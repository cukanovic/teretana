@extends('customer.layout.customer', ['activePage' => 'trainings'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => $training->name,
        'breadcrumbs' => [
            route('home') => 'Početna',
            route('trainings.index') => 'Treninzi',
            '#' => $training->name,
        ]
    ])

    <div class="container mt-4">
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
            {{ __('first.fields.enumLabel') }}: <span class="badge badge-pill badge-{{ $training->badge_type }}">{{ $training->difficulty }}</span>
        </div>

        <div class="mb-3">
            {{ __('first.fields.relationshipLabel') }}:
            <a href="{{ route('trainers.show', $training->trainer->id) }}">{{ $training->trainer->name }}</a>
        </div>

        <div class="mb-3 d-flex">
            <a href="{{ route('trainings.book', $training->id) }}" class="btn btn-warning">Rezerviši trening</a>
        </div>
    </div>

@endsection