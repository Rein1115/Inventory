@extends('layouts.homeapp')

@section('content')
    <div class="col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-7">
                    <h3 class="mb-4">Add Inventory:</h3>
                </div>
            </div>
            
            <div class="card-body">


                <form id="InsertOrder" class="mt-3 text-center" method="post">
                    @csrf
                    @if (!empty($response))
                        @method('PUT')
                    @endif
                    <input type="hidden" id="data" name="product_id"
                    value= "@foreach ($productlist as $item){{ $item->product_id ? $item->product_id : '' }} @endforeach">
                    <div class="form-card text-start">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Name: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($productlist) ? $productlist[0]->product_name : '' }}"
                                        class="form-control" id="pname"  placeholder="Product Name" data-price="{{ !empty($productlist) ? $productlist[0]->price : '' }}" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Doctor Name: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->doctor_name : '' }}"
                                        class="form-control" id="deli" name="doctor_name" placeholder="Doctor Name" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Deliveredto: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->deliveredto : '' }}"
                                        class="form-control" id="deli" name="deliveredto" placeholder="Deliveredto" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Contact Number: <span class="text-danger">*</span></label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->contactnum : '' }}"
                                        class="form-control" id="deli" name="contact_num" placeholder="Contact Number" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">O.R#: <span class="text-danger">*</span></label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->OR : '' }}"
                                        class="form-control" id="deli" name="or" placeholder="O.R#" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">C.R#: <span class="text-danger">*</span></label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->OR : '' }}"
                                        class="form-control" id="deli" name="cr" placeholder="C.R#" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Collected By: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->collby : '' }}"
                                        class="form-control" id="deli" name="collected_by" placeholder="Collected By" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->address : '' }}"
                                        class="form-control" id="add" name="address" placeholder="Address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Date: <span class="text-danger">*</span></label>
                                    <input type="date" value="{{ !empty($response) ? $response[0]->date : '' }}"
                                        class="form-control" name="date" placeholder="Date" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Quantity: <span class="text-danger">*</span><span class="text-danger">{{ !empty($productlist) ? $productlist[0]->quantity : '' }} available product(s)</span></label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->quantity : '' }}"
                                        class="form-control" id="quan" name="quantity" placeholder="Quantity"  data-quan="{{ !empty($productlist) ? $productlist[0]->quantity : '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Terms: <span class="text-danger">*</span></label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->terms : '' }}"
                                        class="form-control" name="terms" placeholder="Terms" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">P.O#: <span class="text-danger">*</span></label>
                                    <input type="number" value="{{ !empty($response) ? $response[0]->po : '' }}"
                                        class="form-control" id="po" name="po" placeholder="P.O#">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">deliveredby: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->terms : '' }}"
                                        class="form-control" name="deliveredby" placeholder="Deliveredby" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status Paid: <span class="text-danger">*</span></label>
                                        <div>
                                            <select class="form-control" name="u/p" id="">
                                                <option value="0">Unpaid</option>
                                                <option value="1">Paid</option>
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Total Amount: <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ !empty($response) ? $response[0]->totalamount : '' }}"
                                        class="form-control" id="total-amount" name="totalamount" placeholder="Total Amount" readonly />
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ !empty($response) ? 'Update' : 'Submit' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @vite(['resources/js/order/orderdetails.js'])

@endsection
