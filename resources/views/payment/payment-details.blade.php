@extends('layouts.apps')
@section('title') {{isset($data['orders']['trans_no']) ? 'Order Payment' : ''}} @endsection
@section('content')
<div class="row">
<div class="row page-titles mx-0 ml-3">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Payment</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{isset($data['transNo']) ? 'Update Product' : 'Create Product'}}</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card col-sm" data-totalam="{{isset($data['orders']['total_amount']) ? $data['orders']['total_amount'] : '' }}"  data-trans="{{isset($data['orders']['trans_no']) ? $data['orders']['trans_no'] : '' }}" id="payments" data-payment ="{{isset($data['payments']) ? json_encode($data['payments']): '' }}">
            <div class="card-body">
                {{-- <h1 class="card-title mb-5">{{isset($data['data']['id']) ? 'Update Product' : 'Create Product'}}</h1> --}}

                <div class="basic-form">
                    <div class="row">

                            <div class="form-group col-sm">
                                <label >Delivered To : </label>
                                <span class="font-weight-bold">{{isset( $data['orders']['deliveredto']) ?  $data['orders']['deliveredto']: ''}}</span>
                            </div>

                            <div class="form-group col-sm">
                                <label >Delivered Date : </label>
                                <span class="font-weight-bold">{{isset( $data['orders']['delivered_date']) ?  $data['orders']['delivered_date']: ''}}</span>
                            </div>
                            
                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label >Address :</label>
                           <span class="font-weight-bold">{{isset( $data['orders']['address']) ?  $data['orders']['address']: ''}}</span>
                        </div>

                        <div class="form-group col-sm">
                            <label >Terms : </label>
                         <span class="font-weight-bold">{{isset( $data['orders']['terms']) ?  $data['orders']['terms']: ''}}</span>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label >OR no:</label>
                            <span class="font-weight-bold text-white badge badge-secondary">{{isset( $data['orders']['or']) ?  $data['orders']['or']: ''}}</span>
                        </div>

                        <div class="form-group col-sm">
                            <label >PO no:</label>
                           <span class="font-weight-bold  text-white badge badge-secondary" > {{isset( $data['orders']['po_no']) ?  $data['orders']['po_no']: ''}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label >Delivered By:</label>
                            <span class="font-weight-bold"> {{isset( $data['orders']['deliveredby']) ?  $data['orders']['deliveredby']: ''}}</span>
                        </div>

                        <div class="form-group col-sm">
                            <label>Collected By:</label>
                           <span class="font-weight-bold">{{isset( $data['orders']['collected_by']) ?  $data['orders']['collected_by']: ''}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label >Exact Amount:</label>
                            <span class="font-weight-bold badge badge-primary" data-data="{{isset( $data['orders']['total_amount']) ?  $data['orders']['total_amount']: ''}}" id="totalamounts"> </span>
                        </div>

                        <div class="form-group col-sm">
                            <label>Status:</label>
                           <span id="stat" class="font-weight-bold badge badge-info">{{isset( $data['orders']['status']) ?  $data['orders']['status']: ''}}</span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm">
                            <label >Balance Amount:</label>
                            <span class="font-weight-bold badge badge-primary" id="balance"></span>
                        </div>
                    </div>

                    {{-- start data table --}}
                    <div class="col-12" >
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Payment(s)</h4>
                                <div class="table-responsive">
                                    <table id="payment" style="text-align:center; width:100%; border-collapse:collapse;">
                                        <thead>
                                            <tr>
                                                <th></th> <!-- This is for the row number -->
                                                <th style="text-align: center;">Payment</th>
                                                <th style="text-align: center;">Payment Mode</th>
                                                <th style="text-align: center;">Number</th>
                                                <th style="text-align: center;">Payment Date</th>
                                                <th style="text-align: center;">Created By</th>
                                                <th style="text-align: center;">Updated By</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8" style="text-align: center;"> <!-- Adjust colspan to match the number of columns -->
                                                    <button type="button" id="btnAdd" class="btn btn-sm btn-success" style="border-radius:50%;">
                                                        <i class="icon-plus plus-icon text-white"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>          
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- end data table --}}


                    <div class="col-lg-12">
                        <div class="col-12 mt-3" >
                            <div class="ui-group-buttons">
                                <button type="button" class="btn btn-primary btn-md text-right">
                                    <i class="fa fa-fw fa-money pr-4 text-white"></i>Total Payment(s)</button>
                                <button type="button" class="btn btn-danger btn-md" data-total="" id="totalAmount">0.00</button>
                            </div>
                        </div>
                    </div> 
                    
                    
                    <!-- Buttons -->
                    {{-- <div class="form-group mt-4 d-flex justify-content-end">
                        @foreach ($data['button'] as $item)
                            <button data-id="{{isset($data['data']['id']) ? $data['data']['id'] : ''}}"  id="{{$item['id']}}" type="button" class="{{$item['class']}}" id="{{$item['id']}}">{{$item['text']}}</button>
                        @endforeach
                    </div> --}}
                    

                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@include('tools.payment.payment-modal')
@endsection
@section('script')
<script src="../apps/payment/payment-details.js"></script>
@endsection