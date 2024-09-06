@extends('layouts.apps')

@section('content')
{{-- <div id="spinner" class="spinner" style="display: none;"></div> --}}
<div class="row page-titles mx-0 ml-3">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{isset($data['data']['id']) ? 'Update Product' : 'Create Product'}}</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid" id="id">
    <div class="col-lg-8">
        <div class="card col-sm">
            <div class="card-body">

                <div class="basic-form">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ isset($data[0]->email) ? $data[0]->email : '' }}" class="form-control form-control-sm" type="email" id="email" name="email" placeholder="Enter email">
                    </div>
                
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input value="{{ isset($data[0]->fname) ? $data[0]->fname : '' }}" class="form-control form-control-sm" type="text" id="fname" name="fname" placeholder="Enter first name">
                    </div>
                
                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input value="{{ isset($data[0]->lname) ? $data[0]->lname : '' }}" class="form-control form-control-sm" type="text" id="lname" name="lname" placeholder="Enter last name">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Current Password</label>
                        <input class="form-control form-control-sm" type="password" id="c-pass" name="password" placeholder="Enter current password">
                    </div>
                
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control form-control-sm" type="password" id="password" name="password" placeholder="Enter password">
                    </div>
                
                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="form-control form-control-sm" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" id="btn-update" class="btn btn-success">Update</button>
                    </div>
                </div>
             

                
            </div>
        </div>
    </div>
</div>

{{-- @include('tools.supplier.supplier-modal') --}}
@endsection
@section('script')
<script src="../apps/profile/profile-details.js"></script>
@endsection