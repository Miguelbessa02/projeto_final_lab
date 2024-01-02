<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Experience $experience)
    {
        $user = Auth::user();
        $user->createOrGetStripeCustomer();

        // Criar uma tentativa de pagamento
        $intent = $user->createSetupIntent();

        return view('checkout', [
            'experience' => $experience,
            'intent' => $intent,
        ]);
    }

    public function processPayment(Request $request, Experience $experience)
    {
        $user = Auth::user();
        
        // Adicionar o método de pagamento ao usuário
        $user->addPaymentMethod($request->input('payment_method'));

        // Atualizar o método de pagamento padrão
        $user->updateDefaultPaymentMethod($request->input('payment_method'));

        // Cobrar o usuário pelo preço da experiência
        $user->charge($experience->price * 100, $request->input('payment_method'));

        // Salvar detalhes da transação no banco de dados
        $experience->transactions()->create([
            'user_id' => $user->id,
            'amount' => $experience->price,
            'payment_intent' => null, 
        ]);

        return redirect()->route('dashboard')->with('success', 'Payment successful!');
    }
}
