<div class="page-content container d-none" id="parentprintheaders">
    <div class="page-header text-blue-d2 mb-4">
        <div class="row align-items-center">
            <!-- Logo Section (Left) -->
                <div class="col-2 text-left" style="width: 100px; height: auto; margin-left: 50px;">
                    <img src="../logonibay.png" alt="Logo" style="width: 130px; height: auto; margin-left: 50px;"> <!-- Adjust size as needed -->
                </div>
            <!-- Title and Details Section (Centered) -->
            <div class="col-8 text-center">
                <h1 class="page-title text-secondary-d1">
                    <span class="text-primary-d1">EAGLESMED PET SUPPLIES AND ACCESSORIES TRADING</span>
                </h1>
                <p class="text-secondary-d2 mb-1">
                    Sun-ok Ibabao 6017 Cordova Cebu Philippines
                </p>
                <p class="text-secondary-d2 mb-1">
                    NON-VAT REG. TIN: 292-810-773-00000
                </p>
                <p class="text-secondary-d2">
                    Prop: Margie Cambongga Dinoy
                </p>
            </div>

            <!-- Empty Space for Layout (Right) -->
            <div class="col-2"></div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                {{-- <div class="row mb-4">
                    <div class="col-12 text-center">
                        <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                        <span class="text-default-d3">Bootdey.com</span>
                    </div>
                </div> --}}

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <!-- Left-aligned content -->
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Delivered To :</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printdeliveredto"></span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Address:</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printaddress"></span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">OR no.</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printor"></span>
                        </div>
                    </div>
                
                    <!-- Right-aligned content -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="text-grey-m2">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Date Delivered:</span>
                                <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printdatedelivered"></span>
                            </div>
                            
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Terms:</span>
                                <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printterms"></span>
                            </div>
                            
                            
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">PO no.</span>
                                <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printpo"></span>
                            </div>
                           
                            
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Payment Status:</span>
                                <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printstatus"></span>
                            </div>
     
                        </div>
                    </div>
                </div>
                
                <!-- Convert the list of items into a table -->
                <div class="mt-4">
                    <table id="printtable" class="table table-bordered">
                        <thead>
                            <tr class="bgc-default-tp1 text-black">
                                <th>#</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @php
                                $count = 1;   
                            @endphp
                        
                                @foreach($data['productlist'] AS $productlist)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$productlist->product_name}}</td>
                                    <td>{{$productlist->brand_name}}</td>
                                    <td>{{$productlist->unit}}</td>
                                    <td>{{$productlist->quantity}}</td>
                                    <td>₱{{number_format($productlist->selling_price,2)}}</td>
                                    <td >₱{{number_format($productlist->total_amount, 2)}}</td>
                                </tr>
                                @endforeach 

                                @if(!empty($data['freebieslist']))
                               
                                    @foreach($data['freebieslist'] AS $free)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$free->product_name}}</td>
                                        <td>{{$free->brand_name}}</td>
                                        <td>{{$free->unit}}</td>
                                        <td>{{$free->quantity}}</td>
                                        <td>₱{{number_format($free->selling_price,2)}}</td>
                                        <td ><b>FREE</b></td>
                                    </tr>
                                    @endforeach

                                @else
                               
                                @endif
                        </tbody>
                    </table>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <div class="row mt-4">
                        <div class="col-sm-7 text-grey-d2">
                            {{-- <p>Extra notes, company or payment details can be added here...</p> --}}
                        </div>
                        <div class="col-sm-5 text-right text-grey">
                            {{-- <div class="row mb-2 bg-primary-l3 py-2">
                                <div class="col-7">Total Amount</div>
                                <div class="col-5" id="printtotalamount">0.00</div>
                            </div> --}}
                            <div class="row mb-2">
                                <div class="col-7" id="supportorderandpayment">Exact Amount</div>
                                <div class="col-5" id="printexactamount">$0.00</div>
                            </div>
                            <div class="row mb-2" id="remainbalance_parent">
                                <div class="col-7">Remaining Balance</div>
                                <div class="col-5" id="printremainingbalance">0.00</div>
                            </div>
                            
                             <div class="row mb-2" id="">
                                <div class="col-7">Discount: </div>
                            </div>
                                 
                             <div class="row mb-2" id="">
                                <div class="col-7">Total: </div>
                            </div>

                        </div>
                    </div>
                    
                   <div class="row mt-5">
                       
      
                       
                        <div class="col-4 text-center">
                            <!-- Top label above "Prepared by" -->
                            <span class="text-600 text-black" style="border-top: 1px solid black; padding-top: 5px; display: inline-block; width: 200px;"></span>
                            <br>
                            <span class="text-secondary-d1 text-105">Prepared by:</span>
                            
                        </div>
                        
                        <div class="col-4 text-center">
                            <!-- Top label above "Prepared by" -->
                            <span class="text-600 text-black" style="border-top: 1px solid black; padding-top: 5px; display: inline-block; width: 200px;"></span>
                            <br>
                            <span class="text-secondary-d1 text-105">Checked by:</span>
                        
                        </div>
                        
                        
                        <div class="col-4 text-center">
                            <span class="text-600 text-black" style="border-top: 1px solid black; padding-top: 5px; display: inline-block; width: 200px;"></span>
                            <br>
                            <span class="text-secondary-d1 text-105">Received by:</span>
                            
                           
                        </div>
                    </div>
                    
                    
                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        {{-- <a href="#" class="btn btn-info btn-bold float-right">Pay Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

