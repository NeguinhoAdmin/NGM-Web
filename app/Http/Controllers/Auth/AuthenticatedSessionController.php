<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

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

        // return redirect()->intended(RouteServiceProvider::HOME);

        if ($request->user()->role_id === 4) {
            return redirect(route('customer.dashboard'));
        } elseif ($request->user()->role = 'true') {
            return redirect(route('admin.dashboard'));
        }

        // $role = $request->user()->role_id || $request->user()->role;

        // switch ($role) {
        //     case '1':
        //         return redirect(route('admin.dashboard'));
        //         break;
        //     case '2':
        //         return redirect(route('manager.dashboard'));
        //         break;
        //     case '3':
        //         return redirect(route('staff.dashboard'));
        //         break;
        //     case '4':
        //         return redirect(route('customer.dashboard'));
        //         break;
        // }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
