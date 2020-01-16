<?php

namespace App\Http\Controllers;

use App\Trainer;
use App\Training;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trainings = Training::inRandomOrder()->take(4)->get();
        $trainers = Trainer::inRandomOrder()->take(3)->get();

        return view('customer.home', [
            'trainings' => $trainings,
            'trainer1' => $trainers->get(0),
            'trainer2' => $trainers->get(1),
            'trainer3' => $trainers->get(2),
        ]);
    }
}
