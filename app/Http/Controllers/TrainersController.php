<?php

namespace App\Http\Controllers;

use App\Trainer;

class TrainersController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('trainings')->get();

        return view('customer.trainers.index', compact('trainers'));
    }

    public function show(Trainer $trainer)
    {
        return view('customer.trainers.show', compact('trainer'));
    }
}
