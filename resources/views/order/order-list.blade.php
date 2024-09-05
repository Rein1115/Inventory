@extends('layouts.apps')
@section('title')
Order(s) List
@endsection
@section('content')
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
                <div class="col-12" >
                    <div class="card">
                        <div class="card-body" id="alldas" data-datas = "{{isset($datas) ? json_encode($datas) : ''}}">
                            <h4 class="card-title">Order(s) List</h4>
                            <div class="table-responsive">
                                <table id= "order"  style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">OR no.</th>
                                            <th style="text-align: center;">Address</th>
                                            <th style="text-align: center;">Terms</th>
                                            <th style="text-align: center;">Delivered To</th>
                                            <th style="text-align: center;">Created At</th>
                                            <th style="text-align: center;">Created By</th>
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
{{-- @include('tools.order.order-modal') --}}
@endsection
@section('script')
<script src="../apps/order/order-list.js"></script>
@endsection