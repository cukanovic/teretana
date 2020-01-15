@extends('admin.booking.lists.list')

@if($showActions ?? true)
    @foreach ($bookings as $booking)
        @section("action-buttons-{$booking->id}")
            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PATCH')

                @hidden([
                    'name' => 'action',
                    'value' => 'completed',
                ])
                <button type="submit" class="btn btn-warning">Završi</button>
            </form>
        @endsection
    @endforeach
@endif