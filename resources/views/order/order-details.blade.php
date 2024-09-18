@extends('layouts.apps')

@section('title') {{isset($data['transNo']) ? 'Update Order' : 'Create Order'}} @endsection
@section('content')
<div class="row">


<div class="row page-titles mx-0 ml-3">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Order</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{isset($data['transNo']) ? 'Update Order' : 'Create Order'}}</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card col-sm" data-transNo= "{{isset($data['transNo']) ? $data['transNo']: '' }}" id="products" data-products ="{{isset($products) ? json_encode($products): '' }}">
            <div class="card-body" id="freebiesorder">
                {{-- <h1 class="card-title mb-5">{{isset($data['data']['id']) ? 'Update Product' : 'Create Product'}}</h1> --}}

                <div class="basic-form" id="dataval" data-data="{{ isset($data['lines']) ? json_encode($data['lines']) : '' }}" data-t="{{ isset($remainingQuantities) ? json_encode($remainingQuantities) : '' }}">
                    <div class="row">
                            {{-- <!-- Product Name -->
                            <div class="form-group col-sm">
                                <label for="product_name">Product Name</label>
                                <select class="form-control form-control" id="productname" name="">
                                </select>
                            </div> --}}

                            <div class="form-group col-sm">
                                <label for="suppliername">OR No. <span class="text-danger">*</span></label>
                                <input value="{{isset($data['or']) ? $data['or'] : '' }}" 
                                class="form-control form-control-sm" type="number" id="or" name="or" placeholder="Enter OR No.">
                            </div>

                            <div class="form-group col-sm">
                                <label for="suppliername">CR No. <span class="text-danger">*</span></label>
                                <input value="{{isset($data['cr']) ? $data['cr'] : '' }}" 
                                class="form-control form-control-sm" type="number" id="cr" name="cr"placeholder="Enter CR No.">
                            </div>
                            
                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="suppliername">PO No. <span class="text-danger">*</span></label>
                            <input value="{{isset($data['po_no']) ? $data['po_no'] : '' }}" 
                            class="form-control form-control-sm" type="number" id="po_no" name="po_no" placeholder="Enter PO No.">
                        </div>

                        <div class="form-group col-sm">
                            <label for="suppliername">Terms <span class="text-danger">*</span></label>
                            <input value="{{isset($data['terms']) ? $data['terms']: '' }}" 
                            class="form-control form-control-sm" type="number" id="terms" name="cr"placeholder="Enter Terms">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="suppliername">Fullname <span class="text-danger">*</span></label>
                            <input value="{{isset($data['fullname']) ? $data['fullname'] : '' }}" 
                            class="form-control form-control-sm" type="text" id="fullname" name="fullname" placeholder="Enter Fullname">
                        </div>

                        <div class="form-group col-sm">
                            <label for="suppliername">Contact No. <span class="text-danger">*</span></label>
                            <input value="{{isset($data['contact_num']) ? $data['contact_num'] : '' }}" 
                            class="form-control form-control-sm" type="number" id="contact_num" name="contact_num"placeholder="Enter Contact No.">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="suppliername">Delivered To. <span class="text-danger">*</span></label>
                            <input value="{{isset($data['deliveredto']) ? $data['deliveredto']: '' }}" 
                            class="form-control form-control-sm" type="text" id="deliveredto" name="deliveredto" placeholder="Enter Delivered To.">
                        </div>

                        <div class="form-group col-sm">
                            <label for="suppliername">Delivered Date <span class="text-danger">*</span></label>
                            <input value="{{isset($data['delivered_date']) ? $data['delivered_date'] : '' }}" 
                            class="form-control form-control-sm" type="date" id="delivered_date" name="delivered_date">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="suppliername">Address <span class="text-danger">*</span></label>
                            <input value="{{isset($data['address']) ? $data['address'] : '' }}" 
                            class="form-control form-control-sm" type="text" id="address" name="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group col-sm">
                            <label for="suppliername">Delivered By <span class="text-danger">*</span></label>
                            <input value="{{isset($data['deliveredby']) ?$data['deliveredby']: '' }}" 
                            class="form-control form-control-sm" type="text" id="deliveredby" name="deliveredby" placeholder="Enter Delivered By">
                        </div>

                    </div>

                    <div class="row">
       

                        <div class="form-group col-sm">
                            <label for="suppliername">Collected By <span class="text-danger">*</span></label>
                            <input value="{{isset($data['collected_by']) ? $data['collected_by'] : '' }}" 
                            class="form-control form-control-sm" type="text" id="collected_by" name="collected_by" placeholder="Enter Collected By">
                        </div>

                        <div class="form-group col-sm {{!empty($data['payment_status']) ? $data['payment_status'] : 'd-none'}}">
                            <label for="payment_status">Payment Status <span class="text-danger">*</span></label>
                            <input value=" {{!empty($data['payment_status']) ? $data['payment_status'] : 'Unpaid'}}" 
                            class="form-control form-control-sm " type="text" id="payment_status" name="payment_status"  readonly>
                        </div>
                    </div>



                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="suppliername">Email (<span class="text-muted">Optional</span>)</label>
                            <input value="{{isset($data['email']) ? $data['email'] : '' }}" 
                            class="form-control form-control-sm" type="text" id="email" name="email" placeholder="Enter Collected By">
                        </div>

                    </div>




                    {{-- start data table --}}
                    <div class="col-12" >
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 col-12">
                                    
                                    <h4 class="card-title mb-0">Order(s) Checkout</h4>
                                    <div id="showfreebies">
                                        <button id="btnfree" class="btn btn-success text-white d-none">Add Freebie(s)</button>
                                        {{-- <button id="btnview" class="btn btn-secondary text-white">view</button> --}}
                                    </div>
                                   
                                </div>
                                <div class="table-responsive">
                                    <table id="orders" style="text-align:center; width:100%; border-collapse:collapse;">
                                        <thead>
                                            <tr>
                                                <th></th> <!-- This is for the row number -->
                                                <th style="text-align: center;">Product Name</th>
                                                <th style="text-align: center;">Brand</th>
                                                <th style="text-align: center;">Mg</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th style="text-align: center;">Total Amount</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated here -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6.5" style="text-align: center;"> <!-- Adjust colspan to match the number of columns -->
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
                                    <i class="fa fa-fw fa-money pr-4 text-white"></i>Total amount</button>
                                <button type="button" class="btn btn-danger btn-md" id="totalAmount">0.00</button>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- Buttons -->
                    <div class="form-group mt-4 d-flex justify-content-end">
                        @foreach ($data['button'] as $item)
                            <button data-id="{{isset($data['data']['id']) ? $data['data']['id'] : ''}}"  id="{{$item['id']}}" type="button" class="{{$item['class']}}" id="{{$item['id']}}">{{$item['text']}}</button>
                        @endforeach
                    </div>
                    

                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@include('tools.order.order-modal')
@include('tools.order.freebies-modal')
@endsection
@section('script')
<script src="../apps/order/order-details.js"></script>



<script src="../apps/order/order-freebies.js"></script>
@endsection