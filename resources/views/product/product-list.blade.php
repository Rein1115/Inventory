@extends('layouts.apps')
@section('title')
Product(s) List
@endsection
@section('content')
<div class="row">


{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
                <div class="col-12" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product(s) List</h4>
                            <div class="table-responsive">
                                <table id= "product"  style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">Product(s) Name</th>
                                            <th style="text-align: center;">Brand Name</th>
                                            <th style="text-align: center;">Quantity</th>
                                            <th style="text-align: center;">Mg</th>
                                            <th style="text-align: center;">Expiration Date</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Created By</th>
                                            <th style="text-align: center;">Created At</th>
                                            <th style="text-align: center;"></th>
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
@include('tools.product.product-modal')
@endsection
@section('script')
<script src="../apps/product/product-list.js"></script>
@endsection