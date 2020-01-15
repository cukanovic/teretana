@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ $booking->customer->name }} | Rezervacija</h1>
    </div>

    <div class="mb-3">
        Rezervisani trening:
        <a href="{{ route('admin.trainings.show', $booking->training->id) }}">
            {{ $booking->training->name }} ({{ $booking->training->trainer->name }})
        </a>
    </div>

    <div class="mb-3">
        Vreme treninga: {{ $booking->schedule->format('d.m.y.') }} u {{ $booking->schedule->format('H:i') }}
    </div>

    <div class="mb-5">
        Status: {{ __('third.status.' . $booking->status) }}
    </div>

    <div class="d-flex">
        @if($booking->isPending())
            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PATCH')
                @hidden([
                    'name' => 'action',
                    'value' => 'accepted',
                ])
                <button type="submit" class="btn btn-success mr-1">Prihvati</button>
            </form>
            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Odbij</button>
            </form>
        @elseif($booking->isAccepted())
            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PATCH')
                @hidden([
                    'name' => 'action',
                    'value' => 'completed',
                ])
                <button type="submit" class="btn btn-warning">Kompletiraj</button>
            </form>
        @endif
    </div>
@endsection