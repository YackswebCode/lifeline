<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

            public function store(Request $request): RedirectResponse
        {
            $request->validate([
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'organization' => ['nullable', 'string', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'consent'  => ['required', 'accepted'],
            ]);

            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'organization' => $request->organization,
                'password'     => Hash::make($request->password),
            ]);

            // Send verification email immediately
            $user->sendEmailVerificationNotification();

            // Store email in session for the verification page
            return redirect()->route('verification.notice')
                            ->with('registered_email', $user->email);
        }
}