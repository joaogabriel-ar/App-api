<?php

namespace App\Http\Controllers;

use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function info()
    {

        try {

            $wallet = Wallet::first();

            if($wallet) {

                $walletAssets = $wallet->assets()
                    ->orderBy('assets.id')
                    ->paginate(5);
    
                $assetsCount = $wallet->assets->count();
    
                $sellTransactions = Transaction::lastMonthWalletTransactions($wallet->id, TransactionType::SELL->value)->count();
                $buyTransactions = Transaction::lastMonthWalletTransactions($wallet->id, TransactionType::BUY->value)->count();
    
                return response()->json([
                    'wallet_balance' => $wallet->balance,
                    'wallet_assets' => $walletAssets,
                    'assets_count' => $assetsCount, 
                    'sell_transactions_count' => $sellTransactions,
                    'buy_transactions_count' => $buyTransactions
                ], 200);
            }

            return response()->json([
                'message' => "Carteira não encontrada."
            ], 404);

        } catch (\Throwable $th) {

            return response()->json([
                'message' => "Erro interno."
            ], 500);
        }
    }
}
