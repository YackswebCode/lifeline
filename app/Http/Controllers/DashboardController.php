<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Analysis;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $analyses = Analysis::where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard.index', compact('user', 'analyses'));
    }
}