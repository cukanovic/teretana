@extends('customer.bookings.lists.list')

@foreach($bookings as $booking)
    @section("action-buttons-{$booking->id}")
        <a class="btn btn-primary" href="{{ route('google.sync', $booking->id) }}" ">Sinhronizuj sa Google kalendarom</a>
    @endsection
@endforeach
