@extends('layouts.homeapp')

@section('content')
    <div class="col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-7">
                    <h3 class="mb-4">Add Inventory:</h3>
                </div>
            </div>
            <input type="hidden" id="data"
                value= "@foreach ($response as $item){{ $item->product_id ? $item->product_id : '' }} @endforeach">
            <div class="card-body">


                <form id="{{ !empty($response) ? 'UpdateProd' : 'InsertProd' }}" class="mt-3 text-center" method="post">
                    @csrf
                    @if (!empty($response))
                        @method('PUT')
                    @endif

                    <div class="form-card text-start">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Name: *</label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->product_name : '' }}"
                                        class="form-control" id="pname" name="productname" placeholder="Product Name" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Quantity: *</label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->quantity : '' }}"
                                        class="form-control" id="quan" name="quantity" placeholder="Quantity" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Price: *</label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->price : '' }}"
                                        class="form-control" id="pric" name="price" placeholder="Price" step="0.01">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Expiry Date: *</label>
                                    <input type="date" value="{{ !empty($response) ? $response[0]->expiration : '' }}"
                                        class="form-control" name="expiration" placeholder="Expiry Date" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ !empty($response) ? 'Update' : 'Submit' }}
                    </button>
                </form>

                {{-- <form id="{{ !empty($response) ? 'UpdateProd' : 'InsertProd' }}" class="mt-3 text-center" method="post">
                @csrf
                @empty($response) 

                @else
                    @method('PUT')
                @endif

                <div class="form-card text-start">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Name: *</label>
                                <input type="text" value="@foreach ($response as $item){{ $item->product_name ? $item->product_name : '' }}@endforeach" class="form-control" id="pname" name="productname" placeholder="Product Name"/>

                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Quantity: *</label>
                                <input type="number" value="@foreach ($response as $item){{ $item->quantity? $item->quantity : '' }}@endforeach" class="form-control" id="quan" name="quantity" placeholder="Quantity" />
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Price: *</label>
                                <input type="number" value="@foreach ($response as $item){{ $item->price ? $item->price: '' }}@endforeach" class="form-control" id="pric" name="price" placeholder="Price">
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Expiry Date: *</label>
                                <input type="date" value="@foreach ($response as $item){{ $item->expiration ? $item->expiration: '' }}@endforeach" class="form-control" name="expiration" placeholder="Expiry Date" />
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"class="btn btn-primary">
                   {{!empty($response) ? 'Update' : 'Submit'}}
                </button>

            </form> --}}



            </div>
        </div>
    </div>
    @vite(['resources/js/product/product-details.js'])
@endsection
