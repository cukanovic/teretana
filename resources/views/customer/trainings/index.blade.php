@extends('customer.layout.customer', ['activePage' => 'trainings'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => 'Treninzi',
        'breadcrumbs' => [
            route('home') => 'Početna',
            '#' => 'Treninzi',
        ],
    ])

    <div class="container mt-4">
        <div class="list-group">
            @foreach ($trainings as $training)
                <div class="list-group-item list-group-item-action" id="training-{{ $training->id }}">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="list-group-item-heading justify-content-between">
                            <a href="{{ route('trainings.show', $training->id) }}">{{ $training->name }}</a>
                        </h4>
                        <div class="justify-content-end">
                            <span class="h1 px-3 py-2 badge badge-pill badge-{{ $training->badge_type }}">{{ strtoupper($training->difficulty) }}</span>
                            @if ($training->canBeDeleted())
                                <br>
                                <button type="button" class="btn btn-danger prevent-parent-click" onclick="deleteTraining({{ $training->id }})">Obriši trening</button>
                            @endif
                        </div>
                    </div>
                    <p class="list-group-item-text">
                        {{ $training->trainer->name }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

@endsection