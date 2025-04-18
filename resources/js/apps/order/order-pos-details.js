$(document).ready(function() {

    let cart = [];
    const products = $('#main-container').data('productslists');
    const order = $('#main-container').data('order');
    let selectedCategory = 'All';

    console.log(order);

    // Initialize cart based on existing order data
    if (order && order.length > 0) {
        order.forEach(o => {
            const price = parseFloat(o.price);
            const existing = cart.find(item => item.id === o.product_id && item.selling_price === price);
            
            if (existing) {
                existing.quantity += o.quantity;
            } else {
                cart.push({
                    id: o.product_id,
                    selling_price: parseFloat(o.selling_price),
                    quantity: o.quantity  
                });
            } 
        }); 
        updateCart();
    }

    // Initialize select2 for category and options selection
    $('#optionsfn, #categorySelect').select2({
        theme: 'bootstrap-5',
        dropdownAutoWidth: true,
        width: '100%'
    });

    // Render products based on filter
    function renderProducts(filteredProducts) {
        const container = $("#productArea").empty();
        filteredProducts.forEach(p => {
            const $div = $(`
                <div class="col-md-4 mb-3">
                    <div class="card h-100 product-card" data-id="${p.id}" data-price="${p.selling_price}" data-quantity="${p.quantity}">
                        <div class="card-body text-center">
                            <h6 class="card-title">${p.product_name}</h6>
                            <p class="card-text">10 ml</p>
                            <p class="card-text">Expiration Date: 2026-02-10</p>
                            <p class="card-text">Quantity Available: ${p.quantity}</p>
                            <p class="card-text">₱${(parseFloat(p.selling_price) || 0).toFixed(2)}</p>
                        </div>
                    </div>
                </div>
            `);
            container.append($div);
        });
    }

    // Filter products based on category and search query
    function filterProducts(brand_name) {
        const searchQuery = $("#searchInput").val().toLowerCase();
        let filtered = products.filter(p => brand_name === 'All' || p.brand_name === brand_name);

        if (searchQuery) {
            filtered = filtered.filter(p => p.product_name.toLowerCase().includes(searchQuery));
        }
        renderProducts(filtered);
    }

    // Add product to cart
    function addToCart(id, price) {
        const option = $('#optionsfn').val();
        const finalPrice = (option === 'FREE') ? 0 : price;

        // Ensure selling_price is compared as a number
        const existing = cart.find(item => item.id === id && Number(item.selling_price) === Number(finalPrice));

        if (existing) {
            existing.quantity += 1;
        } else {
            cart.push({ id, selling_price: finalPrice, quantity: 1 });
        }

        // Update the product quantity
        const product = products.find(p => p.id === id);
        if (product && product.quantity > 0) {
            product.quantity -= 1;
        }

        updateCart();
        filterProducts(selectedCategory);
    }

    // Update cart UI and calculate total price
    function updateCart() {
        const $cartList = $("#cartItems").empty();
        let total = 0;

        // Create table with header if it's not already created
        const $table = $(`
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-start">Product Name</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-end">Total</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="cartBody"></tbody>
            </table>
        `);

        // Append the table to the cart list
        $cartList.append($table);

        // Iterate over each item in the cart
        cart.forEach((item, index) => {
            total += item.selling_price * item.quantity;
            const product = products.find(p => p.id === item.id);

            // Create row for each product in the cart
            const $row = $(`
                <tr>
                    <td class="text-start">${product ? product.product_name : 'Unknown Product'}</td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm qty-input" data-index="${index}" value="${item.quantity}" min="1">
                    </td>
                    <td class="text-end">
                        ₱${(item.selling_price * item.quantity).toFixed(2)}
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger ms-2 remove-btn" data-index="${index}">❌</button>
                    </td>
                </tr>
            `);
            // Append the row to the table body
            $("#cartBody").append($row);
        });

        // Update the total amount

      
        $("#totalAmount").text(`₱ ${total.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);
        updateChange(total);
    }

    // Update change calculation
    function updateChange(total) {
        const payment = parseFloat($("#customerPayment").val()) || 0;
        const change = payment - total;
        $("#changeAmount").text(`₱${(change > 0 ? change : 0).toFixed(2)}`);
    }

    // Final checkout
    function finalCheckout() {
        const total = cart.reduce((sum, item) => sum + item.selling_price * item.quantity, 0);
        const payment = parseFloat($("#customerPayment").val()) || 0;

        if (payment < total) {
            alert("Insufficient payment.");
        } else if (cart.length === 0) {
            alert("Cart is empty.");
        } else {
            const change = payment - total;
            alert(`Payment successful! Change: ₱${change.toFixed(2)}`);
            cart = [];
            $("#customerPayment").val("");
            updateCart();
            filterProducts(selectedCategory);  // Keep selected category after checkout
        }
    }

    // Update product quantity in cart
    function updateQuantity(index, quantity) {
        if (quantity < 1) return;

        const productInCart = cart[index];
        const originalQuantity = productInCart.quantity;

        const productInStock = products.find(p => p.id === productInCart.id);
        if (productInStock) {
            productInStock.quantity += (originalQuantity - quantity);
        }

        cart[index].quantity = quantity;
        updateCart();
        filterProducts(selectedCategory); // Ensure we keep the current category after updating quantity
    }

    // Handle category change
    $("#categorySelect").on("change", function () {
        selectedCategory = $(this).val();  // Update the selected category
        filterProducts(selectedCategory);  // Apply the filter
    });

    // Handle search input
    $("#searchInput").on("input", function () {
        filterProducts(selectedCategory);  // Apply the filter while keeping selected category
    });

    // Handle product click (add to cart)
    $(document).on("click", ".product-card", function () {
        const id = parseInt($(this).data("id"));
        const selling_price = parseFloat($(this).data("price"));
        const quantity = $(this).data('quantity');
        
        if (quantity == 0) {
            return alert('Zero quantity.');
        }
        addToCart(id, selling_price);
    });

    // Handle remove product from cart
    $(document).on("click", ".remove-btn", function () {
        const index = $(this).data("index");
        const product = cart[index];
        const productInStock = products.find(p => p.id === product.id);
        if (productInStock) {
            productInStock.quantity += product.quantity; // Return quantity to product list
        }
        cart.splice(index, 1);
        updateCart();
        filterProducts(selectedCategory);  // Ensure we keep the current category after removing from cart
    });

    // Handle quantity change in cart
    $(document).on("change input", ".qty-input", function () {
        const index = $(this).data("index");
        const newQuantity = parseInt($(this).val());

        if (isNaN(newQuantity) || newQuantity < 1) return;

        const cartItem = cart[index];
        const product = products.find(p => p.id === cartItem.id);
        const availableStock = product.quantity + cartItem.quantity;

        if (newQuantity > availableStock) {
            alert("Not enough stock available.");
            $(this).val(cartItem.quantity); // revert to previous quantity
        } else {
            updateQuantity(index, newQuantity);
        }
    });

    // Handle customer payment input
    $("#customerPayment").on("input", function () {
        const total = cart.reduce((sum, item) => sum + item.selling_price * item.quantity, 0);
        updateChange(total.toFixed(2));
    });

    // Handle checkout button click
    $("#checkoutBtn").on("click", function () {
        finalCheckout();
    });

    // Initial render of products and filtering
    renderProducts(products);
    filterProducts(selectedCategory);
});
