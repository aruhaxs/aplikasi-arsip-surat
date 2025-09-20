@extends('layouts.app')

@section('title', 'About')

@section('content')
    <h1>About</h1>
    <div style="display: flex; align-items: center;">
        <img src="{{ asset('img/amir.jpg') }}" alt="Foto Profil" style="width: 150px; height: 200px; border-radius: 5px; margin-right: 20px;">
        <div>
            <p>Aplikasi ini dibuat oleh:</p>
            <p><strong>Nama:</strong> Amirul Hafizh</p>
            <p><strong>Prodi:</strong> D3-MI PSDKU Kediri</p>
            <p><strong>NIM:</strong> 2331730085</p>
            <p><strong>Tanggal:</strong> {{ date('d F Y') }}</p>
        </div>
    </div>
@endsection