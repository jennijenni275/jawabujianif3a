<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller

{
    
    public function index()
    {
        
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    
    public function create()
    {
        return view('buku.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'Nama_Buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer',
        ]);

        
        Buku::create($request->all());

        
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    
    public function edit($id)
    {
        $buku = Buku::findOrFail($id); 
        return view('buku.edit', compact('buku')); 
    }

    
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'Nama_Buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer',
        ]);

        
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        
        $buku = Buku::findOrFail($id);
        $buku->delete();

        
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
