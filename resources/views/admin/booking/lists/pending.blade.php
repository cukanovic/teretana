@extends('admin.booking.lists.list')

@if ($showActions ?? true)
    @foreach ($bookings as $booking)
        @section("action-buttons-{$booking->id}")
            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PATCH')

                @hidden([
                    'name' => 'action',
                    'value' => 'accepted',
                ])
                <button type="submit" class="btn btn-success mb-1">Prihvati</button>
            </form>
            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger w-100">Odbij</button>
            </form>
        @endsection
    @endforeach
@endif