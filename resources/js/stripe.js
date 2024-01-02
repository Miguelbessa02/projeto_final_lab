// Set your Stripe public key
const stripe = Stripe('pk_test_51OUDFVEcc1MykjbWl3NY8FiwpL5bxZQYWoqxD9Ip4NnjIlJogk68CaU6FjSbapp5vULMe8J1UyNBqLvpWenIzWeO00iqLBVqGY');
const elements = stripe.elements();

// Create an instance of the card Element.
const card = elements.create('card');

// Add an instance of the card Element into the `card-element` div.
card.mount('#card-element');

// Handle form submission.
const form = document.getElementById('payment-form');

form.addEventListener('submit', async (event) => {
    event.preventDefault();

    // Fetch the client secret from a data attribute on the form
    const clientSecret = form.dataset.secret;

    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, 
        {
            payment_method: {
                card,
            },
        }
    );

    if (error) {
        // Display error.message to the user.
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
    } else {
        // The card has been confirmed successfully.
        // Submit the form to your server.
        form.submit();
    }
});
