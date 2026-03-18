<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Show the email verification notice (public).
     */
    public function show(Request $request): View
    {
        // Retrieve email from session (set after registration)
        $email = $request->session()->get('registered_email');
        return view('auth.verify-email', ['email' => $email]);
    }
}