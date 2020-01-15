@extends('trainer.layout.trainer')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ $booking->customer->name }} | Rezervacija</h1>
    </div>

    <div class="mb-3">
        Rezervisani trening:
        <a href="{{ route('trainer.trainings.show', $booking->training->id) }}">
            {{ $booking->training->name }}
        </a>
    </div>

    <div class="mb-3">
        Vreme treninga: {{ $booking->schedule->format('d.m.y.') }} u {{ $booking->schedule->format('H:i') }}
    </div>

    <div class="mb-5">
        Status: {{ __('third.status.' . $booking->status) }}
    </div>

@endsection