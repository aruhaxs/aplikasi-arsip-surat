@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
    <h1>Kategori Surat</h1>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
    Klik "Tambah" untuk menambahkan kategori baru.</p>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->keterangan }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Menghapus kategori akan menghapus semua surat yang terkait. Apakah Anda yakin?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori Baru...</a>
@endsection