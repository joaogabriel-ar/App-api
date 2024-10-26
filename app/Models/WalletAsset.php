<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletAsset extends Model
{

    protected $table = 'wallet_asset';

    public function scopeFindByAsset($query, $assetId) {
        
        $query->where('asset_id', $assetId);

        return $query;
    }

    public function scopeFindByWallet($query, $walletId) {
        
        $query->where('wallet_id', $walletId);

        return $query;
    }
}
