// Function to parse query parameters from URL
function getQueryParams(url) {
    var queryParams = {};
    var params = url.slice(url.indexOf('?') + 1).split('&');
    
    params.forEach(param => {
        var [key, value] = param.split('=');
        queryParams[key] = decodeURIComponent(value);
    });
    console.log(queryParams)
    return queryParams;
}

// Function to display cart items in the checkout form
function displayCartItemsInCheckout() {
    // Retrieve cart items from query parameter
    var queryParams = getQueryParams(window.location.href);
    var cartItemsJSON = queryParams.cart;
    
    // Check if cartItemsJSON is defined and not empty
    if (cartItemsJSON) {
        var cartItems = JSON.parse(decodeURIComponent(cartItemsJSON));
        
        // Get the container to display cart items
        var cartContainer = document.getElementById('cart-items-summary');

        // Clear the previous content
        cartContainer.innerHTML = '';

        // Loop through the cart items and display them
        cartItems.forEach(item => {
            var itemElement = document.createElement('div');
            itemElement.innerHTML = `${item.name} - ${item.price}`;
            cartContainer.appendChild(itemElement);
        });

        // Calculate and display total price
        var totalPrice = cartItems.reduce((total, item) => total + item.price, 0);
        var totalContainer = document.getElementById('cart-total');
        totalContainer.textContent = 'Total: $' + totalPrice;
    } else {
        console.log('Cart items not found in query parameters');
    }
}

// Call function to display cart items in the checkout form when the page loads
displayCartItemsInCheckout();
