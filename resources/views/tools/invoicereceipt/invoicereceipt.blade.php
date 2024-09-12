<div class="page-content container d-none" id="parentprintheaders">
    <div class="page-header text-blue-d2 mb-4">
        <h1 class="page-title text-secondary-d1">
            <span class="text-primary-d1">[Shop Name]</span> <!-- Shop title here -->
        </h1>
    
        <p class="text-secondary-d2 mb-1">
            [Shop Address Line 1], [Shop Address Line 2] <!-- Shop address here -->
        </p>
        <p class="text-secondary-d2 mb-1">
            Contact: [Shop Contact Number] <!-- Shop contact number here -->
        </p>
        <p class="text-secondary-d2">
            Owner: [Owner's Last Name] <!-- Shop owner's last name here -->
        </p>
    
        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
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
                            <span class="text-sm text-grey-m2 align-middle">OR no.</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printor"></span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Delivered To :</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printdeliveredto"></span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Address:</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printaddress"></span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Date Delivered:</span>
                            <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printdatedelivered"></span>
                        </div>
                    </div>
                
                    <!-- Right-aligned content -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="text-grey-m2">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">PO no.</span>
                                <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printpo"></span>
                            </div>
                           
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Terms:</span>
                                <span class="text-600 text-110 text-black align-middle" style=" border-bottom: 1px solid black !important;" id="printterms"></span>
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
                                    <td>{{$productlist->quantity}}</td>
                                    <td>₱{{number_format($productlist->selling_price,2)}}</td>
                                    <td >₱
                                        {{number_format($productlist->total_amount, 2)}}</td>
                                </tr>
                                @endforeach

                       
                           
                        </tbody>
                    </table>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <div class="row mt-4">
                        <div class="col-sm-7 text-grey-d2">
                            <p>Extra notes, company or payment details can be added here...</p>
                        </div>
                        <div class="col-sm-5 text-right text-grey">
                            {{-- <div class="row mb-2 bg-primary-l3 py-2">
                                <div class="col-7">Total Amount</div>
                                <div class="col-5" id="printtotalamount">0.00</div>
                            </div> --}}
                            <div class="row mb-2">
                                <div class="col-7">Exact Amount</div>
                                <div class="col-5" id="printexactamount">$0.00</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-7">Remaining Balance</div>
                                <div class="col-5" id="printremainingbalance">0.00</div>
                            </div>

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

