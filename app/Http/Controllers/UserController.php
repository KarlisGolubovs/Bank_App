<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('dashboard', compact('user'));
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('login')->with('error', 'Please login to access the Bank.');
    }

}

