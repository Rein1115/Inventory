@extends('layouts.homeapp')
@section('content')


@foreach($response as $item)
    @php
        $productNames = explode(',', $item->product_names);
        $productPrices = explode(',', $item->product_price);
        $quantities = explode(',', $item->quantity);
    @endphp
    
    <div class="col-sm-12">
      <div class="d-flex printandupdat"  >
         <a id="printorders" class="btn mb-2 rounded" style="background-color:#77797a; color:white;">
            Print
            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9455 12.89C14.2327 13.18 14.698 13.18 14.9851 12.89C15.2822 12.6 15.2822 12.13 14.995 11.84L12.1535 8.96C12.0842 8.89 12.005 8.84 11.9158 8.8C11.8267 8.76 11.7376 8.74 11.6386 8.74C11.5396 8.74 11.4406 8.76 11.3515 8.8C11.2624 8.84 11.1832 8.89 11.1139 8.96L8.28218 11.84C7.99505 12.13 7.99505 12.6 8.28218 12.89C8.56931 13.18 9.03465 13.18 9.32178 12.89L10.896 11.29V16.12C10.896 16.53 11.2228 16.86 11.6386 16.86C12.0446 16.86 12.3713 16.53 12.3713 16.12V11.29L13.9455 12.89ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.2921 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4313 9.02 17.801 9.02315 18.1258 9.02591C18.3801 9.02807 18.6069 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6047 7.566C18.7908 7.569 17.8324 7.566 17.1423 7.559C16.0472 7.559 15.1452 6.648 15.1452 5.542V2.906C15.1452 2.475 15.6621 2.261 15.9581 2.572C16.7204 3.37179 17.8872 4.59739 18.8736 5.63346C19.2735 6.05345 19.6437 6.44229 19.9452 6.759C20.2334 7.062 20.0215 7.565 19.6047 7.566Z" fill="currentColor">
               </path>
            </svg>
         </a>
         &nbsp;
        <a href="#" class="btn btn-success mb-2 rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
         Payment Mode
         <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
            <path d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z" fill="currentColor">
               </path>                            
         </svg>                        
          </a>
          &nbsp;
          <a href="#" class="btn btn-primary mb-2 rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Payment Summary
            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.92574 16.39H14.3119C14.7178 16.39 15.0545 16.05 15.0545 15.64C15.0545 15.23 14.7178 14.9 14.3119 14.9H8.92574C8.5198 14.9 8.18317 15.23 8.18317 15.64C8.18317 16.05 8.5198 16.39 8.92574 16.39ZM12.2723 9.9H8.92574C8.5198 9.9 8.18317 10.24 8.18317 10.65C8.18317 11.06 8.5198 11.39 8.92574 11.39H12.2723C12.6782 11.39 13.0149 11.06 13.0149 10.65C13.0149 10.24 12.6782 9.9 12.2723 9.9ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0545 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.6111 7.566C18.7972 7.569 17.8378 7.566 17.1477 7.559C16.0527 7.559 15.1507 6.648 15.1507 5.542V2.906C15.1507 2.475 15.6685 2.261 15.9646 2.572C16.5004 3.13476 17.2368 3.90834 17.9699 4.67837C18.7009 5.44632 19.4286 6.21074 19.9507 6.759C20.2398 7.062 20.0279 7.565 19.6111 7.566Z" fill="currentColor">
                  </path>                            
            </svg>                                               
          </a>

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Payment Transaction </h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                        <form action="{{ route('paymentreaming') }}" method="post">

                           @csrf

                           <div class="row" >
                              <label for="paymentmode">Mode Of Payment<span class="text-danger">*</span></label>
                              <div class="col-12  mb-2">
                                 <input type="text" name="or" value="{{$item->or}}" style="display:none;">
                                 <input type="hidden" name="orderid" value="{{$item->order_id}}">
                                 <select class="form-select" name="paymentmode" aria-label="Default select example" id="paymentmode">
                                    <option selected>Open this select payment mode</option>
                                    <option id="cash" value="Cash">Cash</option>
                                    <option id="gcash" value="Gcash">Gcash</option>
                                    <option  id="bank" value="Bank">Bank</option>
                                    <option value="Paymaya">Paymaya</option>
                                  </select>
                              </div>

                              <div class="col-12" id="CredentialNumber" style="display:none;">
                                 <label for="g/bnumber" > <span id="valuelabel"></span> <span class="text-danger">*</span></label>
                                 <input class="form-control" type="number" id="g/bnumber" name="crenumber" placeholder="Number">
                              </div>
                              
                              <input  type="hidden" name="payment" id="payment" value="{{ $paymentsval ?: $item->totalamount }}">
                              <div class="col-12 cash"  style="display:none;">
                                 <label for="payment" ><span>Amount <span class="text-danger" >*</span></span></label>
                                 <input class="form-control" type="number" id="payment" name="amount" placeholder="Amount">
                              </div>

                              <div class="col-12 cash"  style="display:none;">
                                 <label for="payment" ><span>date <span class="text-danger" >*</span></span></label>
                                 <input class="form-control" type="date" id="payment" name="date" placeholder="Amount">
                              </div>
                            </div>
                         
                     </div>
                     <div class="text-start">
                         <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                         <button type="button" class="btn btn-danger"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                     </div>
                  </form>   
                 </div>
             </div>
         </div>
     </div>

        &nbsp;
         {{-- <input type="hidden" id="paymentpara" data-pay="{{$item->order_id}}">
         <form class="updatePayment" method="post" >
           @csrf
            <input type="hidden" value="1" name="updatepay">
            <button type="submit" {{ $item->upaid == 0 ? '' : 'disabled' }} class="btn {{ $item->upaid == 0 ? 'btn-danger' : 'btn-success' }} mb-2 rounded">{{$item->upaid ==0 ? 'Unpaid' : 'Paid'}}
            @if($item->upaid == 0)
            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11.9993C2 6.48027 6.48 1.99927 12 1.99927C17.53 1.99927 22 6.48027 22 11.9993C22 17.5203 17.53 21.9993 12 21.9993C6.48 21.9993 2 17.5203 2 11.9993ZM11.12 8.20927C11.12 7.73027 11.52 7.32927 12 7.32927C12.48 7.32927 12.87 7.73027 12.87 8.20927V12.6293C12.87 13.1103 12.48 13.4993 12 13.4993C11.52 13.4993 11.12 13.1103 11.12 12.6293V8.20927ZM12.01 16.6803C11.52 16.6803 11.13 16.2803 11.13 15.8003C11.13 15.3203 11.52 14.9303 12 14.9303C12.49 14.9303 12.88 15.3203 12.88 15.8003C12.88 16.2803 12.49 16.6803 12.01 16.6803Z" fill="currentColor">
               </path>
            </svg>
            @else 
            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C6.48 22 2 17.51 2 12C2 6.48 6.48 2 12 2C17.51 2 22 6.48 22 12C22 17.51 17.51 22 12 22ZM16 10.02C15.7 9.73 15.23 9.73 14.94 10.03L12 12.98L9.06 10.03C8.77 9.73 8.29 9.73 8 10.02C7.7 10.32 7.7 10.79 8 11.08L11.47 14.57C11.61 14.71 11.8 14.79 12 14.79C12.2 14.79 12.39 14.71 12.53 14.57L16 11.08C16.15 10.94 16.22 10.75 16.22 10.56C16.22 10.36 16.15 10.17 16 10.02Z" fill="currentColor">
               </path>
            </svg>
            @endif
            </button>
         </form> --}}
      </div>
      
      <div class="card-body">
         <div class="table-responsive">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                  </div>
               </div>
               <div class="container">
                  <div class="receipt">
                     <h2 class="text-center">Receipt</h2>
                     <hr>
                     <div class="row">
                        <div class="col-md-6">
                           <p><strong>Delivered To:</strong> {{ $item->deliveredto }}</p>
                           <p><strong>Address:</strong> {{ $item->address }}</p>
                           <p><strong>Date:</strong> {{$item->date}}</p>
                           <strong>Balance: </strong>
                           @if($paymentsval === 0)
                               <span class="badge bg-success">Paid</span>
                           @elseif($paymentsval !== null)
                               <span class="badge bg-secondary">₱{{ number_format($paymentsval, 2) }}</span>
                           @else
                               <span class="badge bg-info">No Downpayment</span>
                           @endif
                        </div>
                        <div class="col-md-6">
                           <p><strong>Terms #: </strong> {{$item->terms}} Day(s)</p>
                           <p><strong>P.O #: </strong> {{$item->po}}</p>
                           <p><strong>O.R #: </strong> {{$item->or}}</p>
                        </div>
                     </div>
                     <hr>
                     <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th>Product Name</th>
                                 <th>Price</th>
                                 <th>Quantity</th>
                              </tr>
                           </thead>
                           <tbody>

                              @foreach($productNames as $index => $productName)
                              <tr>
                                  <td>{{ $productName }}</td>
                                  <td>₱{{ $productPrices[$index] }}</td>
                                  <td>{{ $quantities[$index] }}</td>
                              </tr>
                          @endforeach
                             
                           </tbody>
                        </table>
                     </div>
                     <hr>
                     <div class="text-center">
                        <h1><strong>Total: </strong>₱{{number_format($item->totalamount ,2)}}</h1>
                     </div>
                     <hr>
                     <p class="text-center">Thank you for your purchase!</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


@endforeach






@vite(['resources/js/order/ordersummary.js','resources/css/order/printSummary.css'])


@endsection