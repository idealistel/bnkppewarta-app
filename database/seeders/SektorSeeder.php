<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sectors')->insert([
            ['nama' => 'betania'],
            ['nama' => 'efesus'],
            ['nama' => 'korintus'],
            ['nama' => 'makedonia'],
            ['nama' => 'nazaret']
        ]);
    }
}
