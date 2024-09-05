<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jemaat;
use App\Models\Sector;
use App\Models\Keluarga;
use App\Models\StatusJemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class JemaatController extends Controller
{
    public function index(Request $request)
    {
        $show = 10;
        $perPage = $request->input('per_page', $show);
        $jemaat = Jemaat::with('keluarga')->orderBy('keluarga_id', 'desc')->orderBy('stambuk', 'asc')->where('status', 'aktif')->paginate($perPage);
        return view('admin.mgmt-jemaat.jemaat.index', compact('jemaat', 'perPage'));
    }

    public function create()
    {
        $sectors = Sector::all();
        return view('admin.mgmt-jemaat.jemaat.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'stambuk' => 'required',
                'keluarga_id' => 'required',
                'nama' => 'required',
                'alias' => 'nullable',
                'jeniskelamin' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'hubungankeluarga' => 'required',
                'namaayah' => 'nullable',
                'namaibu' => 'nullable',
                'statusbaptis' => 'required',
                'tanggalbaptis' => 'nullable',
                'gerejabaptis' => 'nullable',
                'resortbaptis' => 'nullable',
                'aktabaptis' => 'nullable',
                'statussidi' => 'required',
                'tanggalsidi' => 'nullable',
                'gerejasidi' => 'nullable',
                'resortsidi' => 'nullable',
                'aktasidi' => 'nullable',
                'statusnikah' => 'required',
                'tanggalnikah' => 'nullable',
                'gerejanikah' => 'nullable',
                'resortnikah' => 'nullable',
                'aktanikah' => 'nullable',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'tanggaldaftar' => 'nullable',
                'hp' => 'nullable',
                'status' => 'required',
            ],
            [
                'keluarga_id' => 'harap pilih keluarga.',
                'nama' => 'nama wajib diisi.',
                'alias' => 'nullable',
                'jeniskelamin' => 'harap pilih jenis kelamin.',
                'tempatlahir' => 'tempat lahir wajib diisi.',
                'tanggallahir' => 'tanggal lahir wajib diisi.',
                'hubungankeluarga' => 'harap pilih hubungan keluarga.'
            ]
        );

        Jemaat::create($validated);

        return redirect()->route('mgmt.jemaat.index')->with('success', "Jemaat bernama <strong>" . $request->nama . "</strong> berhasil ditambahkan!");
    }

    public function show($stambuk)
    {
        $data = Jemaat::with('keluarga', 'statusjemaat')->where('stambuk', $stambuk)->get();
        return view('admin.mgmt-jemaat.jemaat.show', compact('data'));
    }

    public function edit($stambuk)
    {
        $data = Jemaat::with('keluarga', 'statusjemaat')->where('stambuk', $stambuk)->get();
        $sectors = Sector::all();
        return view('admin.mgmt-jemaat.jemaat.edit', compact('data', 'sectors'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'keluarga_id' => 'required',
                'nama' => 'required',
                'alias' => 'nullable',
                'jeniskelamin' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'hubungankeluarga' => 'required',
                'namaayah' => 'nullable',
                'namaibu' => 'nullable',
                'statusbaptis' => 'required',
                'tanggalbaptis' => 'nullable',
                'gerejabaptis' => 'nullable',
                'resortbaptis' => 'nullable',
                'aktabaptis' => 'nullable',
                'statussidi' => 'required',
                'tanggalsidi' => 'nullable',
                'gerejasidi' => 'nullable',
                'resortsidi' => 'nullable',
                'aktasidi' => 'nullable',
                'statusnikah' => 'required',
                'tanggalnikah' => 'nullable',
                'gerejanikah' => 'nullable',
                'resortnikah' => 'nullable',
                'aktanikah' => 'nullable',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'tanggaldaftar' => 'nullable',
                'hp' => 'nullable',
                'status' => 'required',
            ],
            [
                'keluarga_id' => 'harap pilih keluarga.',
                'nama' => 'nama wajib diisi.',
                'alias' => 'nullable',
                'jeniskelamin' => 'harap pilih jenis kelamin.',
                'tempatlahir' => 'tempat lahir wajib diisi.',
                'tanggallahir' => 'tanggal lahir wajib diisi.',
                'hubungankeluarga' => 'harap pilih hubungan keluarga.'
            ]
        );

        $data = [
            'keluarga_id' => $request->keluarga_id,
            'nama' => $request->nama,
            'alias' => $request->alias,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => Carbon::parse($request->tanggallahir)->format('Y-m-d'),
            'hubungankeluarga' => $request->hubungankeluarga,
            'namaayah' => $request->namaayah,
            'namaibu' => $request->namaibu,
            'statusbaptis' => $request->statusbaptis,
            'tanggalbaptis' => $request->filled('tanggalbaptis') ? Carbon::createFromFormat('d-m-Y', $request->tanggalbaptis)->format('Y-m-d') : null,
            'gerejabaptis' => $request->gerejabaptis,
            'resortbaptis' => $request->resortbaptis,
            'aktabaptis' => $request->aktabaptis,
            'statussidi' => $request->statussidi,
            'tanggalsidi' => $request->filled('tanggalsidi') ? Carbon::createFromFormat('d-m-Y', $request->tanggalsidi)->format('Y-m-d') : null,
            'gerejasidi' => $request->gerejasidi,
            'resortsidi' => $request->resortsidi,
            'aktasidi' => $request->aktasidi,
            'statusnikah' => $request->statusnikah,
            'tanggalnikah' => $request->filled('tanggalnikah') ? Carbon::createFromFormat('d-m-Y', $request->tanggalnikah)->format('Y-m-d') : null,
            'gerejanikah' => $request->gerejanikah,
            'resortnikah' => $request->resortnikah,
            'aktanikah' => $request->aktanikah,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tanggaldaftar' => $request->filled('tanggaldaftar') ? Carbon::createFromFormat('d-m-Y', $request->tanggaldaftar)->format('Y-m-d') : null,
            'hp' => $request->hp,
            'status' => $request->status,
        ];

        if ($request->status === 'aktif') {
            StatusJemaat::where('stambuk', $request->stambuk)->delete();
        } else {
            $request->validate([
                'tanggalstatus' => 'required',
                'status1' => 'required',
                'status2' => 'required',
            ], [
                'tanggalstatus.required' => 'pilih tanggal',
                'status1.required' => 'wajib diisi',
                'status2.required' => 'wajib diisi',
            ]);

            StatusJemaat::updateOrInsert(
                ['stambuk' => $request->stambuk],
                [
                    'tanggalstatus' => Carbon::parse($request->tanggalstatus)->format('Y-m-d'),
                    'status1' => $request->status1,
                    'status2' => $request->status2
                ]
            );
        }

        Jemaat::where('stambuk', $request->stambuk)->update($data);

        return redirect()->route('mgmt.jemaat.index')->with('success', 'jemaat bernama ' . $request->nama . ' berhasil diupdate.');
    }

    public function indexPindah(Request $request)
    {
        $show = 10;
        $perPage = $request->input('per_page', $show);
        $jemaat = Jemaat::with('keluarga')->orderBy('keluarga_id', 'desc')->where('status', 'pindah')->paginate($perPage);
        return view('admin.mgmt-jemaat.jemaat.indexpindah', compact('jemaat', 'perPage'));
    }

    public function editPindah($stambuk)
    {
        $data = Jemaat::with('keluarga', 'statusjemaat')->where('stambuk', $stambuk)->get();
        $sectors = Sector::all();
        return view('admin.mgmt-jemaat.jemaat.editpindah', compact('data', 'sectors'));
    }

    public function updatePindah(Request $request)
    {
        $request->validate(
            [
                'keluarga_id' => 'required',
                'nama' => 'required',
                'alias' => 'nullable',
                'jeniskelamin' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'hubungankeluarga' => 'required',
                'namaayah' => 'nullable',
                'namaibu' => 'nullable',
                'statusbaptis' => 'required',
                'tanggalbaptis' => 'nullable',
                'gerejabaptis' => 'nullable',
                'resortbaptis' => 'nullable',
                'aktabaptis' => 'nullable',
                'statussidi' => 'required',
                'tanggalsidi' => 'nullable',
                'gerejasidi' => 'nullable',
                'resortsidi' => 'nullable',
                'aktasidi' => 'nullable',
                'statusnikah' => 'required',
                'tanggalnikah' => 'nullable',
                'gerejanikah' => 'nullable',
                'resortnikah' => 'nullable',
                'aktanikah' => 'nullable',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'tanggaldaftar' => 'nullable',
                'hp' => 'nullable',
                'status' => 'required',
            ],
            [
                'keluarga_id' => 'harap pilih keluarga.',
                'nama' => 'nama wajib diisi.',
                'alias' => 'nullable',
                'jeniskelamin' => 'harap pilih jenis kelamin.',
                'tempatlahir' => 'tempat lahir wajib diisi.',
                'tanggallahir' => 'tanggal lahir wajib diisi.',
                'hubungankeluarga' => 'harap pilih hubungan keluarga.'
            ]
        );

        $data = [
            'keluarga_id' => $request->keluarga_id,
            'nama' => $request->nama,
            'alias' => $request->alias,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => Carbon::parse($request->tanggallahir)->format('Y-m-d'),
            'hubungankeluarga' => $request->hubungankeluarga,
            'namaayah' => $request->namaayah,
            'namaibu' => $request->namaibu,
            'statusbaptis' => $request->statusbaptis,
            'tanggalbaptis' => $request->filled('tanggalbaptis') ? Carbon::createFromFormat('d-m-Y', $request->tanggalbaptis)->format('Y-m-d') : null,
            'gerejabaptis' => $request->gerejabaptis,
            'resortbaptis' => $request->resortbaptis,
            'aktabaptis' => $request->aktabaptis,
            'statussidi' => $request->statussidi,
            'tanggalsidi' => $request->filled('tanggalsidi') ? Carbon::createFromFormat('d-m-Y', $request->tanggalsidi)->format('Y-m-d') : null,
            'gerejasidi' => $request->gerejasidi,
            'resortsidi' => $request->resortsidi,
            'aktasidi' => $request->aktasidi,
            'statusnikah' => $request->statusnikah,
            'tanggalnikah' => $request->filled('tanggalnikah') ? Carbon::createFromFormat('d-m-Y', $request->tanggalnikah)->format('Y-m-d') : null,
            'gerejanikah' => $request->gerejanikah,
            'resortnikah' => $request->resortnikah,
            'aktanikah' => $request->aktanikah,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tanggaldaftar' => $request->filled('tanggaldaftar') ? Carbon::createFromFormat('d-m-Y', $request->tanggaldaftar)->format('Y-m-d') : null,
            'hp' => $request->hp,
            'status' => $request->status,
        ];

        if ($request->status === 'aktif') {
            StatusJemaat::where('stambuk', $request->stambuk)->delete();
        } else {
            $request->validate([
                'tanggalstatus' => 'required',
                'status1' => 'required',
                'status2' => 'required',
            ], [
                'tanggalstatus.required' => 'pilih tanggal',
                'status1.required' => 'wajib diisi',
                'status2.required' => 'wajib diisi',
            ]);

            StatusJemaat::updateOrInsert(
                ['stambuk' => $request->stambuk],
                [
                    'tanggalstatus' => Carbon::parse($request->tanggalstatus)->format('Y-m-d'),
                    'status1' => $request->status1,
                    'status2' => $request->status2
                ]
            );
        }

        Jemaat::where('stambuk', $request->stambuk)->update($data);

        return redirect()->route('mgmt.jemaatpindah.index')->with('success', 'jemaat bernama ' . $request->nama . ' berhasil diupdate.');
    }

    public function indexMeninggal(Request $request)
    {
        $show = 10;
        $perPage = $request->input('per_page', $show);
        $jemaat = Jemaat::with('keluarga')->orderBy('keluarga_id', 'desc')->where('status', 'meninggal')->paginate($perPage);
        return view('admin.mgmt-jemaat.jemaat.indexmeninggal', compact('jemaat', 'perPage'));
    }

    public function editMeninggal($stambuk)
    {
        $data = Jemaat::with('keluarga', 'statusjemaat')->where('stambuk', $stambuk)->get();
        $sectors = Sector::all();
        return view('admin.mgmt-jemaat.jemaat.editmeninggal', compact('data', 'sectors'));
    }

    public function updateMeninggal(Request $request)
    {
        $request->validate(
            [
                'keluarga_id' => 'required',
                'nama' => 'required',
                'alias' => 'nullable',
                'jeniskelamin' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'hubungankeluarga' => 'required',
                'namaayah' => 'nullable',
                'namaibu' => 'nullable',
                'statusbaptis' => 'required',
                'tanggalbaptis' => 'nullable',
                'gerejabaptis' => 'nullable',
                'resortbaptis' => 'nullable',
                'aktabaptis' => 'nullable',
                'statussidi' => 'required',
                'tanggalsidi' => 'nullable',
                'gerejasidi' => 'nullable',
                'resortsidi' => 'nullable',
                'aktasidi' => 'nullable',
                'statusnikah' => 'required',
                'tanggalnikah' => 'nullable',
                'gerejanikah' => 'nullable',
                'resortnikah' => 'nullable',
                'aktanikah' => 'nullable',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'tanggaldaftar' => 'nullable',
                'hp' => 'nullable',
                'status' => 'required',
            ],
            [
                'keluarga_id' => 'harap pilih keluarga.',
                'nama' => 'nama wajib diisi.',
                'alias' => 'nullable',
                'jeniskelamin' => 'harap pilih jenis kelamin.',
                'tempatlahir' => 'tempat lahir wajib diisi.',
                'tanggallahir' => 'tanggal lahir wajib diisi.',
                'hubungankeluarga' => 'harap pilih hubungan keluarga.'
            ]
        );

        $data = [
            'keluarga_id' => $request->keluarga_id,
            'nama' => $request->nama,
            'alias' => $request->alias,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => Carbon::parse($request->tanggallahir)->format('Y-m-d'),
            'hubungankeluarga' => $request->hubungankeluarga,
            'namaayah' => $request->namaayah,
            'namaibu' => $request->namaibu,
            'statusbaptis' => $request->statusbaptis,
            'tanggalbaptis' => $request->filled('tanggalbaptis') ? Carbon::createFromFormat('d-m-Y', $request->tanggalbaptis)->format('Y-m-d') : null,
            'gerejabaptis' => $request->gerejabaptis,
            'resortbaptis' => $request->resortbaptis,
            'aktabaptis' => $request->aktabaptis,
            'statussidi' => $request->statussidi,
            'tanggalsidi' => $request->filled('tanggalsidi') ? Carbon::createFromFormat('d-m-Y', $request->tanggalsidi)->format('Y-m-d') : null,
            'gerejasidi' => $request->gerejasidi,
            'resortsidi' => $request->resortsidi,
            'aktasidi' => $request->aktasidi,
            'statusnikah' => $request->statusnikah,
            'tanggalnikah' => $request->filled('tanggalnikah') ? Carbon::createFromFormat('d-m-Y', $request->tanggalnikah)->format('Y-m-d') : null,
            'gerejanikah' => $request->gerejanikah,
            'resortnikah' => $request->resortnikah,
            'aktanikah' => $request->aktanikah,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tanggaldaftar' => $request->filled('tanggaldaftar') ? Carbon::createFromFormat('d-m-Y', $request->tanggaldaftar)->format('Y-m-d') : null,
            'hp' => $request->hp,
            'status' => $request->status,
        ];

        if ($request->status === 'aktif') {
            StatusJemaat::where('stambuk', $request->stambuk)->delete();
        } else {
            $request->validate([
                'tanggalstatus' => 'required',
                'status1' => 'required',
                'status2' => 'required',
            ], [
                'tanggalstatus.required' => 'pilih tanggal',
                'status1.required' => 'wajib diisi',
                'status2.required' => 'wajib diisi',
            ]);

            StatusJemaat::updateOrInsert(
                ['stambuk' => $request->stambuk],
                [
                    'tanggalstatus' => Carbon::parse($request->tanggalstatus)->format('Y-m-d'),
                    'status1' => $request->status1,
                    'status2' => $request->status2
                ]
            );
        }

        Jemaat::where('stambuk', $request->stambuk)->update($data);

        return redirect()->route('mgmt.jemaatmeninggal.index')->with('success', 'jemaat bernama ' . $request->nama . ' berhasil diupdate.');
    }

    public function destroy($stambuk)
    {
        Jemaat::where('stambuk', $stambuk)->delete();

        return redirect()->back()->with('success', 'jemaat dengan nomor stambuk ' . $stambuk . ' berhasil dihapus.');
    }

    public function nomorStambukJemaat($keluarga_id, Request $request)
    {
        $terakhir = Jemaat::where('keluarga_id', $keluarga_id)->orderBy('stambuk', 'desc')->first();
        $klg = Keluarga::where('keluarga_id', $keluarga_id)->get();
        $alamat = $klg[0]->alamat . ", kel. " . $klg[0]->kelurahan->nama . ", kec. " . $klg[0]->kelurahan->kecamatan->nama . $klg[0]->kelurahan->kecamatan->kabupaten->nama . ", prop." . $klg[0]->kelurahan->kecamatan->kabupaten->provinsi->nama;

        if ($terakhir) {
            $stambukAkhir = substr($terakhir->stambuk, -2);
            $stambukBaru = str_pad($stambukAkhir + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $stambukBaru = '01';
        }

        return response()->json([$keluarga_id, $alamat, $keluarga_id . $stambukBaru]);
    }
}
