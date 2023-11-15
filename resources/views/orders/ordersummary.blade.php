@extends('layouts.homeapp')

@section('content')
<div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             {{-- <a href = "{{route('Orders.create')}}" class="btn btn-primary">Add Orders</a> --}}
          </div>
       </div>
       <div class="card-body">
          <div class="table-responsive">
             <table id="datatable" class="table table-striped text-center" data-toggle="data-table">
                <thead>
                   <tr>
                      <th class="text-center">Productname</th>
                      <th>Price</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th>Total Amount</th>
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>₱{{ $item->price}}</td>
                        <td> {{ $item->address }}</td>
                        <td>{{ $item->date}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->totalamount}}</td>
                        <td>
                           {{-- <a href="{{ route('viewSummary', $item->order_id) }}" class="btn btn-primary edit-btn" data-id="{{ $item->order_id }}">View Summary</a> --}}
                            <a class="btn btn-danger delete-btn" id="delete" data-id="{{ $item->order_id }}">Delete</a>
                            <a href="{{route('printOrder',$item->order_id)}}" class="btn btn-primary" id="open" data-id="{{ $item->order_id }}">Open</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
                
             </table>
          </div>
       </div>
    </div>
 </div>



    {{-- Print receipt --}}


    <div class="col-sm-12">
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
                    <div class="col-6">
                        <p><strong>Date:</strong> October 10, 2023</p>
                        <p><strong>Time:</strong> 12:30 PM</p>
                    </div>
                    <div class="col-6 text-right">
                        <p><strong>Receipt #:</strong> 123456</p>
                        <p><strong>Cashier:</strong> John Doe</p>
                    </div>
                </div>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th class="text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product 1</td>
                            <td class="text-right">$10.00</td>
                        </tr>
                        <tr>
                            <td>Product 2</td>
                            <td class="text-right">$15.00</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                <hr>
                <div class="text-right">
                    <p><strong>Total:</strong> $25.00</p>
                </div>
                <hr>
                <p class="text-center">Thank you for your purchase!</p>
            </div>
        </div>
        </div>
     </div>







    @vite(['resources/js/order/ordersummary.js'])

@endsection
