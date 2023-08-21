<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
//        $user = User::create($request->validated());
//
//        auth()->login($user);
//
//        return redirect('/')->with('success', "Account successfully registered.");
        
        $request->validate([
           'first_name' => ['required', 'string', 'max:255'],
           'last_name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
           'password' => ['required', 'confirmed', Rules\Password::defaults()],
           ]);

        $user = User::create([
             'is_client' => 1,
             'role_id' => 4,
             'rating' => 'good',
             'first_name' => $request->first_name,
             'last_name' => $request->last_name,
             'username' => $request->email,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->intended('dashboard');
    }
}
