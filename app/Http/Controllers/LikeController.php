<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likes = Like::all();
        return view('dashboard', compact('likes'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($experience_id)
    {
        return view('pages.create_comment', ['experience_id' => $experience_id]);
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

        $comment = Comment::create([
            'user_id' => $user_id, 
            'experience_id' => $request->experience_id,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Like created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
