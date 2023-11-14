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
                value= "@foreach ($productlist as $item){{ $item->product_id ? $item->product_id : '' }} @endforeach">
            <div class="card-body">


                <form action = "{{route('Orders.store')}}" class="mt-3 text-center" method="post">
                    @csrf
                    @if (!empty($response))
                        @method('PUT')
                    @endif

                    <div class="form-card text-start">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Name: *</label>
                                    <input type="text" value="{{ !empty($productlist) ? $productlist[0]->product_name : '' }}"
                                        class="form-control" id="pname" name="productname" placeholder="Product Name" data-price="{{ !empty($productlist) ? $productlist[0]->price : '' }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Deliveredto: *</label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->deliveredto : '' }}"
                                        class="form-control" id="deli" name="deliveredto" placeholder="Deliveredto" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address: *</label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->address : '' }}"
                                        class="form-control" id="add" name="address" placeholder="Address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Date: *</label>
                                    <input type="date" value="{{ !empty($response) ? $response[0]->date : '' }}"
                                        class="form-control" name="date" placeholder="Date" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Quantity: *</label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->quantity : '' }}"
                                        class="form-control" id="quan" name="quantity" placeholder="Quantity">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Terms: *</label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->terms : '' }}"
                                        class="form-control" name="terms" placeholder="Terms" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">P.O#: *</label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->po : '' }}"
                                        class="form-control" id="po" name="po" placeholder="P.O#">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">deliveredby: *</label>
                                    <input type="date" value="{{ !empty($response) ? $response[0]->terms : '' }}"
                                        class="form-control" name="deliveredby" placeholder="Deliveredby" />
                                </div>
                            </div>

                            @if(!empty($response))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Total Amount: *</label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->totalamount : '' }}"
                                        class="form-control" name="totalamount" placeholder="Total Amount" readonly />
                                </div>
                            </div>
                            @else
                            @endif
                            
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ !empty($response) ? 'Update' : 'Submit' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @vite(['resources/js/product/product-details.js'])
@endsection
