@extends('layouts.apps')
@section('title')
Payment(s) History
@endsection
@section('content')
<div class="row">

{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment History</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
                <div class="col-12" >
                    <div class="card">
                        <div class="card-body" id="alldas">
                            <h4 class="card-title">Payment(s) History</h4>
                            <div class="table-responsive">
                                <table id= "payment"  style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">Address</th>
                                            <th style="text-align: center;">OR no.</th>
                                            <th style="text-align: center;">PO no.</th>
                                            <th style="text-align: center;">Created At</th>
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
{{-- @include('tools.order.order-modal') --}}
@endsection
@section('script')

{{-- OLD --}}
{{-- <script src="../apps/payment/payment-history-list.js"></script> --}}


{{-- NEW --}}
@vite(['resources/js/apps/payment/payment-history-list.js'])
@endsection