<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class profilController extends Controller
{
    public function index()
    {
        $mahasiswa = User::first();
        return view('profil', compact('mahasiswa'));
    }
}