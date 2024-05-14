document.addEventListener('DOMContentLoaded', function() {
    displayCartItems();
});

// Function to add items to the shopping cart
function addToCart(productName, price, imageUrl) {
    
    // Create an object representing the item to be added to the cart
    var item = {
        productName: productName,
        price: price,
        imageUrl: imageUrl,
        quantity: 1 // Default quantity
    };

    // Retrieve existing cart items from localStorage or initialize an empty array
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if the item is already in the cart
    var existingItem = cartItems.find(item => item.productName === productName);
    if (existingItem) {
        // If the item is already in the cart, increment its quantity
        existingItem.quantity++;
    } else {
        // If the item is not in the cart, add it
        cartItems.push(item);
    }

    // Store the updated cart items back in localStorage
    localStorage.setItem('cart', JSON.stringify(cartItems));

    // Display an alert message confirming the addition of the item
    alert(productName + " added to cart!");

    // Update the cart display
    displayCartItems();
}

// Function to display cart items in the HTML
function displayCartItems() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    var cartContainer = document.getElementById('cart-items');
    var totalPrice = 0;

    // Clear the previous content
    cartContainer.innerHTML = '';

    // Loop through the cart items and display them
    cartItems.forEach(item => {
        var itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;

        var itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = `
            <img src="${item.imageUrl}" alt="${item.productName}">
            <div>
                <h3>${item.productName}</h3>
                <p>Price: $${item.price.toFixed(2)}</p>
                <p>Quantity: ${item.quantity}</p>
                <p>Total: $${itemTotal.toFixed(2)}</p>
                <button class="remove-item-btn" onclick="removeFromCart('${item.productName}')">Remove</button>
            </div>
        `;
        cartContainer.appendChild(itemElement);
    });

    // Display the total price
    var totalElement = document.getElementById('cart-total');
    totalElement.innerHTML = `<h3>Total: $${totalPrice.toFixed(2)}</h3>`;
}

// Function to remove an item from the cart
function removeFromCart(productName) {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    // Filter out the item to be removed
    cartItems = cartItems.filter(item => item.productName !== productName);
    // Store the updated cart items back in localStorage
    localStorage.setItem('cart', JSON.stringify(cartItems));
    // Update the cart display
    displayCartItems();
}

// Function to redirect to checkout page with cart items as query parameter
function proceedToCheckout() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    var cartItemsJSON = encodeURIComponent(JSON.stringify(cartItems));
    console.log(cartItemsJSON)
    window.location.href = 'checkout.html?cart=' + cartItemsJSON;
}


