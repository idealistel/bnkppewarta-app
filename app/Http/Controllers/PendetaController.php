<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pendeta;
use Illuminate\Http\Request;

class PendetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $show = 10;
        $perPage = $request->input('per_page', $show);
        $pendeta = Pendeta::orderBy('prdakhir', 'desc')->paginate($perPage);

        return view('admin.mgmt-majelis.pendeta.index', compact('pendeta', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mgmt-majelis.pendeta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'prdawal' => 'required|date',
            'prdakhir' => 'required|date',
        ], [
            'nama.required' => 'nama wajib diisi',
            'prdawal.required' => 'pilih tanggal awal periode',
            'prdawal.date' => 'format tanggal salah',
            'prdakhir.required' => 'pilih tanggal akhir periode',
            'prdakhir.date' => 'format tanggal salah',
        ]);

        Pendeta::create($validated);

        return redirect()->route('majelis.pendeta.index')->with('success', 'pendeta dengan nama <span class="font-medium">' . $request->nama . '</span> berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pendeta::find($id);
        return view('admin.mgmt-majelis.pendeta.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'prdawal' => 'required|date',
            'prdakhir' => 'required|date',
        ], [
            'nama.required' => 'nama wajib diisi',
            'prdawal.required' => 'pilih tanggal awal periode',
            'prdawal.date' => 'format tanggal salah',
            'prdakhir.required' => 'pilih tanggal akhir periode',
            'prdakhir.date' => 'format tanggal salah',
        ]);

        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'prdawal' => Carbon::parse($request->prdawal)->format('Y-m-d'),
            'prdakhir' => Carbon::parse($request->prdakhir)->format('Y-m-d'),
        ];

        Pendeta::where('id', $id)->update($data);

        return redirect()->route('majelis.pendeta.index')->with('success', 'pendeta dengan nama <span class="font-medium">' . $request->nama . '</span> berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pendeta::where('id', $id)->get();
        $data[0]->delete();

        return redirect()->back()->with('success', 'pendeta dengan nama <span class="font-medium">' . $data[0]->nama . '</span> berhasil dihapus.');
    }
}
