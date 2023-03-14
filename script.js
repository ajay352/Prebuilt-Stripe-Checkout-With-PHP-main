
const stripe = Stripe("pk_test_51MduieSErZbH7P9IJ3zN8opwuP0EX1L4nWFfZovfXx8hm6f3f3gAXgWAVGmN8QfXj1dUWKCAPEKZxWbc8uOTHpdS00f2RGVhQ4")
const btn = document.querySelector('#btn')
btn.addEventListener('click', ()=>{
    fetch('/checkout.php',{
        method:"POST",
        headers:{
            'Content-Type' : 'application/json',
        },
        body: JSON.stringify({})
    }).then(res=> res.json())
    .then(payload => {
        stripe.redirectToCheckout({sessionId: payload.id})
    })
})