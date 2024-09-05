<?php

namespace App\Http\Controllers;

use App\Models\PengurusSektor;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $show = 10;
        $perPage = $request->input('per_page', $show);
        $sectors = Sector::with(['pengurussektor' => function ($query) {
            $query->whereDate('prdakhir', '>=', now());
        }])->withCount(['keluarga'])->paginate($perPage);
        return view('admin.mgmt-jemaat.sektor.index', compact('sectors', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mgmt-jemaat.sektor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'unique:sectors']
        ], [
            'nama.required' => 'Nama sektor masih kosong..',
            'nama.unique' => 'Nama sektor yang ada masukkan sudah ada..'
        ]);

        // dd($validated);

        Sector::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('mgmt.sektor.index')->with('success', 'Sector baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($nama)
    {
        $sector = Sector::where('nama', $nama)->with([
            'saat_ini' => function ($query) {
                $query->whereDate('prdakhir', '>=', now());
            },
            'pengurussektor' => function ($query) {
                $query->orderBy('prdakhir', 'desc');
            }
        ])->get();

        if (!$sector) {
            abort(404);
        }

        return view('admin.mgmt-jemaat.sektor.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nama, Sector $sector)
    {
        return view('admin.mgmt-jemaat.sektor.edit', compact('nama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nama)
    {
        $request->validate([
            'nama' => ['required', 'unique:sectors']
        ], [
            'nama.required' => 'Nama sektor masih kosong..'
        ]);

        Sector::where('nama', $nama)->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('mgmt.sektor.index')->with('success', 'Sector berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sector::find($id)->delete();

        return redirect()->route('mgmt.sektor.index')->with('success', 'Sector telah dihapus!');
    }
}
