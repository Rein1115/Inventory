@extends('layouts.apps')

@section('title') Home @endsection

@section('link')
  <!-- Pignose Calender -->
  <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
  <!-- Chartist -->
  <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
  <!-- Custom Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <a href="" class="text-white">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Sales</h3>
                        <div class="">{{-- <div class="d-inline-block"> --}}
                            <h2 class="text-white">₱ <span id="totalsales">{{isset($data['totalsales'][0]->totalsales) ? $data['totalsales'][0]->totalsales : '0.00'}}</span></h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
             </a>
        </div>
        
            <div class="col-lg-3 col-sm-3">
                <a href="" class="text-white">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Income Today</h3>
                            <div class="">
                                <h2 class="text-white">₱ <span id="incometoday">{{isset($data['incometoday'][0]->total_payment) ? $data['incometoday'][0]->total_payment : '0.00'}}</span></h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </a>
            </div>
 
       
        
        @if(Auth::user()->role === 'Admin')
        <div class="col-lg-3 col-sm-3">
            <a href="" class="text-white">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Net Profit</h3>
                        <div class="">
                            <h2 class="text-white">₱ <span id="netprofit"> {{isset($data['finalnetprofit']) ? ROUND($data['finalnetprofit']) : '0.00'}} </span></h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-sm-3">
            <a href="" class="text-white">
                <div class="card gradient-3 h-55">
                    <div class="card-body ">
                        <h3 class="card-title text-white">Total Cost</h3>
                        <div class="">
                            {{-- <div class="d-inline-block"> --}}
                            <h2 class="text-white">₱ <span id="totalcost"> {{isset($data['totalcost'][0]->total_cost) ? ROUND($data['totalcost'][0]->total_cost): '0.00'}} </span></h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-3">
            <a href="" class="text-white">
                <div class="card gradient-3 h-55">
                    <div class="card-body ">
                        <h3 class="card-title text-white">Total Expenses</h3>
                        <div class=""> {{--<div class="d-inline-block">--}}
                            <h2 class="text-white">₱ <span id="totalexpenses"> {{isset($data['expenses'][0]->amount) ? $data['expenses'][0]->amount: '0.00'}} </span></h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </a>
        </div>
        @endif

       

    </div>

    <div class="row">
        <!-- Column for Monthly Sales Bar Chart -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body pb-0" style="padding-bottom: 0;">
                    <h4 class="mb-1">Monthly Sales</h4>
                    <p class="text-muted">Overview of sales for the current month</p>
                </div>
                <div class="chart-wrapper mb-4" style="height: 300px;">
                    <canvas id="chart_widget_2" style="height: 100%;"></canvas>
                </div>
            </div>
        </div>
    
        <!-- Column for Revenue Source Donut Chart -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body pb-0" style="padding-bottom: 0;">
                    <h4 class="mb-1">Product Sales</h4>
                    <p class="text-muted">Breakdown of sales by product category</p>
                </div>
                <div class="chart-wrapper mb-4" style="height: 300px;">
                    <canvas id="chart_widget_donut" style="height: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     {{-- OLD --}}
   {{-- <script src="../apps/dashboard/dashboard.js"></script> --}}

   {{-- NEW --}}
   @vite(['resources/js/apps/dashboard/dashboard.js']) 




@endsection