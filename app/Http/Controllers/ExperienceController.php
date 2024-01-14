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
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Obter o ID do usuário autenticado
        $user_id = Auth::id();
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('experiences/images', 'public');
        }

        $experience = Experience::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
            'category' => $request->category, 
            'user_id' => $user_id, 
            'image' => $imagePath,
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
    // Verificar se o usuário autenticado é o autor do anúncio
    if (Auth::id() == $experience->user_id) {
        // Apagar o anúncio
        $experience->delete();
        return redirect()->back()->with('success', 'Experiência apagada com sucesso!');
    } else {
        return redirect()->back()->with('error', 'Não tens permissão para apagar esta experiência.');
    }
}

}
