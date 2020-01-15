<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Trainer $trainer */
        $trainer = $request->user();

        $trainer->load(['trainings' => function($query) {
            return $query->withCount('bookings');
        }]);

        return view('trainer.trainings.index', [
            'trainings' => $trainer->trainings,
        ]);
    }

    public function show(Request $request, $trainingId)
    {
        /** @var \App\Trainer $trainer */
        $trainer = $request->user();

        $training = $trainer->trainings()->findOrFail($trainingId);

        return view('trainer.trainings.show', compact('training'));
    }
}
