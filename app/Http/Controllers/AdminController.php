<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('adminPages.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function produtos() {
        if (Auth::check()) {
            return view('adminPages.produtos');
        } else {
            return redirect()->route('login');
        }
    }
}
