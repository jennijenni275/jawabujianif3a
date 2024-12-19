<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\detail_peminjaman;
use Illuminate\Http\Request;

class detail_peminjaman_controller extends Controller
{
       public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('detail_peminjaman.create', compact('anggota', 'buku'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'No_Peminjaman' => 'required|unique:detail_peminjaman,No_Peminjaman',
            'ID_Anggota' => 'required|exists:anggota,ID_Anggota',
            'ID_Buku' => 'required|exists:buku,ID_Buku',
            'Tanggal_Pinjam' => 'required|date',
            'Tanggal_Kembali' => 'nullable|date',
            'Denda' => 'nullable|numeric',
        ]);
    
        
        $detailPeminjaman = new detail_peminjaman();
        $detailPeminjaman->No_Peminjaman = $request->No_Peminjaman;
        $detailPeminjaman->ID_Anggota = $request->ID_Anggota;
        $detailPeminjaman->ID_Buku = $request->ID_Buku;
        $detailPeminjaman->Tanggal_Pinjam = $request->Tanggal_Pinjam;
        $detailPeminjaman->Tanggal_Kembali = $request->Tanggal_Kembali;
        $detailPeminjaman->Denda = $request->Denda;
        $detailPeminjaman->save();
    
        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail Peminjaman berhasil ditambahkan');
    }
    

    
    public function index()
    {
        $detailPeminjaman = detail_peminjaman::with('anggota', 'buku')->get();
        return view('detail_peminjaman.index', compact('detailPeminjaman'));
    }
}
