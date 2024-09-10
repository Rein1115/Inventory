@extends('layouts.apps')
@section('title')
Product(s) History
@endsection
@section('content')

<div class="row">


<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product history</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
                <div class="col-12" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product(s) History</h4>
                            <div class="table-responsive">
                                <table id= "history"  style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                     
                                        <tr>
                                            <th style="text-align: center;"></th>
                                            <th style="text-align: center;">Product Name</th>
                                            <th style="text-align: center;">Brand Name</th>
                                            <th style="text-align: center;">mg</th>
                                            <th style="text-align: center;">Original Quantity</th>
                                            <th style="text-align: center;">Selling Price</th>
                                            <th style="text-align: center;">Original Price</th>
                                            <th style="text-align: center;">Status</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>   
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>          

</div>
{{-- @include('tools.order.order-modal') --}}
@endsection
@section('script')
<script src="../apps/product/product-history.js"></script>
@endsection