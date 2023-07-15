<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'faculty' => ['required', 'string'],
            'role' => ['required', 'string'],
            'profile_photo' => ['required', 'image'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        //file name with extentsion
        $filenameWithExt_file = $request->file('profile_photo')->getClientOriginalName();
        //only file name
        $filename_file = pathinfo($filenameWithExt_file, PATHINFO_FILENAME);
        //only extension
        $extension_file = $request->file('profile_photo')->getClientOriginalExtension();
        //file name to store
        $file = $filename_file . '_' . time() . '.' . $extension_file;
        //Move file to desired location
        $path = $request->file('profile_photo')->move('img/profiles/', $file);

        $data['profile_photo'] = $file;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
            'faculty' => $request->faculty,
            'profile_photo' => $data['profile_photo'],
            'password' => Hash::make($request->password),
        ]);



        event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect(route('login'))->with('success', 'Please wait for admin approved.');
    }
}
