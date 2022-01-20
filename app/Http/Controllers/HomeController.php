<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 'doc':
                return view('doctor.profile', compact("user"));
                break;
            case 'clinic':
                return redirect("/doctor/$user->username");
                break;
            default:
                return view('home', compact("user"));
                break;
        }
    }
}
