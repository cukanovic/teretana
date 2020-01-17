<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Requests\BookTrainingRequest;
use App\Training;
use Carbon\Carbon;

class TrainingsController extends Controller
{
    public function index()
    {
        $trainings = Training::with('trainer')->get();

        return view('customer.trainings.index', compact('trainings'));
    }

    public function show(Training $training)
    {
        return view('customer.trainings.show', compact('training'));
    }

    public function book(Training $training)
    {
        return view('customer.trainings.book', compact('training'));
    }

    public function storeBooking(BookTrainingRequest $request, Training $training)
    {
        $booking = new Booking();

        $booking->user_id = $request->user()->id;
        $booking->training_id = $training->id;
        $booking->schedule = Carbon::parse(
            sprintf('%s %s', $request->input('date'), $request->input('time'))
        );

        $booking->save();

        return redirect()->route('trainings.index')->with(
            'success',
            'Trening je rezervisan'
        );
    }
}
