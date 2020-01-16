<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
    public function delete(Trainer $trainer)
    {
        if ($trainer->bookings()->count() > 0) {
            return response()->json(['success' => false, 'error' => 'Ne možeš izbrisati trenera koji je bukiran.']);
        }

        $trainer->delete();

        return response()->json(['success' => true, 'message' => 'Trener uspešno izbrisan.']);
    }
}
