<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Peminjaman</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Detail Peminjaman</h2>

    <form action="{{ route('detailpeminjaman.update', $detailPeminjaman->No_Pinjam) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ID_Anggota" class="form-label">Nama Anggota</label>
            <select name="ID_Anggota" id="ID_Anggota" class="form-select @error('ID_Anggota') is-invalid @enderror">
                <option value="">Pilih Anggota</option>
                @foreach($anggota as $anggota)
                    <option value="{{ $anggota->ID_Anggota }}" {{ $anggota->ID_Anggota == $detailPeminjaman->ID_Anggota ? 'selected' : '' }}>
                        {{ $anggota->Nama_Anggota }}
                    </option>
                @endforeach
            </select>
            @error('ID_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ID_Buku" class="form-label">Nama Buku</label>
            <select name="ID_Buku" id="ID_Buku" class="form-select @error('ID_Buku') is-invalid @enderror">
                <option value="">Pilih Buku</option>
                @foreach($buku as $buku)
                    <option value="{{ $buku->ID_Buku }}" {{ $buku->ID_Buku == $detailPeminjaman->ID_Buku ? 'selected' : '' }}>
                        {{ $buku->Nama_Buku }}
                    </option>
                @endforeach
            </select>
            @error('ID_Buku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Tanggal_Pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="Tanggal_Pinjam" id="Tanggal_Pinjam" value="{{ $detailPeminjaman->Tanggal_Pinjam }}" class="form-control @error('Tanggal_Pinjam') is-invalid @enderror">
            @error('Tanggal_Pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Tanggal_Kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="Tanggal_Kembali" id="Tanggal_Kembali" value="{{ $detailPeminjaman->Tanggal_Kembali }}" class="form-control @error('Tanggal_Kembali') is-invalid @enderror">
            @error('Tanggal_Kembali')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detailpeminjaman
