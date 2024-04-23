<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    //
    public function index()
    {
        $mobils = Mobil::all();
        return view('mobil.index', compact('mobils'));
    }

    // Menampilkan form untuk menambahkan mobil baru
    public function create()
    {
        return view('mobil.tambah');
    }

    // Menyimpan mobil baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required|unique:mobils',
            'tarif_sewa_per_hari' => 'required|numeric',
        ]);

        Mobil::create($request->all());

        return redirect()->route('mobil.index')
                         ->with('success', 'Mobil berhasil ditambahkan.');
    }
    public function edit(Mobil $mobil)
    {
        return view('mobil.edit', compact('mobil'));
    }

    // Memperbarui data mobil yang sudah ada di database
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required|unique:mobils,nomor_plat,'.$mobil->id,
            'tarif_sewa_per_hari' => 'required|numeric',
        ]);

        $mobil->update($request->all());

        return redirect()->route('mobil.index')
                         ->with('success', 'Data mobil berhasil diperbarui.');
    }

    // Menghapus mobil dari database
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('mobil.index')
                         ->with('success', 'Mobil berhasil dihapus.');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $mobils = Mobil::where('merek', 'LIKE', "%$keyword%")
            ->orWhere('model', 'LIKE', "%$keyword%")
            ->orWhere('nomor_plat', 'LIKE', "%$keyword%")
            ->orWhere('tarif_sewa_per_hari', 'LIKE', "%$keyword%")
            ->get();

        return view('mobil.index', compact('mobils'));
    }
}
