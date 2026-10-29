<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = User::first();
        $hours = (int) date('H');
        $salam = match (true) {
            $hours >= 5 && $hours < 12 => "Good Morning",
            $hours >= 12 && $hours < 15 => "Good Afternoon",
            $hours >= 15 && $hours < 18 => "Good Evening",
            default => "Good Night",
        };

        $accessTime = date("H:i:s");
        return view('dashboard', compact('mahasiswa', 'salam', 'accessTime'));
    }
}