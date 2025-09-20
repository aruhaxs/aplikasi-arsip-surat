@extends('layouts.app')

@section('title', 'Arsipkan Surat')

@section('content')
    <h1>Arsipkan Surat</h1>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    <hr>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nomor_surat" style="display: block;">Nomor Surat</label>
            <input type="text" id="nomor_surat" name="nomor_surat" required style="width: 300px; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="kategori" style="display: block;">Kategori</label>
            <select name="kategori" id="kategori" required style="width: 318px; padding: 8px;">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="judul" style="display: block;">Judul</label>
            <input type="text" id="judul" name="judul" required style="width: 600px; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="file" style="display: block;">File Surat (PDF)</label>
            <input type="file" id="file" name="file" required accept=".pdf">
        </div>

        <a href="{{ route('surat.index') }}" class="btn" style="background-color: #6c757d;"> << Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection