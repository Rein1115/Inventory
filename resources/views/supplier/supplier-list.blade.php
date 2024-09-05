@extends('layouts.apps')

@section('content')
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="container-fluid">
    <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Supplier(s) List</h4>
                            <div class="table-responsive">
                                <table id= "supplier"  style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">Supplier(s) Name</th>
                                            <th style="text-align: center;">Company</th>
                                            <th style="text-align: center;">Gender</th>
                                            <th style="text-align: center;">Contact No.</th>
                                            <th style="text-align: center;">Address</th>
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
@include('tools.supplier.supplier-modal')
@endsection
@section('script')
<script src="../apps/supplier/supplier-list.js"></script>
@endsection