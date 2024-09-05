<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Keluarga;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index(Request $request)
    {
        $show = 10;
        $perPage = $request->input('per_page', $show);
        $keluarga = Keluarga::with('kelurahan', 'sector')->where('status', 'aktif')->paginate($perPage);
        return view('admin.mgmt-jemaat.keluarga.index', compact('keluarga', 'perPage'));
    }

    public function create()
    {
        $sector = Sector::all();
        $provinsi = Provinsi::all();

        $lastId = Keluarga::max('keluarga_id');
        $number = $lastId ? $lastId + 1 : 1;
        $newId = str_pad($number, 4, '0', STR_PAD_LEFT);

        return view('admin.mgmt-jemaat.keluarga.create', compact('sector', 'provinsi', 'newId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'keluarga_id' => 'required',
            'kelurahan_id' => 'required',
            'sector_id' => 'required',
            'nama' => 'required',
            'alias' => 'nullable',
            'alamat' => 'required',
            'status' => 'required'
        ], [
            'kelurahan_id.required' => 'harap pilih kelurahan.',
            'sector_id.required' => 'harap pilih sektor.',
            'nama.required' => 'nama wajib diisi.',
            'alamat.required' => 'alamat wajib diisi.'
        ]);

        Keluarga::create($validated);

        return redirect()->route('mgmt.keluarga.index')->with('success', 'keluarga baru berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $data = Keluarga::with('kelurahan', 'sector', 'jemaat')->where('keluarga_id', $id)->get();
        return view('admin.mgmt-jemaat.keluarga.show', compact('data'));
    }

    public function edit($id)
    {
        $sector = Sector::all();
        $provinsi = Provinsi::all();

        $data = Keluarga::with('kelurahan', 'sector')->where('keluarga_id', $id)->get();

        return view('admin.mgmt-jemaat.keluarga.edit', compact('data', 'sector', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kelurahan_id' => 'required',
            'sector_id' => 'required',
            'nama' => 'required',
            'alias' => 'nullable',
            'alamat' => 'required',
            'status' => 'required'
        ], [
            'kelurahan_id.required' => 'harap pilih kelurahan.',
            'sector_id.required' => 'harap pilih sektor.',
            'nama.required' => 'nama wajib diisi.',
            'alamat.required' => 'alamat wajib diisi.'
        ]);

        Keluarga::where('keluarga_id', $id)->update($validated);

        return redirect()->route('mgmt.keluarga.index')->with('success', 'keluarga berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        Keluarga::where('keluarga_id', $id)->delete();

        return redirect()->route('mgmt.keluarga.index')->with('success', 'keluarga berhasil dihapus!');
    }

    public function getKeluargaBySectorId($sectorId)
    {
        $keluarga = Keluarga::where('sector_id', $sectorId)->where('status', 'aktif')->get();
        return response()->json($keluarga);
    }
}
