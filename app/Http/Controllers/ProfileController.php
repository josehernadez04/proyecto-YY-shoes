<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Dashboard.Profile.Index');
    }

    public function updateImage(Request $request)
{
    $request->validate([
        'profile_img' => 'required|image|mimes:jpg,jpeg,png|max:5120',
    ]);

    $user = auth()->user();

    // Eliminar imagen anterior
    if ($user->profilePhoto) {
        Storage::disk('public')->delete($user->profilePhoto->path);
        $user->profilePhoto()->delete();
    }

    // Subir nueva foto
    $file = $request->file('profile_img');

    $path = $file->store('users/profile', 'public');

    $user->profilePhoto()->create([
        'name' => $file->getClientOriginalName(),
        'path' => $path,
        'mime' => $file->getClientMimeType(),
        'extension' => $file->getClientOriginalExtension(),
        'size' => $file->getSize(),
        'is_primary' => true
    ]);

    return back()->with('Success', 'Foto de perfil actualizada correctamente.');
}

}
