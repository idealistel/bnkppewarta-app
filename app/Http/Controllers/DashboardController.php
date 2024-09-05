<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Jemaat;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $user = $user->username;
        $keluarga_aktif = Keluarga::where('status', 'aktif')->count();
        $jemaat_aktif = Jemaat::where('status', 'aktif')->count();
        $laki_laki_aktif = Jemaat::where('jeniskelamin', 'laki-laki')->where('status', 'aktif')->count();
        $perempuan_aktif = Jemaat::where('jeniskelamin', 'perempuan')->where('status', 'aktif')->count();

        // isi grafik jemaat
        $balita_laki_laki = Jemaat::whereDate('tanggallahir', '>', Carbon::now()->subYears(6))->where('status', 'aktif')->where('jeniskelamin', 'laki-laki')->count();
        $balita_perempuan = Jemaat::whereDate('tanggallahir', '>', Carbon::now()->subYears(6))->where('status', 'aktif')->where('jeniskelamin', 'perempuan')->count();
        $anak_laki_laki = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(6))
            ->whereDate('tanggallahir', '>', Carbon::now()->subYears(13))->where('status', 'aktif')->where('jeniskelamin', 'laki-laki')->count();
        $anak_perempuan = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(6))
            ->whereDate('tanggallahir', '>', Carbon::now()->subYears(13))->where('status', 'aktif')->where('jeniskelamin', 'perempuan')->count();
        $remaja_laki_laki = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(13))
            ->whereDate('tanggallahir', '>', Carbon::now()->subYears(21))->where('status', 'aktif')->where('jeniskelamin', 'laki-laki')->count();
        $remaja_perempuan = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(13))
            ->whereDate('tanggallahir', '>', Carbon::now()->subYears(21))->where('status', 'aktif')->where('jeniskelamin', 'perempuan')->count();
        $dewasa_laki_laki = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(21))
            ->whereDate('tanggallahir', '>', Carbon::now()->subYears(60))->where('status', 'aktif')->where('jeniskelamin', 'laki-laki')->count();
        $dewasa_perempuan = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(21))
            ->whereDate('tanggallahir', '>', Carbon::now()->subYears(60))->where('status', 'aktif')->where('jeniskelamin', 'perempuan')->count();
        $lansia_laki_laki = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(60))->where('status', 'aktif')->where('jeniskelamin', 'laki-laki')->count();
        $lansia_perempuan = Jemaat::whereDate('tanggallahir', '<=', Carbon::now()->subYears(60))->where('status', 'aktif')->where('jeniskelamin', 'perempuan')->count();

        return view('admin.dashboard', compact(
            'user',
            'keluarga_aktif',
            'jemaat_aktif',
            'laki_laki_aktif',
            'perempuan_aktif',
            'balita_laki_laki',
            'balita_perempuan',
            'anak_laki_laki',
            'anak_perempuan',
            'remaja_laki_laki',
            'remaja_perempuan',
            'dewasa_laki_laki',
            'dewasa_perempuan',
            'lansia_laki_laki',
            'lansia_perempuan'
        ));
    }
}
