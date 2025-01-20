<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function overview(Request $request): View
    {
        return view('profile.profile-overview', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.personal-data', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('img/profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }
        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('personal-data')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
