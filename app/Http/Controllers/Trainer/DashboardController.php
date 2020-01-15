<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('trainer.dashboard.index', $this->prepareDashboardData());
    }

    private function prepareDashboardData()
    {
        $trainer = Auth::user();

        return [
            'totalTrainings' => $trainer->trainings()->count(),
            'totalBookings' => $trainer->bookings()->count(),
        ];
    }
}
