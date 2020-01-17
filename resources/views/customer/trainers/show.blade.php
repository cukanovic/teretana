@extends('customer.layout.customer', ['activePage' => 'trainers'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => "Trener {$trainer->name}",
        'breadcrumbs' => [
            route('home') => 'Početna',
            route('trainers.index') => 'Treneri',
            '#' => $trainer->name,
        ]
    ])

    <div class="container mt-4">
        <div class="mb-3">
            Ime: {{ $trainer->name }}
        </div>

        <div class="mb-5">
            Email: {{ $trainer->email }}
        </div>

        <div class="mb-2 d-flex justify-content-center">
            <h2>Treninzi</h2>
        </div>

        @foreach ($trainer->trainings as $training)
            <a href="{{ route('trainings.show', $training->id) }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="list-group-item-heading justify-content-between">
                        {{ $training->name }}
                    </h4>
                    <span class="badge badge-pill badge-{{$training->badge_type}} px-2 py-3">{{ strtoupper($training->difficulty) }}</span>
                </div>
            </a>
        @endforeach
    </div>

@endsection