@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
    <h1>Arsip Surat</h1>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
    Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

    <form action="{{ route('surat.index') }}" method="GET" class="search-form">
        <label for="search" style="margin-right: 10px; align-self: center;">Cari surat:</label>
        <input type="text" id="search" name="search" placeholder="Cari berdasarkan judul surat..." value="{{ request('search') }}">
        <input type="submit" value="Cari">
    </form>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="color: red; margin-bottom: 15px;">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($surats as $surat)
                <tr>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->kategori }}</td>
                    <td>{{ $surat->judul }}</td>
                    <td>{{ $surat->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <form id="delete-form-{{ $surat->id }}" action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('delete-form-{{ $surat->id }}')">Hapus</button>
                        
                        <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-warning">Unduh</a>
                        <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-info">Lihat >></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data surat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <br>
    <a href="{{ route('surat.create') }}" class="btn btn-primary">Arsipkan Surat...</a>
@endsection
