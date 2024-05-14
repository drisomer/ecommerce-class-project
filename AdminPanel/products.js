document.addEventListener("DOMContentLoaded", function() {
    loadProducts();
});

function loadProducts(filter = 'all') {
    fetch(`/api/products?filter=${filter}`)
        .then(response => response.json())
        .then(products => {
            const productGrid = document.getElementById('productGrid');
            productGrid.innerHTML = '';
            products.forEach(product => {
                productGrid.innerHTML += `
                    <div class="product-item">
                        <div class="product-image">
                            <img src="${product.imageUrl}" alt="${product.name}">
                        </div>
                        <div class="product-details">
                            <h3>${product.name}</h3>
                            <p>${product.brand}</p>
                            <p>$${product.price}</p>
                            <p>${product.description}</p>
                        </div>
                    </div>
                `;
            });
        });
}

function filterProducts() {
    const filter = document.getElementById('productFilter').value;
    loadProducts(filter);
}

function filterProducts() {
    // Get the selected category from the dropdown
    var selectedCategory = document.getElementById("productFilter").value;

    // Clear the existing product grid
    var productGrid = document.getElementById("productGrid");
    productGrid.innerHTML = "";

    // Fetch product data based on the selected category from the PHP script
    fetch('products.php?category=' + selectedCategory)
        .then(response => response.json())
        .then(products => {
            // Display fetched products in the product grid
            products.forEach(product => {
                var productItem = document.createElement("div");
                productItem.classList.add("product-item");
                productItem.innerText = product.name;
                productGrid.appendChild(productItem);
            });
        })
        .catch(error => console.error('Error fetching products:', error));
}

