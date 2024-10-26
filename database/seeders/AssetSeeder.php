<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $types = AssetType::all();
    
            foreach ($types as $t) {
                for ($i = 0; $i < 4; $i++) {
    
                    Asset::factory()->create([
                        'asset_type_id' => $t->id
                    ]);
                }
            }
        }
    
    }
}
