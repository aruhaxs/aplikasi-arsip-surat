@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Kategori Surat >> Tambah</h1>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>
    <hr>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="id" style="display: block;">ID (Auto Increment)</label>
            <input type="text" id="id" name="id" disabled placeholder="ID akan dibuat otomatis" style="width: 100px; padding: 8px; background-color: #e9ecef;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="nama_kategori" style="display: block;">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" required style="width: 300px; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="keterangan" style="display: block;">Judul</label>
            <textarea id="keterangan" name="keterangan" rows="4" required style="width: 600px; padding: 8px;"></textarea>
        </div>

        <a href="{{ route('kategori.index') }}" class="btn" style="background-color: #6c757d;"> << Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection