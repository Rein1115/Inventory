@extends('layouts.apps')

@section('title') Home @endsection
@section('link')
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
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
                        <div class="d-inline-block">
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
                            <div class="d-inline-block">
                                <h2 class="text-white">₱ <span id="incometoday">{{isset($data['incometoday'][0]->total_payment) ? $data['incometoday'][0]->total_payment : '0.00'}}</span></h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </a>
            </div>
 
        <div class="col-lg-3 col-sm-3">
            <a href="" class="text-white">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Net Profit</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">₱ <span id="netprofit"> {{isset($data['netprofit'][0]->net_profit) ? $data['netprofit'][0]->net_profit : '0.00'}} </span></h2>
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
                        <div class="d-inline-block">
                            <h2 class="text-white">₱ <span id="totalcost"> {{isset($data['totalcost'][0]->total_cost) ? $data['totalcost'][0]->total_cost: '0.00'}} </span></h2>
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
                        <div class="d-inline-block">
                            <h2 class="text-white">₱ <span id="totalcost"> {{isset($data['totalcost'][0]->total_cost) ? $data['totalcost'][0]->total_cost: '0.00'}} </span></h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </a>
        </div>

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
    
    

    

    {{-- <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Summary</h4>
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
                
            </div>    
            <div class="col-lg-3 col-md-6">
                <div class="card card-widget">
                    <div class="card-body">
                        <h5 class="text-muted">Order Overview </h5>
                        <h2 class="mt-4">5680</h2>
                        <span>Total Revenue</span>
                        <div class="mt-4">
                            <h4>30</h4>
                            <h6>Online Order <span class="pull-right">30%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span class="sr-only">30% Order</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>50</h4>
                            <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span class="sr-only">50% Order</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>20</h4>
                            <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-0">
                        <h4 class="card-title px-4 mb-3">Todo</h4>
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">
                                    <ul id="todo_list">
                                        <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                        <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                        <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                        <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                    </ul>
                                </div>
                                <div class="px-4">
                                    <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/8.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">Ana Liem</h5>
                        <p class="m-0">Senior Manager</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/5.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">John Abraham</h5>
                        <p class="m-0">Store Manager</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/7.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">John Doe</h5>
                        <p class="m-0">Sales Man</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/1.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">Mehedi Titas</h5>
                        <p class="m-0">Online Marketer</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   
   <script src="../apps/dashboard/dashboard.js"></script>




@endsection