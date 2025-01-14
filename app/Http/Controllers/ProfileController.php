<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Experience;
use App\Models\Transaction;
use App\Models\Favorite;
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
     * Aparecer os anúncios criados pelo user no perfil do mesmo.
     */
    public function getUserExperiences(Request $request)
    {
        $userId = Auth::id();
        $experiences = Experience::where('user_id', $userId)->get();
        return view('profile.experiences', compact('experiences'));
    }

    /**
     * Aparecer os anúncios comprados pelo user no perfil do mesmo.
     */
    public function getUserTransactions()
    {
        $userId = Auth::id();
        $transactions = Transaction::where('user_id', $userId)->get();
        return view('profile.transactions', ['purchasedExperiences' => $transactions]);
    }

    /**
     * Aparecer os anúncios favoritos pelo user no perfil do mesmo.
     */
    public function getUserFavorites(Request $request)
    {
        $userId = Auth::id();
        $favorites = Favorite::where('user_id', $userId)->get();
        return view('profile.favorites', compact('favorites'));
    }

    
}
