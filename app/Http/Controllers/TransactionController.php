<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;

class TransactionController extends Controller
{

    //stripe interface and store in trasaction database the user and experience bought
    public function checkout(Request $request)
    {
        $experienceId = $request->input('experience_id');
        $experience = Experience::find($experienceId);

        if (!$experience) {
            // Tratar anuncio não encontrada
            return redirect()->route('index')->with('error', 'Anuncio não encontrado.');
        }

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $experience->title,
                        ],
                        'unit_amount' => $experience->price * 100, // Converte para centimos
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('dashboard'), 
            'cancel_url' => route('dashboard'),
        ]);

        $transaction = new Transaction([
            'user_id' => Auth::id(),         
            'experience_id' => $experience->id,  
            'status' => 'concluida',          
        ]);

        $transaction->save();

        return redirect()->away($session->url)->with('success', 'Transação efetuada com sucesso!');
    }

    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
