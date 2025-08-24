<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('status')->insert([
            ['id' => 1,'status' => 'Selesai'],
            ['id' => 2,'status' => 'Barang Diterima'],
            ['id' => 3,'status' => 'Dalam Perbaikan'],
            ['id' => 4,'status' => 'Menunggu Sparepart'],
        ]);
    }
}
