<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>POS Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    /* Basic styles for the main container */
    /* #main-container {
        padding: 20px;
        transition: background-color 0.3s ease;
    } */

    /* Fullscreen active styles */
    body.fullscreen-active {
        background-color: black;
        color: #e4e6eb;
    }
    /* Optional: Style for the fullscreen button */
    #fullscreenBtn {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    #fullscreenBtn:hover {
        background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container-fluid mt-3" id="main-container" data-productslists='@json($prodlist)'>
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
          @foreach($brand as $value)
            <option value="{{$value->brand_name}}">{{ $value->brand_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-2 d-grid">
        <label class="form-label invisible">Fullscreen</label>
        <button type="button" class="btn btn-outline-secondary" id="fullscreenBtn">
          <i class="fas fa-expand text-white"  id="fullscreenIcon"></i>
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
    var productslists = $('#main-container').data('productslists');
    const products = productslists;

    // Initialize quantityAvailable from actual quantity
    products.forEach(p => {
      p.quantityAvailable = p.quantity;
    });

    let cart = [];

    function renderProducts(filteredProducts) {
      const container = $("#productArea").empty();
      filteredProducts.forEach(p => {
        const $div = $(`
          <div class="col-md-4 mb-3">
            <div class="card h-100 product-card" data-id="${p.id}" data-price="${p.original_price}" data-quantity="${p.quantity}">
              <div class="card-body text-center">
                <h5 class="card-title">${p.product_name}</h5>
                <p class="card-text text-primary" style="font-size: 1.25rem; font-weight: bold;">₱${parseFloat(p.selling_price).toFixed(2)}</p>
                <p class="card-text text-muted">Expiration: ${p.expiration_date}</p>
                <p class="card-text p-0 ${p.quantityAvailable > 0 ? 'text-success' : 'text-danger'}">Available: ${p.quantity}</p>
              </div>
            </div>
          </div>
        `);
        container.append($div);
      });
    }

    function filterProducts(category) {
      const searchQuery = $("#searchInput").val().toLowerCase();
      let filtered = products;

      if (category && category !== 'All') {
        filtered = filtered.filter(p => p.brand_name && p.brand_name.toLowerCase() === category.toLowerCase());
      }

      if (searchQuery) {
        filtered = filtered.filter(p => p.product_name.toLowerCase().includes(searchQuery));
      }

      renderProducts(filtered);
    }

    function addToCart(id, price) {
      const option = $('#optionsfn').val();
      const finalPrice = (option === 'FREE') ? 0 : price;

      const existing = cart.find(item => item.id === id && item.price === finalPrice);
      if (existing) {
        existing.quantity += 1;
      } else {
        cart.push({ id, price: finalPrice, quantity: 1 });
      }

      const product = products.find(p => p.id === id);
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
        const product = products.find(p => p.id === item.id);
        const $li = $(`
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between w-100">
              <span>${product ? product.product_name : 'Unknown Product'}</span>
              <div class="d-flex align-items-center">
                <input type="number" class="form-control form-control-sm w-30 h-55 qty-input" data-index="${item.id}" value="${item.quantity}" min="1">
                x ₱${(item.price * item.quantity).toFixed(2)}
                <button class="btn btn-sm btn-danger ms-2 remove-btn" id="remove-btn" data-quantity="${item.quantity}" data-index="${item.id}">❌</button>
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

      const productInStock = products.find(p => p.id === productInCart.itemcode);
      if (quantity > productInStock.quantityAvailable + originalQuantity) {
        alert("Not enough stock available!");
        return;
      }

      productInCart.quantity = quantity;
      updateCart();
    }

    $(document).ready(function () {
      // Fullscreen button
      $("#fullscreenBtn").click(function () {
        if (!document.fullscreenElement) {
          document.documentElement.requestFullscreen();
          $("body").addClass("fullscreen-active");
        } else {
          if (document.exitFullscreen) {
            document.exitFullscreen();
            $("body").removeClass("fullscreen-active");
          }
        }
      });

      // Product type and category filters
      $('#optionsfn, #categorySelect').on('change', function () {
        filterProducts($('#categorySelect').val());
      });

      // Search filter
      $("#searchInput").on("input", function () {
        filterProducts($('#categorySelect').val());
      });

      // Add to cart on product click
      $(document).on("click", ".product-card", function () {
        const id = $(this).data("id");
        const price = parseFloat($(this).data("price"));
        addToCart(id, price);
      });

      // Update quantity in cart
      $(document).on("change input", ".qty-input", function () {
        const index = $(this).data("index");
        const quantity = $(this).val();
        updateQuantity(index, quantity);
      });

      // Remove item from cart
      $(document).on("click", ".remove-btn", function () {
        const id = $(this).data("id");


        console.log(cart);
        // Step 1: Find the index of the item in the cart
        const cartIndex = cart.findIndex(item => item.id == id);

        if (cartIndex !== -1) {
          const cartItem = cart[cartIndex];
          // Step 2: Restore the quantityAvailable in products
          const product = products.find(p => p.id == cartItem.id);

          console.log(products);
          if (product) {
            product.quantity += cartItem.quantity;
          }
          // Step 3: Remove item from cart
          cart.splice(cartIndex, 1);
          // Step 4: Update UI
          updateCart();
          renderProducts(products);
        }
      });





      // Initial render of products
      renderProducts(products);
    });
  </script>
</body>
</html>
