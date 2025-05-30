@extends('layouts.apps')

@section('content')
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Order History</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
                <div class="col-12" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order(s) History</h4>
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

{{-- OLD --}}
{{-- <script src="../apps/order/order-list.js"></script> --}}


{{-- NEW --}}
@vite(['resources/js/apps/order/order-list.js'])
@endsection