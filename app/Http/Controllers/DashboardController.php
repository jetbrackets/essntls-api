<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $drivers = User::whereType('driver')
                        ->whereStatus(true)
                        ->whereIsActive(true)
                        ->get();

        return response()->json($drivers);
    }
}
