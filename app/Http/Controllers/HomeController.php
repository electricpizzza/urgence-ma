<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

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
        $user = User::first();
        // $spes = Speciality::create([
        //     'title' => "Cardiologue", 'logo' => "d"
        // ]);
        // $user->doctor()->create([
        //     'bio' => "aaa",
        //     'address1' => "aaa",
        //     'address2' => "aaa",
        //     'speciality' => 1,
        //     'profile' => "",
        //     'banner' => "",
        //     'tel1' => "",
        //     'tel2' => ""
        // ]);
        dd($user->doctor);

        return view('home', compact("user"));
    }
}
