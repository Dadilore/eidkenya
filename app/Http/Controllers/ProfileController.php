<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use AfricasTalking\SDK\AfricasTalking;
use Mail;
use App\Mail\TestMail;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function test(Request $request){
        $user = Auth::user();
        $username = env('AFRICASTALKING_USERNAME'); 
        $apiKey = env('AFRICASTALKING_KEY'); 
        $shortcode = env('AFRICASTALKING_SHORTCODE');
        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        // Use the service
        $result = $sms->send([
            'to' => $user->phone,
            'from' => $shortcode,
            'message' => 'Hello '.$user->name.'!'
        ]);

        dd($result);
    }

    public function testmail(Request $request){
        $user = Auth::user();
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to($user->email)->send(new TestMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
