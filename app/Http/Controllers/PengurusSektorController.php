<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Models\PengurusSektor;

class PengurusSektorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sector $sector)
    {
        return view('admin.mgmt-jemaat.sektor.pengurus-create', compact('sector'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_id' => 'required',
            'prdawal' => 'required',
            'prdakhir' => 'required',
            'koordinator' => 'required',
            'sekretaris' => 'required',
            'bendahara' => 'required',
        ], [
            'prdawal.required' => 'Pilih periode awal',
            'prdakhir.required' => 'Pilih periode akhir',
            'koordinator.required' => 'Wajib diisi',
            'sekretaris.required' => 'Wajib diisi',
            'bendahara.required' => 'Wajib diisi',
        ]);

        PengurusSektor::create($validated);

        return redirect()->route('mgmt.sektor.show', [$request->sector_name])->with('success', 'Pengurus sektor yang baru berhasil ditambahkan!');
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
    public function edit($sector, $id)
    {
        $data = PengurusSektor::with('sector')->where('id', $id)->get();

        return view('admin.mgmt-jemaat.sektor.pengurus-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sector_id' => 'required',
            'prdawal' => 'required',
            'prdakhir' => 'required',
            'koordinator' => 'required',
            'sekretaris' => 'required',
            'bendahara' => 'required',
        ], [
            'prdawal.required' => 'Pilih periode awal',
            'prdakhir.required' => 'Pilih periode akhir',
            'koordinator.required' => 'Wajib diisi',
            'sekretaris.required' => 'Wajib diisi',
            'bendahara.required' => 'Wajib diisi',
        ]);

        $data = [
            'sector_id' => $request->sector_id,
            'prdawal' => Carbon::parse($request->prdawal)->format('Y-m-d'),
            'prdakhir' => Carbon::parse($request->prdakhir)->format('Y-m-d'),
            'koordinator' => $request->koordinator,
            'sekretaris' => $request->sekretaris,
            'bendahara' => $request->bendahara,
        ];

        // dd($data);

        PengurusSektor::where('id', $id)->update($data);

        return redirect()->route('mgmt.sektor.show', [$request->sector_name])->with('success', 'Pengurus sektor telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PengurusSektor::find($id)->delete();

        return redirect()->back()->with('success', 'Pengurus sektor telah dihapus!');
    }
}
