@extends('customer.layout.customer', ['activePage' => 'trainings'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => "Rezerviši {$training->name}",
        'breadcrumbs' => [
            route('home') => 'Početna',
            route('trainings.index') => 'Treninzi',
            '#' => $training->name,
        ]
    ])

    <div class="container mt-4">
        <form action="{{ route('trainings.book.store', $training->id) }}" method="POST">
            @csrf

            @input([
                'name' => 'date',
                'inputType' => 'date',
                'labelTranslation' => 'first.book.dateLabel',
            ])

            @input([
                'name' => 'time',
                'inputType' => 'time',
                'labelTranslation' => 'first.book.timeLabel'
            ])

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning">Rezerviši</button>
            </div>
        </form>
    </div>

@endsection