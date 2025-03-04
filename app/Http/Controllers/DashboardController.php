<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public Wallet $wallets;

    public function index()
    {
        $users = [];

        if (Gate::allows('viewAny', User::class)) {
            $users = User::all();
        }

        if (Gate::allows('viewAny', Wallet::class)) {
            $wallets = Wallet::all()->collect()
                ->filter(function ($wallet) {
                    return Gate::allows('view', $wallet);
                });
        }

        return view('dashboard', compact(var_name: ['users', 'wallets']));
    }

    public function walletStatusUpdate(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $wallet = Wallet::find($data['id']);

        Gate::authorize('changeStatus', $wallet);

        if ($data['status'] == 0) {
            $wallet->update(['is_active' => true]);
        } else {
            $wallet->update(['is_active' => false]);
        }

        return Redirect('dashboard');
    }

    public function userStatusUpdate(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $user = User::find($data['id']);

        Gate::authorize('changeRole', $user);

        if (intval($data['status']) === 0) {
            $user->update(['is_active' => true]);
        } else {
            $user->update(['is_active' => false]);
        }

        return redirect('dashboard');
    }
}
