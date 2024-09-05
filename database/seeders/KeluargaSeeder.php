<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keluarga')->insert([
            ['keluarga_id' => '0001', 'kelurahan_id' => '1455', 'sector_id' => '1', 'nama' => 'Budi Santoso', 'alias' => '', 'alamat' => 'Jl. Melati No. 5', 'status' => 'aktif'],
            ['keluarga_id' => '0002', 'kelurahan_id' => '1455', 'sector_id' => '2', 'nama' => 'Andi Pratama', 'alias' => '', 'alamat' => 'Jl. Mawar No. 10', 'status' => 'aktif'],
            ['keluarga_id' => '0003', 'kelurahan_id' => '1455', 'sector_id' => '3', 'nama' => 'Agus Supriyadi', 'alias' => '', 'alamat' => 'Jl. Anggrek No. 23', 'status' => 'aktif'],
            ['keluarga_id' => '0004', 'kelurahan_id' => '1324', 'sector_id' => '4', 'nama' => 'Rendi Kusuma', 'alias' => '', 'alamat' => 'Jl. Kenanga No. 8', 'status' => 'aktif'],
            ['keluarga_id' => '0005', 'kelurahan_id' => '1324', 'sector_id' => '5', 'nama' => 'Wahyu Setiawan', 'alias' => '', 'alamat' => 'Jl. Flamboyan No. 12', 'status' => 'aktif'],
            ['keluarga_id' => '0006', 'kelurahan_id' => '1451', 'sector_id' => '1', 'nama' => 'Dedi Suryadi', 'alias' => '', 'alamat' => 'Jl. Dahlia No. 3', 'status' => 'aktif'],
            ['keluarga_id' => '0007', 'kelurahan_id' => '1451', 'sector_id' => '2', 'nama' => 'Yudi Hartono', 'alias' => '', 'alamat' => 'Jl. Kamboja No. 14', 'status' => 'aktif'],
            ['keluarga_id' => '0008', 'kelurahan_id' => '1223', 'sector_id' => '3', 'nama' => 'Eko Purwanto', 'alias' => '', 'alamat' => 'Jl. Mawar No. 15', 'status' => 'aktif'],
            ['keluarga_id' => '0009', 'kelurahan_id' => '1223', 'sector_id' => '4', 'nama' => 'Arif Wibowo', 'alias' => '', 'alamat' => 'Jl. Cempaka No. 6', 'status' => 'aktif'],
            ['keluarga_id' => '0010', 'kelurahan_id' => '1223', 'sector_id' => '5', 'nama' => 'Sutrisno', 'alias' => '', 'alamat' => 'Jl. Melur No. 7', 'status' => 'aktif'],
            ['keluarga_id' => '0011', 'kelurahan_id' => '1223', 'sector_id' => '1', 'nama' => 'Bayu Pratama', 'alias' => '', 'alamat' => 'Jl. Anggrek No. 18', 'status' => 'aktif'],
            ['keluarga_id' => '0012', 'kelurahan_id' => '1402', 'sector_id' => '2', 'nama' => 'Herman Suryadi', 'alias' => '', 'alamat' => 'Jl. Dahlia No. 19', 'status' => 'aktif'],
            ['keluarga_id' => '0013', 'kelurahan_id' => '1402', 'sector_id' => '3', 'nama' => 'Doni Saputra', 'alias' => '', 'alamat' => 'Jl. Kenanga No. 20', 'status' => 'aktif'],
            ['keluarga_id' => '0014', 'kelurahan_id' => '1402', 'sector_id' => '4', 'nama' => 'Irwan Santoso', 'alias' => '', 'alamat' => 'Jl. Mawar No. 21', 'status' => 'aktif'],
            ['keluarga_id' => '0015', 'kelurahan_id' => '1402', 'sector_id' => '5', 'nama' => 'Anton Hidayat', 'alias' => '', 'alamat' => 'Jl. Flamboyan No. 22', 'status' => 'aktif'],
            ['keluarga_id' => '0016', 'kelurahan_id' => '1410', 'sector_id' => '1', 'nama' => 'Joko Susanto', 'alias' => '', 'alamat' => 'Jl. Cempaka No. 23', 'status' => 'aktif'],
            ['keluarga_id' => '0017', 'kelurahan_id' => '1410', 'sector_id' => '2', 'nama' => 'Sugianto', 'alias' => '', 'alamat' => 'Jl. Kamboja No. 24', 'status' => 'aktif'],
            ['keluarga_id' => '0018', 'kelurahan_id' => '1410', 'sector_id' => '3', 'nama' => 'Wawan Setiawan', 'alias' => '', 'alamat' => 'Jl. Dahlia No. 25', 'status' => 'aktif'],
            ['keluarga_id' => '0019', 'kelurahan_id' => '1410', 'sector_id' => '4', 'nama' => 'Dani Hidayat', 'alias' => '', 'alamat' => 'Jl. Melati No. 26', 'status' => 'aktif'],
            ['keluarga_id' => '0020', 'kelurahan_id' => '1354', 'sector_id' => '5', 'nama' => 'Yoga Pratama', 'alias' => '', 'alamat' => 'Jl. Mawar No. 27', 'status' => 'aktif'],
            ['keluarga_id' => '0021', 'kelurahan_id' => '1354', 'sector_id' => '1', 'nama' => 'Agung Santoso', 'alias' => '', 'alamat' => 'Jl. Flamboyan No. 28', 'status' => 'aktif'],
            ['keluarga_id' => '0022', 'kelurahan_id' => '1354', 'sector_id' => '2', 'nama' => 'Heri Susanto', 'alias' => '', 'alamat' => 'Jl. Cempaka No. 29', 'status' => 'aktif'],
            ['keluarga_id' => '0023', 'kelurahan_id' => '1260', 'sector_id' => '3', 'nama' => 'Bima Pratama', 'alias' => '', 'alamat' => 'Jl. Melur No. 30', 'status' => 'aktif'],
            ['keluarga_id' => '0024', 'kelurahan_id' => '1260', 'sector_id' => '4', 'nama' => 'Rudi Suryadi', 'alias' => '', 'alamat' => 'Jl. Dahlia No. 31', 'status' => 'aktif'],
            ['keluarga_id' => '0025', 'kelurahan_id' => '1260', 'sector_id' => '5', 'nama' => 'Fahmi Wibowo', 'alias' => '', 'alamat' => 'Jl. Kamboja No. 32', 'status' => 'aktif'],
            ['keluarga_id' => '0026', 'kelurahan_id' => '1345', 'sector_id' => '1', 'nama' => 'Ari Setiawan', 'alias' => '', 'alamat' => 'Jl. Melati No. 33', 'status' => 'aktif'],
            ['keluarga_id' => '0027', 'kelurahan_id' => '1345', 'sector_id' => '2', 'nama' => 'Tono Hartono', 'alias' => '', 'alamat' => 'Jl. Kenanga No. 34', 'status' => 'aktif'],
            ['keluarga_id' => '0028', 'kelurahan_id' => '1345', 'sector_id' => '3', 'nama' => 'Widi Purwanto', 'alias' => '', 'alamat' => 'Jl. Mawar No. 35', 'status' => 'aktif'],
            ['keluarga_id' => '0029', 'kelurahan_id' => '1229', 'sector_id' => '4', 'nama' => 'Yanto Susanto', 'alias' => '', 'alamat' => 'Jl. Flamboyan No. 36', 'status' => 'aktif'],
            ['keluarga_id' => '0030', 'kelurahan_id' => '1229', 'sector_id' => '5', 'nama' => 'Roni Saputra', 'alias' => '', 'alamat' => 'Jl. Anggrek No. 37', 'status' => 'aktif'],

        ]);
    }
}
