@extends('layouts.apps')

@section('title') 
 Expense(s) List 
@endsection
@section('content')
<div class="row">

    <div class="row page-titles mx-0 ml-3">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Expenses</a></li>
            </ol>
        </div>
    </div>
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="container-fluid">
            <div class="row">
                <!-- Search Input -->
                <div class="input-group mb-3" style="width: 200px; margin-left: 15px;"> <!-- Add margin if needed -->
                    <input type="number" id="yearInput" class="form-control form-control-sm " 
                        placeholder="Year" min="2000" max="2100" value="{{ date('Y') }}" 
                        style="height: 20px;"> <!-- Transparent input field -->
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" id="searchButton" type="button" style="height: 36px;">
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Monthly Expenses</h4>
                            <div class="table-responsive">
                                <table id= "expenses" class="table" style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">Month</th>
                                            <th style="text-align: center;">Year</th>
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
@include('tools.expense.expenses-modal')
@endsection
@section('script')

{{-- OLD --}}
{{-- <script src="../apps/expense/expenses-list.js"></script> --}}


{{-- NEW --}}
@vite(['resources/js/apps/expense/expenses-list.js'])
@endsection