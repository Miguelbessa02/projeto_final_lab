<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $experiences = [
            [
                'title' => 'Atividade 1',
                'description' => 'Descrição da atividade 1.',
                'image' => '/caminho/para/atividade1.jpg',
                'price' => 50, 
                'category' => 'desporto',
            ],
            [
                'title' => 'Atividade 2',
                'description' => 'Descrição da atividade 2.',
                'image' => '/caminho/para/atividade2.jpg',
                'price' => 60, 
                'category' => 'cultura',
            ],
            [
                'title' => 'Atividade 3',
                'description' => 'Descrição da atividade 3.',
                'image' => '/caminho/para/atividade3.jpg',
                'price' => 60, 
                'category' => 'cultura',
            ],
            [
                'title' => 'Atividade 4',
                'description' => 'Descrição da atividade 4.',
                'image' => '/caminho/para/atividade4.jpg',
                'price' => 60, 
                'category' => 'cultura',
            ],
            [
                'title' => 'Atividade 5',
                'description' => 'Descrição da atividade 5.',
                'image' => '/caminho/para/atividade5.jpg',
                'price' => 60, 
                'category' => 'cultura',
            ],
            
        ];
        
        return view('dashboard', compact('experiences'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $experience = new Experience;
        $experience->title = $request->title;
        $experience->description = $request->description;
        $experience->price = $request->price;
        $experience->address = $request->address;
        $experience->save();
        return redirect('/experience');
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
