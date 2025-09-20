@extends('layouts.app')

@section('title', 'Lihat Surat')

@section('content')
    <h1>Arsip Surat >> Lihat</h1>
    <p>
        <strong>Nomor:</strong> {{ $surat->nomor_surat }} <br>
        <strong>Kategori:</strong> {{ $surat->kategori }} <br>
        <strong>Judul:</strong> {{ $surat->judul }} <br>
        <strong>Waktu Unggah:</strong> {{ $surat->created_at->format('d-m-Y H:i:s') }}
    </p>
    <hr>

    <iframe src="{{ asset('storage/' . $surat->file_path) }}" width="100%" height="500px"></iframe>

    <br><br>
    <a href="{{ route('surat.index') }}" class="btn" style="background-color: #6c757d;"> << Kembali</a>
    <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-warning">Unduh</a>
    <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary">Edit/Ganti File</a>
    @endsection