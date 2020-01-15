<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvanceBookingRequest;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('training.trainer', 'customer')->latest('schedule')->get();

        $pending = $bookings->where('status', Booking::STATUS_PENDING);
        $accepted = $bookings->where('status', Booking::STATUS_ACCEPTED);
        $completed = $bookings->where('status', Booking::STATUS_COMPLETED);

        $timetable = $accepted->filter(function (Booking $booking) {
            return $booking->schedule->isBetween(now()->startOfWeek(), now()->endOfWeek());
        })->groupBy(function (Booking $booking) {
            return $booking->schedule->locale('sr')->dayName;
        })->reverse();

        return view('admin.booking.index', compact('pending', 'accepted', 'completed', 'timetable'));
    }

    public function show(Booking $booking)
    {
        return view('admin.booking.show', compact('booking'));
    }

    public function update(AdvanceBookingRequest $request, Booking $booking)
    {
        $booking->status = $newStatus = $request->get('action');
        $booking->save();

        $message = $newStatus == 'accepted'
            ? 'Rezervacija je prihvaćena.'
            : 'Rezervacija je kompletirana.';

        return redirect()->route('admin.bookings.index')->with('success', $message);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Rezervacija je odbijena.');
    }
}
