<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('welcome', ['users' => $users]);
    }
}
