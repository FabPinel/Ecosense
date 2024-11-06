<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

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

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Display another user's profile.
     */
    public function show($id): View
    {
        $user = User::findOrFail($id);
        $authUser = Auth::user();
        $users = User::orderByDesc('score')->get();
    
        $rank = $users->search(function ($item) use ($user) {
            return $item->id == $user->id;
        });
    
        $rank = $rank !== false ? $rank + 1 : null;
    
        $participationCount = $user->participates ? $user->participates->count() : 0;
    
        return view('profile.edit', [
            'user' => $user,
            'authUser' => $authUser,
            'rank' => $rank,
            'participationCount' => $participationCount,
        ]);
    }
    
}
