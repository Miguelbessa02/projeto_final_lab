<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;

class StripeController extends Controller
{
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

        return redirect()->away($session->url);
    }
}
