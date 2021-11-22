<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index($username)
    {
        $user = User::where("username", $username);
    }
}