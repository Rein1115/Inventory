
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>POS Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Optional: Bootstrap 5 Select2 Theme -->
  <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />


    <style>
  #main-container:fullscreen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      /* background-color: #18191a;  */
      color: #e4e6eb; 
  }

      body{
          font-size: small;
          font-family: Arial, Helvetica, sans-serif;
        background-color: #1e1e2f;
          color: #f1f1f1;"
      }
    </style>
  </head>
  <body>
    <div class="container-fluid" id="main-container"data-productslists='@json(isset($data['prodlist']) ? $data['prodlist'] : [])'data-checkoutpod=''>
  </div>
      <div class="row g-2 mb-1 mt-2">
        <div class="col-md-3">
            <label for="orno" class="form-label text-light">OR No.<span class="text-danger">*</span></label>
            <input type="text" value="{{isset($data['or']) ? $data['or'] : '' }}" id="orno" class="form-control bg-dark text-light border-secondary" placeholder="OR No.">
        </div>
        <div class="col-md-3">
            <label for="cr" class="form-label text-light">CR No.<span class="text-danger">*</span></label>
            <input type="text" value="{{isset($data['cr']) ? $data['cr'] : '' }}" id="cr" class="form-control bg-dark text-light border-secondary" placeholder="CR No.">
        </div>
        <div class="col-md-3">
            <label for="po" class="form-label text-light">PO No.<span class="text-danger">*</span></label>
            <input type="text" value="{{isset($data['po_no']) ? $data['po_no'] : '' }}" id="po" class="form-control bg-dark text-light border-secondary" placeholder="PO No.">
        </div>
        <div class="col-md-3">
            <label for="terms" class="form-label text-light">Terms<span class="text-danger">*</span></label>
            <input type="text" value="{{isset($data['terms']) ? $data['terms']: '' }}" id="terms" class="form-control bg-dark text-light border-secondary" placeholder="Terms">
        </div>
    </div>
    
    <div class="row g-2 mb-3">
        <div class="col-md-3">
            <label for="fullname" class="form-label text-light">Fullname<span class="text-danger">*</span></label>
            <input type="text" value="{{isset($data['fullname']) ? $data['fullname'] : '' }}" id="fullname" class="form-control bg-dark text-light border-secondary" placeholder="Fullname">
        </div>
        <div class="col-md-3">
            <label for="contact_num" value="{{isset($data['contact_num']) ? $data['contact_num'] : '' }}"  class="form-label text-light">Contact No.<span class="text-danger">*</span></label>
            <input type="text" id="contact_num" class="form-control bg-dark text-light border-secondary" placeholder="Contact No.">
        </div>
        <div class="col-md-3">
          <label for="address" class="form-label text-light">Address<span class="text-danger">*</span></label>
          <input type="text" value="{{isset($data['address']) ? $data['address'] : '' }}" id="address" class="form-control bg-dark text-light border-secondary" placeholder="Address">
        </div>

        <div class="col-md-3">
          <label for="delivered_date" class="form-label text-light">Delivered Date<span class="text-danger">*</span></label>
          <input type="date" value="{{isset($data['delivered_date']) ? $data['delivered_date'] : '' }}" id="delivered_date" class="form-control bg-dark text-light border-secondary" placeholder="Delivered Date">
        </div>

    </div>
    
    <div class="row g-2 mb-3">
      <div class="col-md-3">
        <label for="deliveredto" class="form-label text-light">Delivered To<span class="text-danger">*</span></label>
        <input type="text" value="{{isset($data['deliveredto']) ? $data['deliveredto']: '' }}"  id="deliveredto" class="form-control bg-dark text-light border-secondary" placeholder="Delivered To">
      </div>

      <div class="col-md-3">
          <label for="deliverby" class="form-label text-light">Delivered By<span class="text-danger">*</span></label>
          <input type="text" value="{{isset($data['deliveredby']) ?$data['deliveredby']: '' }}"   id="deliverby" class="form-control bg-dark text-light border-secondary" placeholder="Delivered By">
      </div>
      <div class="col-md-3">
          <label for="collectby" class="form-label text-light">Collected By<span class="text-danger">*</span></label>
          <input type="text" value="{{isset($data['collected_by']) ? $data['collected_by'] : '' }}"  id="collectby" class="form-control bg-dark text-light border-secondary" placeholder="Collected By">
      </div>
      <div class="col-md-3">
          <label for="email" class="form-label text-light">Email (Optional)</label>
          <input type="text" id="input8" class="form-control bg-dark text-light border-secondary" placeholder="Email (Optional)">
      </div>
    </div>


    <div class="row g-2 mb-3 {{!empty($data['payment_status']) ? $data['payment_status'] : 'd-none'}}">
      <div class="col-md-3">
        <label for="payment_status">Payment Status <span class="text-danger">*</span></label>
        <input value="{{!empty($data['payment_status']) ? $data['payment_status'] : 'Unpaid'}}" 
        class="form-control bg-dark text-light border-secondary" type="text" id="payment_status" name="payment_status"  readonly>
      </div>
    </div>

    

      <!-- Top Controls -->
      <div class="row g-2 mb-3 align-items-end mt-3">
          <div class="col-md-3">
              <label for="optionsfn" class="form-label text-light">Product Type</label>
              <select id="optionsfn" class="form-select bg-dark text-light border-secondary">
                  <option value="NOTFREE">NOT FREE</option>
                  <option value="FREE">FREE</option>
              </select>
          </div>

          <div class="col-md-3">
              <label for="categorySelect" class="form-label text-light">Category</label>
              <select id="categorySelect" class="form-select bg-dark text-light border-secondary">
                  <option value="All">All</option>
                  @foreach($data['brand'] as $value)
                      <option value="{{$value->brand_name}}">{{ $value->brand_name }}</option>
                  @endforeach
              </select>
          </div>

          <!-- Fullscreen Button -->
          <div class="col-md-2 d-grid">
              <label class="form-label invisible">Fullscreen</label>
              <button id="fullscreenBtn" class="btn btn-outline-light">
                  <i class="bi bi-fullscreen"></i> Fullscreen
              </button>
          </div>
      </div>

      <!-- Product and Checkout Section -->
      <div class="row">
          <!-- Products Area -->
          <div class="col-md-8">
              <div class="d-flex justify-content-between align-items-center mb-2">
                  <h4 class="mb-0 text-light">Products</h4>
                  <div class="col-md-4 d-flex justify-content-end">
                      <div class="form-group w-100 d-flex align-items-center">
                          <label for="searchInput" class="form-label me-2 mb-0 text-light">Search</label>
                          <input type="text" id="searchInput" class="form-control bg-dark text-light border-secondary" placeholder="Type to search..." />
                      </div>
                  </div>
              </div>

              <div class="row" id="productArea">
                  <!-- Products will be rendered here -->
              </div>
          </div>

          <!-- Checkout Section (Placed on the left side) -->
          <div class="col-md-4">
            <div class="border p-3 rounded shadow-sm" id="checkoutArea" style="height: 500px; background: linear-gradient(to bottom right, #2a2f4a, #343b5b);">
                <h1 style="color: #ffffff;">Checkout</h1>
                <ul class="list-group mb-3" id="cartItems" style="word-wrap: break-word; max-height: 300px; overflow-y: auto;"></ul>
        
                <p style="color: #ffffff; font-size: 20px;"><strong>Total:</strong> <span id="totalAmount">₱0.00</span></p>
        
                {{-- Button section aligned to the right --}}
                <div class="d-flex justify-content-end">
                  @foreach ($data['button'] as $item)
                      <button data-id="{{isset($data['button']['id']) ? $data['data']['id'] : ''}}"  id="{{$item['id']}}" type="button" class="{{$item['class']}} me-2">{{$item['text']}}</button>
                  @endforeach
              </div>
              
            </div>
        </div>
        
      </div>
  </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
      var products = $('#main-container').data('productslists');
      let cart = [];
      let selectedCategory = 'All';  // Variable to store the selected category
      
      $("#fullscreenBtn").on("click", function () {
        const elem = $("#main-container")[0]; // Get raw DOM element from jQuery object

        if (!document.fullscreenElement) {
            elem.requestFullscreen().catch((err) => {
                console.error(`Error attempting to enable fullscreen: ${err.message} (${err.name})`);
            });
        } else {
            document.exitFullscreen();
        }
      });


      
      $('#optionsfn, #categorySelect').select2({
        theme: 'bootstrap-5',
        dropdownAutoWidth: true,
        width: '100%'
      });

      // Function to render products based on filter
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

          const existing = cart.find(item => item.id === id && item.selling_price === finalPrice);
          if (existing) {
              existing.quantity += 1;
          } else {
              cart.push({ id, selling_price: finalPrice, quantity: 1 });
          }

          // Update product quantity after adding to cart
          const product = products.find(p => p.id === id);
          if (product && product.quantity > 0) {
              product.quantity -= 1;
          }

          updateCart();
          filterProducts(selectedCategory); // Ensure we keep the current category after adding to cart
      }

      // Update cart UI
      function updateCart() {
  const $cartList = $("#cartItems").empty();
  let total = 0;

  // Append table header only once
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

  // Append the table to the list
  $cartList.append($table);

  cart.forEach((item, index) => {
    total += item.selling_price * item.quantity;
    const product = products.find(p => p.id === item.id);
    const $row = $(`
      <tr>
        <td class="text-start text-center">${product ? product.product_name : 'Unknown Product'}</td>
        <td class="text-center">
          <input type="number" class="form-control form-control-sm qty-input" data-index="${index}" value="${item.quantity}" min="1">
        </td>
        <td class="text-end">
          x₱${(item.selling_price * item.quantity).toFixed(2)}
        </td>
        <td class="text-center">
          <button class="btn btn-sm btn-danger ms-2 remove-btn" data-index="${index}">❌</button>
        </td>
      </tr>
    `);
    // Append the product row inside the table body
    $("#cartBody").append($row);
  });

  // Update total amount
  $("#totalAmount").text(`₱${total.toFixed(2)}`);
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

      $(document).ready(function () {
          renderProducts(products);
          filterProducts(selectedCategory);

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
              updateChange(total);
          });
          
      });
      
  </script>

    
    
  </body>
  </html>
