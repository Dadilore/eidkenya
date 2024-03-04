<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Access the authenticated user

        // Example: Fetch additional data for the dashboard
        $someData = User::where('id', $user->id)->first();

        $response = response()->view('dashboard', compact('user', 'someData'));

        // Add no-cache headers to prevent browser caching
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        return $response;
    }
}