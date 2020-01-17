@extends('customer.layout.customer', ['activePage' => 'trainers'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => 'Treneri',
        'breadcrumbs' => [
            route('home') => 'Početna',
            '#' => 'Treneri',
        ],
    ])

    <div class="container mt-4">
        <div class="list-group">
            @foreach ($trainers as $trainer)
                <div class="list-group-item list-group-item-action" id="trainer-{{ $trainer->id }}">
                    <div class="d-flex w-100 justify-content-between">
                        <a href="{{ route('trainers.show', $trainer->id) }}">{{ $trainer->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection