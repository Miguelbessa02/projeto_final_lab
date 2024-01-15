<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('dashboard', compact('comments'));
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
            'comment' => ['required', 'string', 'max:255'],
            'experience_id' => ['required', 'numeric'], 
        ]);

        // Obter o ID do usuário autenticado
        $user_id = Auth::id();

        $comment = Comment::create([
            'user_id' => $user_id, 
            'experience_id' => $request->experience_id,
            'comment' => $request->comment,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Comment created successfully!');
    }

    public function showComments($experience_id)
    {   
        $experience = Experience::findOrFail($experience_id);
        $comments = Comment::where('experience_id', $experience_id)->get();

        return view('pages.show_comments', compact('experience', 'comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
{
    // Verificar se o user autenticado é o autor do comentário ou se o user autenticado é o dono do anúncio
    if(Auth::id() == $comment->user_id || Auth::user()->experiences->contains($comment->experience_id) || Auth::user()->is_admin) {
        $comment->delete();
        return redirect()->back()->with('success', 'Comentário apagado com sucesso!');
    } else {
        return redirect()->back()->with('error', 'Você não tem permissão para apagar este comentário.');
    }
}
}
