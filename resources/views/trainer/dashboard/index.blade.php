@extends('trainer.layout.trainer')

@section('content')
    <p>
        Ukupno treninga: <span class="counter">{{ $totalTrainings }}</span>
    </p>
    <p>
        Ukupno rezervacija: <span class="counter">{{ $totalBookings }}</span>
    </p>
@endsection