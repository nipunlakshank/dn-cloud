<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $wallets = Wallet::all();
        return view('dashboard', compact(var_name: ['users', 'wallets']));
    }

    public function walletStatusUpdate(Request $request)
    {
        if ($request->status == 0) {
            Wallet::where('id', $request->id)->update(['is_active' => true]);
        } else {
            Wallet::where('id', $request->id)->update(['is_active' => false]);
        }

        return Redirect('dashboard');
    }

    public function userStatusUpdate(Request $request)
    {
        if ($request->status == 0) {
            User::where('id', $request->id)->update(['is_active' => true]);
        } else {
            User::where('id', $request->id)->update(['is_active' => false]);
        }

        return redirect('dashboard');
    }
}
