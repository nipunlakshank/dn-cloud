<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function get_avatar(Request $request, $filepath): Response
    {
        $storage_path = $filepath;
        if (!Storage::exists($storage_path)) {
            abort(404);
        }

        return Response(Storage::get($storage_path), 200)->headers('content-type', 'image/png');
    }
}
