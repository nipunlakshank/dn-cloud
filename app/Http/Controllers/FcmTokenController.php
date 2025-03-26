<?php

namespace App\Http\Controllers;

use App\Models\FcmToken;
use App\Services\FcmService;
use Illuminate\Http\Request;

class FcmTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        app(FcmService::class)->setToken($request->token);
    }

    /**
     * Display the specified resource.
     */
    public function show(FcmToken $fcmToken)
    {
        return app(FcmService::class)->getToken();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FcmToken $fcmToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FcmToken $fcmToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FcmToken $fcmToken)
    {
        app(FcmService::class)->removeToken();
    }
}
