<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    public function wallets() {
        return $this->belongsToMany(Wallet::class, 'wallet_asset')->withPivot('quantity');
    }


}
