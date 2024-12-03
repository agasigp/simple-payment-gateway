<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDepositRequest;

class DepositController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StoreDepositRequest $request)
    {
        $token = $request->bearerToken();
        $decodedToken = base64_decode($token);

        $user = User::query()->where('name', $decodedToken)->first();

        if ($request->amount < 0 && $user->balance < abs($request->amount)) {
            return response()->json([
                'order_id' => $request->order_id,
                'amount' => $request->amount,
                'status' => 2,
            ]);
        }

        DB::transaction(function () use ($user, $request) {
            Deposit::query()->create($request->validated());
            $user->balance = $user->balance + $request->amount;
            $user->save();
        });

        return response()->json([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'status' => 1,
        ]);
    }
}
