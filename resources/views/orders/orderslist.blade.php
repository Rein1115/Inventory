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
                      <th class="text-center">Deliveredto</th>
                      {{-- <th>product_name</th>
                      <th>Price</th>
                      <th>Deliveredby</th> --}}
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td>{{ $item->deliveredto }}</td>
                        {{-- <td>{{ $item->product_name}}</td>
                        <td> ₱{{ $item->price }}</td>
                        <td>{{ $item->deliveredby}}</td> --}}
                        <td>
                           <a href="{{ route('viewSummary', $item->deliveredto) }}" class="btn btn-primary edit-btn" data-id="{{ $item->order_id }}">View Summary</a>
                            <a class="btn btn-danger delete-btn" id="delete" data-id="{{ $item->order_id }}">Delete</a>
                            {{-- <a class="btn btn-primary" id="delete" data-id="{{ $item->order_id }}">Open</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
                
             </table>
          </div>
       </div>
    </div>
 </div>
@vite(['resources/js/order/order-list.js'])
@endsection 
 