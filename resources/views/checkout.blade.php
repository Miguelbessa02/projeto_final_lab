@extends('layouts.app')

@section('content')
    <div>
        <!-- Display experience details -->
        <h2>{{ $experience->title }}</h2>
<p>{{ $experience->description }}</p>
<p>Price: {{ $experience->price }}€</p>

<!-- Stripe checkout form -->
<form action="{{ route('checkout', $experience) }}" method="post" id="payment-form" data-secret="{{ $intent->client_secret }}">
    @csrf
    <div id="card-element">
        
    </div>
    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
    <button type="submit">Pay {{ $experience->price }}€</button>
</form>
        
    </div>

   
    <script src="https://js.stripe.com/v3/"></script>

   
    <script src="{{ asset('js/stripe.js') }}"></script>
@endsection
