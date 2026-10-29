<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    // 1. Tampilkan tabel daftar narasumber
    public function index()
    {
        $speakers = Speaker::all();
        return view('speakers.index', compact('speakers'));
    }

    // 2. Tampilkan form tambah
    public function create()
    {
        return view('speakers.create');
    }

    // 3. Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keahlian' => 'required|array',
            'institusi' => 'required',
            'portofolio' => 'required',
            
        ]);

        $keahlianStr = implode(', ', $request->keahlian);

        Speaker::create([
            'nama' => $request->nama,
            'keahlian' => $keahlianStr,
            'institusi' => $request->institusi,
            'portofolio' => $request->portofolio,
        ]);

        return redirect('/')->with('success', 'Data narasumber berhasil ditambahkan!');
    }

    // 4. Tampilkan form edit data
    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('speakers.edit', compact('speaker'));
    }

    // 5. Simpan perubahan (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'keahlian' => 'required|array',
            'institusi' => 'required|string',
            'portofolio' => 'required|url',
        ]);

        $speaker = Speaker::findOrFail($id);
        $keahlianStr = implode(', ', $request->keahlian);

        $speaker->update([
            'nama' => $request->nama,
            'keahlian' => $keahlianStr,
            'institusi' => $request->institusi,
            'portofolio' => $request->portofolio,
        ]);

        return redirect('/')->with('success', 'Data narasumber berhasil diperbarui!');
    }

    // 6. Hapus data (Delete)
    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();

        return redirect('/')->with('success', 'Data narasumber berhasil dihapus!');
    }
}