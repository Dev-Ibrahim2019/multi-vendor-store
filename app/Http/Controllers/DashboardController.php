<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    // Action (These methods' controller called Action in MVC term)
    public function index()
    {

        //Return response: view, json, redirect, file
        return view('dashboard.index', [
            'user' => 'Ibrahim Alashqar'
        ]);
    }
}
