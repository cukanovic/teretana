@extends('admin.booking.lists.list')

@if($showActions ?? true)
    @foreach ($bookings as $booking)
        @section("action-buttons-{$booking->id}")
            <button type="submit" class="btn btn-warning complete-btn" onclick="completeBooking({{ $booking->id }})">Završi</button>
        @endsection
    @endforeach

    <script>
        function completeBooking(bookingId) {
            console.log('que te pasa');
            let url = '{{ route('api.bookings.complete', '#') }}'.replace('#', bookingId);
            axios.patch(url).then(function () {
                let listRow = $(`#booking-${bookingId}`).detach();
                $(listRow).find('.complete-btn').remove();
                $('#completed .list-group').append(listRow);
            })
        }
    </script>
@endif