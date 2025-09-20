@extends('layouts.app')

@section('title', 'Edit Arsip Surat')

@section('content')
    <h1>Edit Arsip Surat</h1>
    <p>Edit arsip surat. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>
    <hr>

    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="nomor_surat" style="display: block;">Nomor Surat</label>
            <input type="text" id="nomor_surat" name="nomor_surat" required style="width: 300px; padding: 8px;" value="{{ $surat->nomor_surat }}">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="kategori" style="display: block;">Kategori</label>
            <select name="kategori" id="kategori" required style="width: 318px; padding: 8px;">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->nama_kategori }}" {{ $surat->kategori == $kategori->nama_kategori ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="judul" style="display: block;">Judul</label>
            <input type="text" id="judul" name="judul" required style="width: 600px; padding: 8px;" value="{{ $surat->judul }}">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="file" style="display: block;">Ganti File Surat (PDF)</label>
            <p>File saat ini: <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank">{{ $surat->judul }}.pdf</a></p>
            <input type="file" id="file" name="file" accept=".pdf">
            <small style="color: red;">*Kosongkan jika tidak ingin mengganti file.</small>
        </div>
        
        <a href="{{ route('surat.show', $surat->id) }}" class="btn" style="background-color: #6c757d;"> << Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection