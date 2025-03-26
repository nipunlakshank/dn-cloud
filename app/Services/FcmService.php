<?php

namespace App\Services;

use App\Models\FcmToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FcmService
{
    public function setToken(string $token)
    {
        if (session('fcm_token') === $token) {
            return;
        }

        DB::transaction(function () use ($token) {
            if (FcmToken::query()->where('user_id', Auth::id())->where('token', $token)->exists()) {
                return;
            }

            FcmToken::updateOrCreate([
                'user_id' => Auth::id(),
                'session_id' => session()->getId(),
            ], [
                'token' => $token,
            ]);
        });

        session()->put('fcm_token', $token);
    }

    public function getToken(): ?string
    {
        return session('fcm_token');
    }

    public function removeToken()
    {
        $token = $this->getToken();
        if ($token === null) {
            return;
        }
        DB::transaction(function () use ($token) {
            FcmToken::query()->where('user_id', Auth::id())->where('token', $token)->delete();
        });

        session()->forget('fcm_token');
    }
}
