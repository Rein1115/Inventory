@extends('layouts.homeapp')

@section('content')
<div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             <a href = "{{route('Inventory.create')}}" class="btn btn-primary">Add Inventory</a>
          </div>
       </div>
       <div class="card-body">
          <div class="table-responsive">
             <table  id="datatable" class="table table-striped" data-toggle="data-table">
                <thead>
                   <tr>
                      <th class="text-center">Product Name</th>
                      <th class="text-center">Stock(s)</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Expiry Date</th>
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td class="text-center">{{ $item->product_name }}</td>
                        <td class="text-center"><span class="{{$item->quantity == 0 ? 'badge bg-danger' : '' }}">{{$item ->quantity == 0 ? "OUT OF STOCK" :  $item ->quantity }} </span></h1> </td>
                        <td class="text-center"> ₱{{ $item->price }}</td>
                        <td class="text-center">{{ $item->expiration }}</td> 
                        <td class="text-center">
                           <a href="{{ route('Inventory.show', $item->product_id) }}" class="btn btn-success edit-btn" data-id="{{ $item->product_id }}">Edit</a>
                            <a class="btn btn-danger delete-btn" id="delete" data-id="{{ $item->product_id }}">Delete</a>
                            <a href="{{ route('productOrder',$item->product_id)}}" class="btn btn-primary add-order" id="delete" data-id="{{ $item->product_id }}">Add order</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
             </table>
          </div>
       </div>
    </div>
 </div>
@vite(['resources/js/product/product-list.js'])
@endsection 
 