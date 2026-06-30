@extends('admin.layout.master')

@section('page-title', 'Change Password')

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">@yield('page-title')</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Change Password</h4>

                        </div><!-- end card header -->
                        <div class="card-body">
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form id="changePassForm" name="changePassForm" method="POST"
                                action="{{ route('admin.update.password') }}">
                                @csrf
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control mb-3">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control mb-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control mb-3">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>

            </div>
        </div>
    @endsection
