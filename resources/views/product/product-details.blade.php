@extends('layouts.apps')

@section('content')
<div class="row">
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}

<div class="row page-titles mx-0 ml-3">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{isset($data['data']['id']) ? 'Update Product' : 'Create Product'}}</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid" id="id" data-id="{{isset($data['data'][0]->id) ? $data['data'][0]->id : ''}}">
    <div class="col-lg-8">
        <div class="card col-sm">
            <div class="card-body">
                {{-- <h1 class="card-title mb-5">{{isset($data['data']['id']) ? 'Update Product' : 'Create Product'}}</h1> --}}
                <div class="basic-form">
                    <div class="row">
                            <!-- Product Name -->
                            <div class="form-group col-sm">
                                <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                <input value="{{isset($data['data'][0]->product_name) ? $data['data'][0]->product_name : ''}}" class="form-control form-control-sm" type="text" id="product_name" name="product_name" placeholder="Enter product name" {{isset($data['readonly']) ? $data['readonly']: ''}} >
                            </div>

                            <!-- Supplier ID -->
                            <div class="form-group col-sm">
                                <label for="suppliername">Supplier Name <span class="text-danger">*</span></label>
                                <select class="form-control" id="suppliername" name="suppliername" {{ isset($data['readonly']) && $data['readonly'] ? 'disabled' : '' }}>
                                    <option value="{{ isset($data['data'][0]->supplier_name) ? $data['data'][0]->supplier_name : '' }}">
                                        {{ isset($data['data'][0]->supplier_name) ? $data['data'][0]->supplier_name : '' }}
                                    </option>
                                </select>
                            </div>
                    </div>

                    <div class="row">
                        <!-- brand Name -->
                        <div class="form-group col-sm">
                            <label for="brandname">Brand Name <span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm" id="brandname" name="brandname"  {{ isset($data['readonly']) && $data['readonly'] ? 'disabled' : '' }}>
                                <option value="{{isset($data['data'][0]->brand_name) ? $data['data'][0]->brand_name : ''}}">{{isset($data['data'][0]->brand_name) ? $data['data'][0]->brand_name: ''}}</option>
                            </select>
                        </div>

                        <!-- expiration_date -->
                        <div class="form-group col-sm">
                            <label for="expiration_date">Expiration Date <span class="text-danger">*</span></label>
                            <input value="{{ isset($data['data'][0]->expiration_date) ? \Carbon\Carbon::parse($data['data'][0]->expiration_date)->format('Y-m-d') : '' }}" 
                            class="form-control form-control-sm" type="date" id="expiration_date" name="expiration_date"  {{ isset($data['readonly']) && $data['readonly'] ? 'disabled' : '' }}>
                        </div>
                    </div>

                    <div class="row">
                        <!-- original Price -->
                        <div class="form-group col-sm">
                            <label for="originalp">Original Price <span class="text-danger">*</span></label>
                            <input value="{{isset($data['data'][0]->original_price) ? $data['data'][0]->original_price : ''}}" class="form-control form-control-sm" type="number" id="originalp" name="originalp" placeholder="Enter Original Price"  {{ isset($data['readonly']) && $data['readonly'] ? 'disabled' : '' }}>
                        </div>

                        <!-- selling price -->
                        <div class="form-group col-sm">
                            <label for="sellingp">Selling Price <span class="text-danger">*</span></label>
                            <input value="{{isset($data['data'][0]->selling_price) ? $data['data'][0]->selling_price : ''}}" class="form-control form-control-sm" type="number" id="sellingp" name="sellingp " placeholder="Enter Selling Price"  {{ isset($data['readonly']) && $data['readonly'] ? 'disabled' : '' }}>
                        </div>
                    </div>

                    <div class="row">
                        <!-- quantity -->
                        <div class="form-group col-sm">
                            <label for="originalp">Product Quantity <span class="text-danger">*</span></label>
                            <input value="{{isset($data['data'][0]->quantity) ? $data['data'][0]->quantity : ''}}" class="form-control form-control-sm" type="number" id="quantity" name="quantity" placeholder="Enter quantity">
                        </div>

                        <!-- mg -->
                        <div class="form-group col-sm">
                            <label for="sellingp">Mg <span class="text-danger">*</span></label>
                            <input value="{{isset($data['data'][0]->mg) ? $data['data'][0]->mg : ''}}" class="form-control form-control-sm" type="number" step="0.01" id="mg" name="mg" placeholder="Enter MG"  {{ isset($data['readonly']) && $data['readonly'] ? 'disabled' : '' }}>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" id="status" name="status">
                            @if(empty($data['data'][0]->status))
                                <option value="" selected>Select Status</option>
                            @endif
                            <option value="Available" {{ (isset($data['data'][0]->status) && $data['data'][0]->status === 'Available') ? 'selected' : '' }}>Available</option>
                            <option value="Pending" {{ (isset($data['data'][0]->status) && $data['data'][0]->status === 'Pending') ? 'selected' : '' }}>Pending</option>
                        </select>
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
{{-- @include('tools.supplier.supplier-modal') --}}
@endsection
@section('script')
<script src="../apps/product/product-details.js"></script>
@endsection