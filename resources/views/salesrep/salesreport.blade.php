@extends('layouts.homeapp')



@section('content')
<div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
       </div>
       <div class="card-body">
          <div class="table-responsive">
             <table id="datatable" class="table table-striped text-center" data-toggle="data-table">
                <thead >
                   <tr>
                      <th class="text-center">Month(s)</th>
                      <th class="text-center">Year</th>
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($response as $item)
                    <tr>
                        <td>{{$item->month}}</td>
                        <td>{{$item->year}}</td>
                        <td>
                            <a href="{{route('displaySyear',$item->month)}}" class="btn btn-primary" >View Summary</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
             </table>
          </div>
       </div>
    </div>
 </div>
@vite(['resources/js/salesrep/salesrep.js'])
@endsection