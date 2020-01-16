<div class="list-group">
    @foreach ($bookings as $booking)
        <div class="list-group-item list-group-item-action" id="booking-{{$booking->id}}">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="list-group-item-heading justify-content-between">
                    <a href="{{ route($showRouteName ?? 'admin.bookings.show', $booking->id) }}">{{ $booking->customer->name }}</a>
                    <br>
                    Trening: {{ $booking->training->name }}
                </h4>
                <div class="justify-content-end">
                    @yield("action-buttons-{$booking->id}")
                </div>
            </div>
            <p class="list-group-item-text">
                {{ $booking->schedule->format('d.m.y. H:i') }}
            </p>
        </div>
    @endforeach
</div>