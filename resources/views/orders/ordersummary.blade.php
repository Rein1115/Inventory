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
                      <th class="text-center">Or#</th>
                      <th class="text-center">Order Date</th>
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>
                  @foreach ($response as $item)
                  <tr>
                      <td class="text-center">{{$item->or}}</td>
                      <td class="text-center">{{$item->order_date}}</td>
                      <td class="text-center"><a href="{{route('printOrder',$item->or)}}" class="btn btn-primary">Open</a></td>
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
