<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    public function assets() {
       return $this->belongsToMany(Asset::class, 'wallet_asset')->withPivot(['quantity', 'balance']);
    }
}
