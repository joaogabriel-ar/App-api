<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function scopeFindByWalletId($query, $walletId) {

        $query->where('wallet_id', $walletId);

        return $query;

    }

    public function scopeLastMonthWalletTransactions($query, $walletId, $transactionType) {

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $query->where('wallet_id', $walletId)
            ->where('transaction_type', $transactionType)
            ->whereBetween('date', [$startOfLastMonth, $endOfLastMonth]);

    }
}