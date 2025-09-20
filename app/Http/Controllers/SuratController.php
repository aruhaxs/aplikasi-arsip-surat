<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $surats = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('surat.index', compact('surats'));
    }
    
    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris')); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file')->store('public/surat');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file_path' => str_replace('public/', '', $filePath),
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diarsipkan!');
    }

    public function edit(Surat $surat)
    {
        $kategoris = Kategori::all(); 
        return view('surat.edit', compact('surat', 'kategoris'));
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $dataToUpdate = $request->only(['nomor_surat', 'kategori', 'judul']);

        if ($request->hasFile('file')) {
            if (Storage::disk('public')->exists($surat->file_path)) {
                Storage::disk('public')->delete($surat->file_path);
            }

            $filePath = $request->file('file')->store('public/surat');
            $dataToUpdate['file_path'] = str_replace('public/', '', $filePath);
        }

        $surat->update($dataToUpdate);

        return redirect()->route('surat.show', $surat->id)->with('success', 'Surat berhasil diperbarui!');
    }

    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function destroy(Surat $surat)
    {
        if (Storage::disk('public')->exists($surat->file_path)) {
            Storage::disk('public')->delete($surat->file_path);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus!');
    }

    public function download(Surat $surat)
    {
        $filePath = storage_path('app/public/' . $surat->file_path);

        if (!file_exists($filePath)) {
            return redirect()->route('surat.index')->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath);
    }
}