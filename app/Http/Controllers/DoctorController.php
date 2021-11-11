<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $doctor = Doctor::first();
        return response()->json(["doctor" => $doctor], 200);
    }

    /**
     * Create a new doctor instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Doctor
     */
    protected function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bio' => ['required', 'string', 'max:255'],
            'address1' => ['required', 'string', 'max:255'],
            'address2' => ['string', 'max:255'],
            'speciality' => ['required', 'string', 'max:255'],
            'tel1' => ['required', 'string', 'max:255'],
            'tel2' => ['string', 'max:255']
        ]);
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user->doctor->create([
            'bio' => $data['bio'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'tel1' => $data['tel1'],
            'tel2' => $data['tel2'],
            'speciality' => $data['speciality'],
        ]);
    }
}
