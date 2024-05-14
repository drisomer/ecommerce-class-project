


// addToCart.js

// Array to store cart items
var cartItems = [];

// Function to add item to cart
function addToCart(productName, price, imageUrl) {
    // Create item object
    var item = {
        name: productName,
        price: price,
        image: imageUrl,
        quantity: 1 // Initial quantity is 1
    };

    // Add item to cart
    cartItems.push(item);

    // Optional: You can also update the UI to reflect the added item
    updateCartUI();
}

// Function to update cart UI (optional, depends on your implementation)
function updateCartUI() {
    // You can update the HTML of the cart page here
    // For example, update the table with cartItems
}
