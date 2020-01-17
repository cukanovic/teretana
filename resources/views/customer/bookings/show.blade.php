@extends('customer.layout.customer', ['activePage' => 'bookings'])

@section('content')

    @include('customer.layout.breadcrumbs', [
        'heading' => $booking->training->name,
        'breadcrumbs' => [
            route('home') => 'Početna',
            route('bookings.index') => 'Rezervacije',
            '#' => $booking->training->name,
        ]
    ])

    <div class="container mt-4">
        <div class="mb-3">
            Rezervisani trening:
            <a href="{{ route('trainings.show', $booking->training->id) }}">
                {{ $booking->training->name }} ({{ $booking->training->trainer->name }})
            </a>
        </div>

        <div class="mb-3">
            Vreme treninga: {{ $booking->schedule->format('d.m.y.') }} u {{ $booking->schedule->format('H:i') }}
        </div>

        <div class="mb-5">
            Status: {{ __('third.status.' . $booking->status) }}
        </div>
    </div>

@endsection