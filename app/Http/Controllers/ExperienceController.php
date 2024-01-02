<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('dashboard', compact('experiences'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create_experience');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:experiences'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'address' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:sport,culture,nature,gastronomy'],
            
        ]);

        // Obter o ID do usuário autenticado
        $user_id = Auth::id();

        $experience = Experience::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
            'category' => $request->category, 
            'user_id' => $user_id, 
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Experience created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        //
    }
}