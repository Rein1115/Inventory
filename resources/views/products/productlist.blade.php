@extends('layouts.homeapp')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <form id="formtest" method="post">
            @csrf
            <input type="text" name="productname">
            <input type="text" name="quantity">
            <input type="text" name="price">
            <input type="date" name="expiration">
            <button type="submit">test</button>
        </form>

    </div>
</div>

<div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             <a href = "{{route('Inventory.create')}}" class="btn btn-primary">Add Inventory</a>
          </div>
       </div>
       <div class="card-body">
          <div class="table-responsive">
             <table id="datatable" class="table table-striped" data-toggle="data-table">
                <thead>
                   <tr>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Expiry Date</th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td> ₱{{ $item->price }}</td>
                        <td>{{ $item->expiration }}</td>
                        <td>
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
 