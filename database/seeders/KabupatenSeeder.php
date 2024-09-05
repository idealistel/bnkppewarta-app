<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kabupaten')->insert([
            ['id' => '1', 'provinsi_id' => '1', 'nama' => 'kota cilegon'],
            ['id' => '2', 'provinsi_id' => '1', 'nama' => 'kab. lebak'],
            ['id' => '3', 'provinsi_id' => '1', 'nama' => 'kab. pandeglang'],
            ['id' => '4', 'provinsi_id' => '1', 'nama' => 'kota serang'],
            ['id' => '5', 'provinsi_id' => '1', 'nama' => 'kab. serang'],
            ['id' => '6', 'provinsi_id' => '1', 'nama' => 'kota tangerang'],
            ['id' => '7', 'provinsi_id' => '1', 'nama' => 'kab. tangerang'],
            ['id' => '8', 'provinsi_id' => '1', 'nama' => 'kota tangerang selatan'],
        ]);
    }
}
