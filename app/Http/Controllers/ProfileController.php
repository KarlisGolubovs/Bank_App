<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return View
     */
    public function show(): View
    {
        $user = Auth::user();

        // You can pass the $user variable to the profile view
        // or fetch additional data as needed

        return view('profile.show', compact('user'));
    }
}


