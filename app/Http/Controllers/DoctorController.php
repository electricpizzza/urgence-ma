<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Intervention\Image\Facades\Image;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index()
    {
        $doctors = Doctor::all();
        // return response()->json(["doctors" => $doctor], 200);
        return view("doctor.doctors", compact("doctors"));
    }

    public function singleDoctor(string $username)
    {
        $doctor = Doctor::where('username', $username)->first();
        if (!$doctor)
            throw new NotFoundHttpException("Doctor not found");
        return view("doctor.profile", compact("doctor"));
    }


    public function create(Request $request)
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

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'bio' => ['required', 'string', 'max:255'],
            'address1' => ['required', 'string', 'max:255'],
            'address2' => ['string', 'max:255'],
            'speciality' => ['required', 'string', 'max:255'],
            'tel1' => ['required', 'string', 'max:255'],
            'tel2' => ['string', 'max:255']
        ]);
        $user = auth()->user;
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return $user->doctor->update([
            'bio' => $data['bio'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'tel1' => $data['tel1'],
            'tel2' => $data['tel2'],
            'speciality' => $data['speciality'],
        ]);
    }

    public function changeProfile(Request $request)
    {
        $user = auth()->user;
        $data = $request->validate([
            'profile' => ['required', 'image'],
        ]);
        $imagePath = $data['profile']->store('uploads', 'public');

        $profile = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300)->save();
    }
}
