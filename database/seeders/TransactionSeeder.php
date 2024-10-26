<?php

namespace Database\Seeders;

use App\Enums\TransactionType;
use App\Models\Asset;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\WalletAsset;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallet = Wallet::first();
        $assets = Asset::all();

        for ($i = 0; $i < 10; $i++) {

            $quantity = rand(1, 50);
            $asset = $assets->random();

            Transaction::factory()->create([
                'wallet_id' => $wallet->id,
                'asset_id' => $asset->id,
                'price' => $asset->price,
                'quantity' => $quantity,
                'total_price' => $asset->price * $quantity,
                'transaction_type' => TransactionType::BUY->value,
                'date' => now()
            ]);

            $walletAsset = WalletAsset::findByAsset($asset->id)->first();

            if(!$walletAsset) {
                
                $wallet->assets()->attach($asset->id,[
                    'quantity' => $quantity,
                    'balance' => $asset->price * $quantity
                ]);

            } else {
                $walletAsset->quantity += $quantity;
                $walletAsset->balance += $asset->price * $quantity;
                $walletAsset->save();
            }

        }

        for ($i=0; $i < 10; $i++) { 

            $quantity = rand(1, 50);
            $asset = $assets->random();
            $walletAsset = WalletAsset::findByAsset($asset->id)->first();
            
            if($walletAsset && $walletAsset->quantity > $quantity) {

                Transaction::factory()->create([
                    'wallet_id' => $wallet->id,
                    'asset_id' => $asset->id,
                    'price' => $asset->price,
                    'quantity' => $quantity,
                    'total_price' => $asset->price * $quantity,
                    'transaction_type' => TransactionType::SELL->value,
                    'date' => now()
                ]);

                $walletAsset->quantity -= $quantity;
                $walletAsset->balance -= $asset->price * $quantity;
                $walletAsset->save();
            }

        }
    }
}
