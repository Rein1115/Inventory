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
                      <th>Quantity</th>
                      <th>Address</th>
                      <th>Payment Status</th>
                      <th>Total Amount</th>
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>₱{{ $item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td> {{ $item->address }}</td>
                        <td><span class="badge {{ $item->upaid === 0 ? 'text-bg-danger' : 'text-bg-success'}}">{{$item->upaid === 0 ? 'Unpaid' : 'Paid'}}</span></td>
                        <td>{{$item->totalamount}}</td>
                        <td class="justify d-flex">
                            <form class="deleteOrderForm" method="post">
                                @csrf
                                <input type="hidden" name="upquan" value="{{ $item->quantity }}">
                                <input type="hidden" name="delorder" value="{{ $item->order_id }}">
                                <button class="btn btn-danger quan" data-quan="{{ $item->product_id }}" type="submit">Delete</button>
                            </form> 
                               &nbsp;
                            <a href="{{route('printOrder',$item->order_id)}}" class="btn btn-primary" id="open" data-id="">Open</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
                
             </table>
          </div>
       </div>
    </div>
</div>
    @vite(['resources/js/order/ordersummary.js'])

@endsection
