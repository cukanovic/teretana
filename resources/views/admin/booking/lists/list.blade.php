<div class="list-group">
    @foreach ($bookings as $booking)
        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="list-group-item-heading justify-content-between">
                    {{ $booking->customer->name }}
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
        </a>
    @endforeach
</div>