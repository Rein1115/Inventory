$(document).ready(function() {

    let cart = [];
    const products = $('#main-container').data('productslists');
    const order = $('#main-container').data('order');
    const freebie = $('#main-container').data('freebie');
    let selectedCategory = 'All';

    console.log(freebie);

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
                    quantity: o.quantity,
                    total_amount : o.total_amount
                });
            } 
        }); 
        updateCart();
    }

    if (freebie && freebie.length > 0) {
        freebie.forEach(o => {
            // const price = parseFloat(o.price);
            const existing = cart.find(item => item.id === o.product_id);
            if (existing) {
                existing.quantity += o.quantity;
            } else {
                cart.push({
                    id: o.id,
                    selling_price: '',
                    quantity: o.quantity,
                    total_amount : o.Amount
                });
            } 
        }); 
        updateCart();
    }

    // return console.log(cart);

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
                            <p class="card-text ${p.quantity == 0 ? 'text-danger':'text-success'}">Quantity Available: ${p.quantity}</p>
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
            <table class="table table-sm table-borderless" id="addcart">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-start">Product Name</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-end">Total</th>
                        <th scope="col" class="text-center"></th>
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
                    <td class="text-start product_id" data-product_id="${product.id}">${product ? product.product_name : 'Unknown Product'}</td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm qty-input" data-index="${index}" value="${item.quantity}" ${$('#main-container').data('transno') == ' ' ? '' : 'readonly'} min="1">
                    </td>
                    <td class="text-end product_totalprice" data-totalprice= "${item.selling_price * item.quantity}">
                        ₱${(item.selling_price * item.quantity).toFixed(2)}
                    </td>
                    <td class="text-center">
                    ${$('#main-container').data('transno')?' ' : '<button class="btn btn-sm btn-danger ms-2 remove-btn" data-index="${index}">❌</button>'}
                        
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

        if($('#main-container').data('transno') == '' ){
            const id = parseInt($(this).data("id"));
            const selling_price = parseFloat($(this).data("price"));
            const quantity = $(this).data('quantity');
            
            if (quantity == 0) {
                return alert('Zero quantity.');
            }
            addToCart(id, selling_price);
        }
      
        
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

    //Save 
    $("#Btn-save").on('click', function () {
        var finalSave = [];
    
        $('#addcart tbody tr').each(function () {
            let product_id = $(this).find('td.product_id').data('product_id');
            let quantity = $(this).find('td .qty-input').val();
            let totalamount = parseFloat($(this).find('td.product_totalprice').data('totalprice')) || 0;
      
            finalSave.push({
                product_id: product_id,
                quantity: quantity,
                total_amount: totalamount
            });
        });

        var data = {
            po_no : $('#po').val(),
             terms: $('#terms').val(),
            address :$('#address').val(),
            delivered_date : $('#delivered_date').val(),
            deliveredto : $('#deliveredto').val(),
            fullname :$('#fullname').val(),
            contact_num :$('#contact_num').val(),
            deliveredby:$('#deliverby').val(),
            or :$('#orno').val(),
            cr:$('#cr').val(),
            collected_by:$('#collectby').val(),
            email : $('#email').val(),
            lines : finalSave
        };

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to checkout this order(s)?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/order/', data)
                    .then(response => {
                        var resp = response.data;
               
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                // window.location.href = '/order';
                                location.reload();
                            });
                        } else {
                            var errorMessage = 'Error!';
                            if (resp.response && typeof resp.response === 'object') {
                                var errors = [];
                                for (var key in resp.response) {
                                    if (resp.response[key] instanceof Array) {
                                        errors = errors.concat(resp.response[key]);
                                    }
                                }
                                errorMessage = errors.join(' ');
                            } else {
                                errorMessage = resp.message || 'An error occurred.';
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: errorMessage
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: error,
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: 'Order was not save',
                });
            }
        });

        console.log('Final Update', finalSave);
    });

    // Update
    $("#Btn-update").on('click', function () {
        var finalSave = [];

        var transNo = $('#main-container').data('transno');
        var data = {
            po_no : $('#po').val(),
             terms: $('#terms').val(),
            address :$('#address').val(),
            delivered_date : $('#delivered_date').val(),
            deliveredto : $('#deliveredto').val(),
            fullname :$('#fullname').val(),
            contact_num :$('#contact_num').val(),
            deliveredby:$('#deliverby').val(),
            or :$('#orno').val(),
            cr:$('#cr').val(),
            collected_by:$('#collectby').val(),
            email : $('#email').val(),
            // lines : finalSave
        };

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to checkout this order(s)?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.put('/order/'+transNo, data)
                    .then(response => {
                        var resp = response.data;
            //    alert(1234);
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                // window.location.href = '/order';
                                location.reload();
                            });
                        } else {
                            var errorMessage = 'Error!';
                            if (resp.response && typeof resp.response === 'object') {
                                var errors = [];
                                for (var key in resp.response) {
                                    if (resp.response[key] instanceof Array) {
                                        errors = errors.concat(resp.response[key]);
                                    }
                                }
                                errorMessage = errors.join(' ');
                            } else {
                                errorMessage = resp.message || 'An error occurred.';
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: errorMessage
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: error,
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: 'Order was not save',
                });
            }
        });

        console.log('Final Update', finalSave);
    });
    

    // Initial render of products and filtering
    renderProducts(products);
    filterProducts(selectedCategory);

    $('#Btn-back').on('click', function() {
        window.location.href = '/order';
    });
});
