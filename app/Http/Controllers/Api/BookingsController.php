<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;

class BookingsController extends Controller
{
    public function delete(Booking $booking)
    {
        $booking->delete();

        return response()->json(['success' => true, 'message' => 'Rezervacija uspešno izbrisana.']);
    }

    public function accept(Booking $booking)
    {
        if (!$booking->isPending()) {
            return response()->json(['success' => false, 'error' => 'Ne možeš prihvatiti zahteve koji nisu na čekanju.']);
        }

        $booking->status = Booking::STATUS_ACCEPTED;
        $booking->save();

        return response()->json(['success' => true, 'message' => 'Rezervacija je prihvaćena.']);
    }

    public function complete(Booking $booking)
    {
        if (!$booking->isAccepted()) {
            return response()->json(['success' => false, 'error' => 'Ne možeš kompletirati rezervaciju koja nije prihvaćena.']);
        }

        $booking->status = Booking::STATUS_COMPLETED;
        $booking->save();

        return response()->json(['success' => true, 'message' => 'Rezervacija je kompletirana.']);
    }
}
