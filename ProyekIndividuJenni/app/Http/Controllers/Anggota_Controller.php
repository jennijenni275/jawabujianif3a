<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class Anggota_Controller extends Controller
{
        public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama_Anggota' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tgl_daftar' => 'required|date',
        ]);

        Anggota::create($validated);
        return redirect()->route('anggota.index');
    }


    public function create()
    {
        return view('anggota.create');
    }

    
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Nama_Anggota' => 'string|max:255',
            'Alamat' => 'string|max:255',
            'jurusan' => 'string|max:255',
            'tgl_daftar' => 'date',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validated);
        return redirect()->route('anggota.index');
    }

   
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index');
    }
    public function edit($id)
    {
    $anggota = Anggota::findOrFail($id);
    return view('anggota.edit', compact('anggota'));
    }

}
