<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Training;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function delete(Training $training)
    {
        if ($training->bookings()->count() > 0) {
            return response()->json(['success' => false, 'error' => 'Ne možete izbrisati trening koji je rezervisan.'], 400);
        }

        $training->delete();

        return response()->json(['success' => 'true', 'message' => 'Trening uspešno izbrisan.']);
    }
}
