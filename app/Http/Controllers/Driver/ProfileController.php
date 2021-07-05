<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function active()
    {
        $user = Auth::user();
        $user->is_active = !$user->is_active;
        $user->save();

        return response()->json(['message'=>'Updated successfully']);
    }
}
