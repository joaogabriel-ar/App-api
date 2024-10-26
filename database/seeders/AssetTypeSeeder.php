<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asset_types')->insert([
            [
                'name' => 'Renda Fixa'
            ],
            [
                'name' => 'Fundos'
            ],
            [

                'name' => 'Ações'
            ],
            [

                'name' => 'Cripto'
            ]
        ]);
    }
}
