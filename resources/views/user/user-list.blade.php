@extends('layouts.apps')

@section('content')
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">User(s) List</h4>
                            <div class="table-responsive">
                                <table id= "user" class="table" style="text-align:center; width:100%; border-collapse:collapse;">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">Fullname</th>
                                            <th style="text-align: center;">Gender</th>
                                            <th style="text-align: center;">Role</th>
                                            <th style="text-align: center;">email</th>
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
@include('tools.user.user-modal')
@endsection
@section('script')
<script src="../apps/user/user-list.js"></script>
@endsection