@extends('customer.layout.customer', ['activePage' => 'bookings'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => 'Rezervacije',
        'breadcrumbs' => [
            route('home') => 'Početna',
            '#' => 'Rezervacije',
        ],
    ])

    <div class="d-flex justify-content-center mt-5">
        <h1>Sve rezervacije</h1>
    </div>

    <ul class="nav nav-tabs" id="bookingsByStatus" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Na čekanju</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">Prihvaćene</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Završene</a>
        </li>
    </ul>

    <div class="tab-content" id="bookingByStatusContent">
        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            @include('customer.bookings.lists.pending', [
                'bookings' => $pending ?? []
            ])
        </div>
        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
            @include('customer.bookings.lists.accepted', [
                'bookings' => $accepted ?? [],
            ])
        </div>
        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            @include('customer.bookings.lists.completed', [
                'bookings' => $completed ?? [],
            ])
        </div>
    </div>

@endsection