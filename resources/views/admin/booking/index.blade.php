@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>Raspored za nedelju {{ now()->startOfWeek()->format('d.m.') }} - {{ now()->endOfWeek()->format('d.m.') }}</h1>
    </div>

    <table class="table table-bordered text-center table-hover-cells">
        <thead>
            <tr>
                @foreach ($timetable->keys() as $weekDay)
                    <th>{{ ucfirst($weekDay) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < $timetable->map->count()->max(); $i++)
                <tr>
                    @foreach($timetable as $bookingsInDay)
                        @if($booking = $bookingsInDay->get($i))
                            <td onclick="window.location='{{ route('admin.bookings.show', $booking->id) }}'">
                                {{ $booking->schedule->format('H:i') }}
                                <br>
                                {{ $booking->customer->name }}
                                <br>
                                <span class="font-italic">{{ $booking->training->trainer->name }}</span>
                            </td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-5">
        <h1>Sve rezervacije</h1>
    </div>

    <ul class="nav nav-tabs" id="bookingsByStatus" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Na čekanju</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">Prihvaćene</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Završene</a>
        </li>
    </ul>

    <div class="tab-content" id="bookingByStatusContent">
        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            @include('admin.booking.lists.pending', [
                'bookings' => $pending
            ])
        </div>
        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
            @include('admin.booking.lists.accepted', [
                'bookings' => $accepted
            ])
        </div>
        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            @include('admin.booking.lists.completed', [
                'bookings' => $completed
            ])
        </div>
    </div>
@endsection
