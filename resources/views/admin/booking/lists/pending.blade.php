@extends('admin.booking.lists.list')

@if ($showActions ?? true)
    @foreach ($bookings as $booking)
        @section("action-buttons-{$booking->id}")
            <button class="btn btn-success mb-1 w-100 accept-btn" onclick="acceptBooking({{ $booking->id }})">Prihvati</button>
            <button type="submit" class="btn btn-danger w-100 decline-btn" onclick="declineBooking({{ $booking->id }})">Odbij</button>
        @endsection
    @endforeach

    <script>
        function acceptBooking(bookingId) {
            let url = '{{ route('api.bookings.accept', '#') }}'.replace('#', bookingId);
            axios.patch(url).then(function () {
                let listRow = $(`#booking-${bookingId}`).detach();
                $(listRow).find('.accept-btn').remove();
                $(listRow).find('.decline-btn').remove();
                $('#accepted .list-group').append(listRow);
            })
        }
        function declineBooking(bookingId) {
            let url = '{{ route('api.bookings.delete', '#') }}'.replace('#', bookingId);
            axios.delete(url).then(function () {
                $(`#booking-${bookingId}`).remove();
            })
        }
    </script>
@endif