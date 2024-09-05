<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BreadcrumbMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
        $breadcrumb = [];

        if ($routeName === 'mgmt.sektor.bph.edit' || $routeName === 'mgmt.sektor.bph.create') {
            // Ambil sektor dari parameter di route
            $sector = $request->route('sector');

            // Cek apakah $sector adalah objek model atau string
            if (is_object($sector)) {
                $sectorName = $sector->nama;
            } else {
                $sectorName = $sector; // Menggunakan string langsung jika tidak berupa objek
            }

            $breadcrumb[] = ['name' => 'Admin', 'url' => url('/admin')];
            $breadcrumb[] = ['name' => 'Sektor', 'url' => url('/admin/sektor')];
            $breadcrumb[] = ['name' => 'Pengurus ' . $sectorName, 'url' => url("/admin/sektor/{$sectorName}")];

            if ($routeName === 'mgmt.sektor.bph.edit') {
                $breadcrumb[] = ['name' => 'Edit', 'url' => url("/admin/sektor/pengurus-{$sectorName}/{id}/edit")];
            } elseif ($routeName === 'mgmt.sektor.bph.create') {
                $breadcrumb[] = ['name' => 'Tambah Baru', 'url' => url("/admin/sektor/pengurus-baru/{$sectorName}")];
            }
        } elseif ($routeName === 'mgmt.keluarga.show' || $routeName === 'mgmt.keluarga.edit') {
            $keluarga = $request->route('keluarga');

            // Cek apakah $keluarga adalah objek atau string
            if (is_object($keluarga)) {
                $namaKeluarga = $keluarga->nama;
                $keluargaId = $keluarga->keluarga_id;
            } else {
                // Jika $keluarga adalah string, ambil dari database
                $keluargaModel = \App\Models\Keluarga::where('keluarga_id', $keluarga)->first();
                $namaKeluarga = $keluargaModel ? $keluargaModel->nama : '';
                $keluargaId = $keluargaModel ? $keluargaModel->keluarga_id : '';
            }

            $breadcrumb[] = ['name' => 'Admin', 'url' => url('/admin')];
            $breadcrumb[] = ['name' => 'Kepala Keluarga', 'url' => url('/admin/kepala-keluarga')];

            if ($routeName === 'mgmt.keluarga.show') {
                $breadcrumb[] = ['name' => $namaKeluarga, 'url' => url("/admin/kepala-keluarga/{$keluargaId}")];
            } elseif ($routeName === 'mgmt.keluarga.edit') {
                $breadcrumb[] = ['name' => $namaKeluarga, 'url' => url("/admin/kepala-keluarga/{$keluargaId}/edit")];
            }
        } elseif ($routeName === 'majelis.pendeta.edit') {
            $breadcrumb[] = ['name' => 'Admin', 'url' => url('/admin')];
            $breadcrumb[] = ['name' => 'Pendeta', 'url' => url('/admin/pendeta')];
            $breadcrumb[] = ['name' => 'Edit', 'url' => url('/admin/pendeta/{id}/edit')];
        } else {
            $segments = $request->segments();
            $url = '';

            foreach ($segments as $segment) {
                $url .= '/' . $segment;
                $breadcrumb[] = [
                    'name' => ucfirst(str_replace('-', ' ', $segment)),
                    'url'  => url($url),
                ];
            }
        }

        // Bagikan breadcrumb ke semua view
        View::share('breadcrumb', $breadcrumb);

        return $next($request);
    }
}
