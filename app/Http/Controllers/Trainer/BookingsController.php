<?php

namespace App\Http\Controllers\Trainer;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Trainer $trainer */
        $trainer = $request->user();

        $trainer->load('bookings.training');

        $accepted = $trainer->bookings->where('status', Booking::STATUS_ACCEPTED);
        $completed = $trainer->bookings->where('status', Booking::STATUS_COMPLETED);

        $timetable = $accepted->filter(function (Booking $booking) {
            return $booking->schedule->isBetween(now()->startOfWeek(), now()->endOfWeek());
        })->groupBy(function (Booking $booking) {
            return $booking->schedule->locale('sr')->dayName;
        })->reverse();

        return view('trainer.bookings.index', compact('accepted', 'completed', 'timetable'));
    }

    public function show(Request $request, $bookingId)
    {
        /** @var \App\Trainer $trainer */
        $trainer = $request->user();

        $booking = $trainer->bookings()->findOrFail($bookingId);

        return view('trainer.bookings.show', compact('booking'));
    }
}
