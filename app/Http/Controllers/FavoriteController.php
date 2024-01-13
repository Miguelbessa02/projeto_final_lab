<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class FavoriteController extends Controller
{

    /**
     * Aparecer os anúncios favoritos pelo user no perfil do mesmo.
     */
    public function getUserFavorites(Request $request)
    {
        $userId = Auth::id();
        $favorites = Favorite::where('user_id', $userId)->get();
        return view('profile.favorites', compact('favorites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'experience_id' => ['required', 'numeric'], 
        ]);

        // Obter o ID do usuário autenticado
        $user_id = Auth::id();

        // Verificar se o usuário já deu favorito no anuncio:
        $existingFavorite = Favorite::where('user_id', $user_id)
                            ->where('experience_id', $request->experience_id)
                            ->first();

        if ($existingFavorite) {
            $existingFavorite->delete();
            return redirect()->back()->with('success', 'Favorito removido com sucesso!');
        }

        $favorite = Favorite::create([
            'user_id' => $user_id, 
            'experience_id' => $request->experience_id,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Favorito created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
