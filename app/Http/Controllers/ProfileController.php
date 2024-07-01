<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function updatePassword(Request $request): View
    {
        return view('profile.update-password', [
            'user' => $request->user(),
        ]);
    }

    /**
     * update data profile
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            return Redirect::back()->with('success', 'profile updated successfully!');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Profile failed to update!');
        }
    }

    /**
     * delete account
     */
    public function destroy(Request $request): RedirectResponse
    {
        // dd('delete account');
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * update foto profile
     */
    public function updateFoto(Request $request, string $id)
    {
        // Ambil user berdasarkan ID (misalnya dari parameter)
        $user = User::findOrFail($id);

        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('photo')) {
            // Validasi file yang diunggah
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
            ]);

            // Hapus foto lama jika ada
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // Upload foto baru
            $photo = $request->file('photo');
            $filename = 'profile_photo_' . $user->id . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('photos', $photo, $filename);

            // Update path foto baru di database
            $user->photo = 'photos/' . $filename;
            $user->save();

            return redirect()->back()->with('status', 'Foto profil berhasil diperbarui.');
        }

        // Cek apakah ada permintaan untuk menghapus foto
        if ($request->has('delete_photo') && $request->delete_photo == 'true') {
            // Hapus foto dari storage
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
                $user->photo = null;
                $user->save();
            }
            return redirect()->back()->with('status', 'Foto profil berhasil dihapus.');
        }

        // Redirect atau kembalikan respons yang sesuai jika tidak ada perubahan
        return redirect()->back();
    }

    /**
     * Delete Photo Profile
     */
    public function resetFoto(string $id)
    {
        // Ambil user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
            $user->photo = null;
            $user->save();
        }

        return redirect()->back()->with('status', 'Foto profil berhasil dihapus.');
    }
}
