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

      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
      <style>
      
         body {
         font-size: small;
         font-family: Arial, Helvetica, sans-serif;
         background-color: #121212;
         color: #f1f1f1;
         margin-left: 2px;
         margin-right: 2px;
         overflow-x: hidden;
         overflow-y: auto;
         }
         .card {
         background-color: #1e1e1e;
         color: #fff;
         }
         .card .btn {
         color: #fff;
         }
      </style>
   </head>
   <body>
    <div class="container-fluid" id="main-container" data-transNo="{{isset($data['transNo']) ? $data['transNo'] : '' }}"
        data-productslists='@json(isset($data["prodlist"]) ? $data["prodlist"] : [])'
        data-order='@json(isset($data["lines"]) ? $data["lines"] : [])'
        data-freebie='@json(isset($data["freebieslist"]) ? $data["freebieslist"] : [])'>
    </div>
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
            <label for="contact_num" class="form-label text-light">Contact No.<span class="text-danger">*</span></label>
            <input type="text" id="contact_num" value="{{isset($data['contact_num']) ? $data['contact_num'] : '' }}" class="form-control bg-dark text-light border-secondary" placeholder="Contact No.">
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
            <input type="text" id="email" class="form-control bg-dark text-light border-secondary" placeholder="Email (Optional)" value="{{isset($data['email']) ? $data['email'] : '' }}">
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
         {{-- <div class="col-md-2 d-grid">
            <label class="form-label invisible">Fullscreen</label>
            <button id="fullscreenBtn" class="btn btn-outline-light">
            <i class="bi bi-fullscreen"></i> Fullscreen
            </button>
         </div> --}}
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
            <div class="border p-3 rounded shadow-sm" id="checkoutArea" style="height: 500px; background:  #1e1e1e; display: flex; flex-direction: column;">
               <h1 style="color: #ffffff;">Checkout</h1>
               <ul class="list-group mb-3" id="cartItems" style="word-wrap: break-word; max-height: 300px; overflow-y: auto;"></ul>
               <p style="color: #ffffff; font-size: 20px;"><strong>Total:</strong> <span id="totalAmount">₱0.00</span></p>
               {{-- Button section aligned to the right --}}
               <div class="d-flex justify-content-end" style="flex-wrap: wrap; gap: 5px;">
                  @foreach ($data['button'] as $item)
                  <button data-id="{{isset($data['button']['id']) ? $data['data']['id'] : ''}}"  id="{{$item['id']}}" type="button" class="{{$item['class']}}">{{$item['text']}}</button>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      @vite(['resources/js/apps/order/order-pos-details.js'])
   </body>
</html>