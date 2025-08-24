<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           DB::table('category')->insert([
            ['category' => 'Laptop','icon'=>'laptop'],
            ['category' => 'Komputer','icon'=>'desktop-classic'],
            ['category' => 'Printer','icon'=>'printer'],
            ['category' => 'CCTV','icon'=>'cctv'],
            ['category' => 'Lainnya','icon'=>'cog'],
        ]);
    }
}
