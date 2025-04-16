
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>POS Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    #main-container:fullscreen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #18191a; 
        color: #e4e6eb; 
    }

    body{
        font-size: small;
        font-family: Arial, Helvetica, sans-serif;
    }
  </style>
</head>
<body>
    <div class="container-fluid mt-3" id="main-container">
        <!-- Top Controls: Product Type, Category, Search, Fullscreen -->
        <div class="row g-2 mb-3 align-items-end">
          <div class="col-md-3">
            <label for="optionsfn" class="form-label">Product Type</label>
            <select id="optionsfn" class="form-select">
              <option value="NOTFREE">NOT FREE</option>
              <option value="FREE">FREE</option>
            </select>
          </div>
      
          <div class="col-md-3">
            <label for="categorySelect" class="form-label">Category</label>
            <select id="categorySelect" class="form-select">
              <option value="All">All</option>
              <option value="Drinks">Drinks</option>
              <option value="Snacks">Snacks</option>
              <option value="Meals">Meals</option>
            </select>
          </div>
      
          <div class="col-md-2 d-grid">
            <label class="form-label invisible">Fullscreen</label>
            <button id="fullscreenBtn" class="btn btn-outline-secondary">
                <i class="bi bi-fullscreen"></i> Fullscreen
            </button>
          </div>
        </div>
      
        <!-- Product and Checkout Section -->
        <div class="row">
            <!-- Products Area -->
            <div class="col-md-8">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="mb-0">Products</h4>
                <div class="col-md-4 d-flex justify-content-end">
                    <div class="form-group w-100 d-flex align-items-center">
                        <label for="searchInput" class="form-label me-2 mb-0">Search</label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Type to search..." />
                    </div>
                </div>                            
              </div>
          
              <div class="row" id="productArea">
                <!-- Products will be rendered here -->
              </div>
            </div>
          
            <!-- Checkout Section -->
            <div class="col-md-4 border p-3 bg-light rounded shadow-sm">
                <h5 style="color:black">Checkout</h5>
                <ul class="list-group mb-3" id="cartItems" style="word-wrap: break-word;"></ul>
              
                <p style="color:black"><strong>Total:</strong> <span id="totalAmount">₱0.00</span></p>
              
                <div class="mb-2">
                  <label for="customerPayment" style="color:black" class="form-label">Customer Payment</label>
                  <input type="number" id="customerPayment" class="form-control" placeholder="Enter payment" />
                </div>
              
                <p style="color:black"><strong>Change:</strong> <span id="changeAmount">₱0.00</span></p>
              
                <button class="btn btn-success w-100" onclick="finalCheckout()">Checkout</button>
            </div>
              
        </div>          
    </div>      

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    const products = [
      { itemcode: 1, name: "Coke", price: 25, category: "Drinks", quantityAvailable: 10 },
      { itemcode: 2, name: "Pepsi", price: 23, category: "Drinks", quantityAvailable: 5 },
      { itemcode: 3, name: "Burger", price: 55, category: "Meals", quantityAvailable: 6 },
      { itemcode: 4, name: "Fries", price: 30, category: "Snacks", quantityAvailable: 8 },
      { itemcode: 5, name: "Water", price: 15, category: "Drinks", quantityAvailable: 20 },
      { itemcode: 6, name: "Hotdog", price: 40, category: "Meals", quantityAvailable: 7 },
      { itemcode: 7, name: 'Immunol Syrup Green (100ml) HIMALAYA PRODUCTS', price: 40, category: "Meals", quantityAvailable: 3 }
    ];
  
    let cart = [];
  
    function renderProducts(filteredProducts) {
      const container = $("#productArea").empty();
      filteredProducts.forEach(p => {
        const $div = $(`
          <div class="col-md-4 mb-3">
            <div class="card h-100 product-card" data-itemcode="${p.itemcode}" data-price="${p.price}" data-quantity="${p.quantityAvailable}">
              <div class="card-body text-center">
                <h6 class="card-title">${p.name}</h6>
                <p class="card-text">10 ml</p>
                <p class="card-text">Expiration Date: 2026-02-10</p>
                <p class="card-text">Quantity Available: ${p.quantityAvailable}</p>
                <p class="card-text">₱${p.price.toFixed(2)}</p>
              </div>
            </div>
          </div>
        `);
        container.append($div);
      });
    }
  
    function filterProducts(category) {
      const searchQuery = $("#searchInput").val().toLowerCase();
      let filtered = products.filter(p => category === 'All' || p.category === category);
      if (searchQuery) {
        filtered = filtered.filter(p => p.name.toLowerCase().includes(searchQuery));
      }
      renderProducts(filtered);
    }
  
    function addToCart(itemcode, price) {
      const option = $('#optionsfn').val();
      const finalPrice = (option === 'FREE') ? 0 : price;
  
      const existing = cart.find(item => item.itemcode === itemcode && item.price === finalPrice);
      if (existing) {
        existing.quantity += 1;
      } else {
        cart.push({ itemcode, price: finalPrice, quantity: 1 });
      }
  
      // Update product quantity after adding to cart
      const product = products.find(p => p.itemcode === itemcode);
      if (product && product.quantityAvailable > 0) {
        product.quantityAvailable -= 1;
      }
  
      updateCart();
      renderProducts(products);
    }
  
    function updateCart() {
        const $cartList = $("#cartItems").empty();
        let total = 0;

        cart.forEach((item, index) => {
            total += item.price * item.quantity;
            const product = products.find(p => p.itemcode === item.itemcode); // Get product by itemcode
            const $li = $(`
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between w-100">
                <span>${product ? product.name : 'Unknown Product'}</span> <!-- Display product name -->
                <div class="d-flex align-items-center">
                    <input type="number" class="form-control form-control-sm w-25 qty-input" data-index="${index}" value="${item.quantity}" min="1">
                    x₱${(item.price * item.quantity).toFixed(2)}
                    <button class="btn btn-sm btn-danger ms-2 remove-btn" data-index="${index}">❌</button>
                </div>
                </div>
            </li>
            `);
            $cartList.append($li);
        });

        $("#totalAmount").text(`₱${total.toFixed(2)}`);
        updateChange(total);
    }

  
    function updateChange(total) {
      const payment = parseFloat($("#customerPayment").val()) || 0;
      const change = payment - total;
      $("#changeAmount").text(`₱${(change > 0 ? change : 0).toFixed(2)}`);
    }
  
    function finalCheckout() {
      const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
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
        renderProducts(products);
      }
    }
  
    function updateQuantity(index, quantity) {
      if (quantity < 1) return;
  
      const productInCart = cart[index];
      const originalQuantity = productInCart.quantity;
  
      const productInStock = products.find(p => p.itemcode === productInCart.itemcode);
      if (productInStock) {
        productInStock.quantityAvailable += (originalQuantity - quantity);
      }
  
      cart[index].quantity = quantity;
      updateCart();
      renderProducts(products);
    }
  
    $(document).ready(function () {
      renderProducts(products);
      filterProducts('All');
  
      $("#categorySelect").on("change", function () {
        filterProducts($(this).val());
      });
  
      $("#searchInput").on("input", function () {
        filterProducts($("#categorySelect").val());
      });
  
      $("#fullscreenBtn").on("click", function () {
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        }
      });
  
      $(document).on("click", ".product-card", function () {
        const itemcode = parseInt($(this).data("itemcode"));
        const price = parseFloat($(this).data("price"));
        addToCart(itemcode, price);
      });
  
      $(document).on("click", ".remove-btn", function () {
        const index = $(this).data("index");
        const product = cart[index];
        const productInStock = products.find(p => p.itemcode === product.itemcode);
        if (productInStock) {
          productInStock.quantityAvailable += product.quantity;
        }
        cart.splice(index, 1);
        updateCart();
        renderProducts(products);
      });
  
      $(document).on("change input", ".qty-input", function () {
        const index = $(this).data("index");
        let quantity = parseInt($(this).val());
  
        // Check if input is a valid number
        if (isNaN(quantity)) {
            alert("Please enter a valid number.");
            $(this).val(cart[index].quantity); // Reset to current
            return;
        }
  
        // Check if quantity is less than 1
        if (quantity < 1) {
            alert("Quantity cannot be less than 1.");
            $(this).val(cart[index].quantity);
            return;
        }
  
        // Get the corresponding product's available quantity
        const product = products.find(p => p.itemcode === cart[index].itemcode);
        const availableQuantity = product.quantityAvailable + cart[index].quantity; // including current quantity in cart
  
        if (quantity > availableQuantity) {
            alert(`Only ${availableQuantity} available in stock.`);
            $(this).val(cart[index].quantity);
            return;
        }
  
        // All good — update quantity
        updateQuantity(index, quantity);
        renderProducts(products);
      });
  
      $("#customerPayment").on("input", function () {
        const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        updateChange(total);
      });
    });
  </script>
  
  
</body>
</html>
