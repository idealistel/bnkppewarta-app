<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Http\Controllers\Controller;

class AlamatController extends Controller
{
    public function getKabupatenByProvinsi($provinsiId)
    {
        $kabupaten = Kabupaten::where('provinsi_id', $provinsiId)->get();
        return response()->json($kabupaten);
    }

    public function getKecamatanByKabupaten($kabupatenId)
    {
        $kecamatan = Kecamatan::where('kabupaten_id', $kabupatenId)->get();
        return response()->json($kecamatan);
    }
    public function getKelurahanByKecamatan($kecamatanId)
    {
        $kelurahan = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
        return response()->json($kelurahan);
    }
}
