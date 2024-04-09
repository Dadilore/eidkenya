<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if($request->user()->role ===  'admin'){
            $url = 'admin/index';
        }elseif($request->user()->role ===  'user'){
            $url ='/dashboard';
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
        public function destroy(Request $request): RedirectResponse
        {
            Auth::guard('web')->logout();

            Session::flush();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

             // Set a session variable to indicate logout
            $request->session()->put('logged_out', true);

            return redirect('/login'); // Redirect to the login page
        }
}
