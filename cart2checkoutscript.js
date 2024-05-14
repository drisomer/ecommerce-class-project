

// Function to retrieve cart items from localStorage and display them
function displayCartItems() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    var cartContainer = document.getElementById('cart-items');
    var totalContainer = document.getElementById('cart-total');
    
    // Clear previous content
    cartContainer.innerHTML = '';
    totalContainer.innerHTML = '';

    // Loop through cart items and display them
    cartItems.forEach(item => {
        var itemElement = document.createElement('div');
        itemElement.innerHTML = `${item.name} - ${item.price}`;
        cartContainer.appendChild(itemElement);
    });

    // Calculate and display total price
    var totalPrice = cartItems.reduce((total, item) => total + item.price, 0);
    totalContainer.textContent = 'Total: $' + totalPrice;
}

// Function to handle proceeding to checkout
document.getElementById('checkout-btn').addEventListener('click', function() {
    proceedToCheckout();
});

// Function to redirect to checkout page with cart items as query parameter
function proceedToCheckout() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    var cartItemsJSON = encodeURIComponent(JSON.stringify(cartItems));
    console.log(cartItemsJSON)
    window.location.href = 'checkout.html?cart=' + cartItemsJSON;
}

// Call function to display cart items when the page loads
displayCartItems();
