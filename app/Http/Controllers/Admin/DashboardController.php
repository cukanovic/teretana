<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Trainer;
use App\Training;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', $this->gatherDashboardData());
    }

    private function gatherDashboardData()
    {
        return [
            'totalTrainers' => Trainer::count(),
            'totalTrainings' => Training::count(),
            'totalBookings' => Booking::count(),
        ];
    }
}
