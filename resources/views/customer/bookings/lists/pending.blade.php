@extends('customer.bookings.lists.list')

@if ($showActions ?? true)
    @foreach ($bookings as $booking)
        @section("action-buttons-{$booking->id}")
            <button type="submit" class="btn btn-danger w-100 decline-btn" onclick="cancelBooking({{ $booking->id }})">Otkaži</button>
        @endsection
    @endforeach

    <script>
        function cancelBooking(bookingId) {
            let url = '{{ route('api.bookings.cancel', '#') }}'.replace('#', bookingId);
            axios.delete(url).then(function () {
                $(`#booking-${bookingId}`).remove();
            })
        }
    </script>
@endif