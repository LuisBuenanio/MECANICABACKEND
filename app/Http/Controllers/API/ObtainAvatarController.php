<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObtainAvatarController extends Controller
{
    public function getAvatar($profile_photo_path)
    {
        $path = storage_path('app/public/avatars/' . $profile_photo_path);

        if (!Storage::exists('public/avatars/' . $profile_photo_path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
