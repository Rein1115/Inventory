@extends('layouts.apps')

@section('title') 
Annual Sales List
@endsection
@section('content')
<div class="row">

    <div class="row page-titles mx-0 ml-3">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Summary</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Annual Sales</a></li>
            </ol>
        </div>
    </div>
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Annual Sales</h4>
                            <div class="table-responsive">
                                <table id= "annualsales" class="table" style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
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
@include('tools.summary.summary-modal')
@endsection
@section('script')


{{-- OLD --}}
{{-- <script src="../apps/summary/summary-list.js"></script> --}}

{{-- NEW --}}
@vite(['resources/js/apps/summary/summary-list.js'])


@endsection