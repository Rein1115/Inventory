@extends('layouts.homeapp')

@section('content')
<div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
       </div>
       <div class="card-body">
          <div class="table-responsive">
             <table id="datatable" class="table table-striped text-center" data-toggle="data-table">
                <thead >
                   <tr>
                      <th class="text-center">Product Name</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Total Amount</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($response as $item)
                    <tr>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            ₱ {{number_format($item->totalamount,2)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
             </table>
          </div>
       </div>
    </div>
 </div>
 <div>
    <h1>Total Sale(s):  ₱
        @foreach($totalamount as $item ){{ number_format($item->sumtotalamount,2) }} @endforeach</h1>
 </div>





@endsection