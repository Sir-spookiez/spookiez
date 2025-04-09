// Array to hold cart items
let cart = [];

// Add to cart function
function addToCart(burger, price) {
    cart.push({ burger, price });
    updateCart();
    alert(`${burger} has been added to your cart for $${price.toFixed(2)}`);
}

// Update cart function
function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.burger} - $${item.price.toFixed(2)}`;
        cart
