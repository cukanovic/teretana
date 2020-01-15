@extends('admin.layouts.admin')

@section('content')
    <p>
        Ukupno treninga: <span class="counter">{{ $totalTrainings }}</span>
    </p>
    <p>
        Ukupno trenera: <span class="counter">{{ $totalTrainers }}</span>
    </p>
    <p>
        Ukupno rezervacija: <span class="counter">{{ $totalBookings }}</span>
    </p>
@endsection