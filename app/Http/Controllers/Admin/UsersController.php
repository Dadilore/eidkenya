<?php

namespace App\Http\Controllers\Admin;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\UserActivityLog;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::paginate(5); // You can adjust the number (10) based on your desired items per page.
        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'dob' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d') . '|after_or_equal:' . now()->subYears(100)->format('Y-m-d'),
            'password' => ['required', 'confirmed'],
            'phone' => [
                'required',
                'regex:/^(07|01)[0-9]{8}$/',
                // Add any other phone-related validation rules here if needed
            ],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'middle_name' => $request->middle_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
        ]);
    
        // Log activity
        $log = new UserActivityLog();
        $log->user_id = auth()->id();
        $log->surname = auth()->user()->surname;
        $log->email = auth()->user()->email;
        $log->phone = auth()->user()->phone;
        $log->status = auth()->user()->status;
        $log->role = auth()->user()->role;
        $log->modify_user = 'Added a new user with ID: ' . $user->id;
        $log->save();
    
        // Redirect back with success message
        return Redirect::route('admin.users.index')->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
         
        return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        // Before updating, store the current user details for logging
        $oldUserData = [
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
        ];

        $user->surname = $request->surname;
        $user->name = $request->name;
        $user->middle_name = $request->middle_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->sex = $request->sex;
        $user->dob = $request->dob;
        $user->role = $request->role;

        // Hash the password if it's not empty
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Log activity
        $log = new UserActivityLog();
        $log->user_id = auth()->id();
        $log->surname = auth()->user()->surname;
        $log->email = auth()->user()->email;
        $log->phone = auth()->user()->phone;
        $log->status = auth()->user()->status;
        $log->role = auth()->user()->role;
        $log->modify_user = 'Updated details for UserID: ' . $user->id; json_encode($oldUserData);
        $log->save();

        return Redirect::route('admin.users.index')->with('success', 'User edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Log activity before deleting the user
        $log = new UserActivityLog();
        $log->user_id = auth()->id();
        $log->surname = auth()->user()->surname;
        $log->email = auth()->user()->email;
        $log->phone = auth()->user()->phone;
        $log->status = auth()->user()->status;
        $log->role = auth()->user()->role;
        $log->modify_user = 'Deleted user with ID: ' . $user->id;
        $log->save();

        // Delete the user
        $user->delete();

        return redirect()->back()->with('success', 'You have successfully deleted the user.');
    }
}
