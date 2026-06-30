@extends('admin.layout.master')

@section('page-title', 'Admin Profile')

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
                            <h4 class="card-title mb-0">User Profile</h4>
                            <a href="{{ route('admin.edit.profile') }}" class="btn btn-primary btn-sm">Edit</a>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div>
                                    <img src="{{ Auth::user()->user_img ? asset('uploads/admin_images/' . Auth::user()->user_img) : asset('uploads/no_avatar.png') }}"
                                        alt="{{ Auth::user()->name }}" class="rounded-circle avatar-lg">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Username</th>
                                            <td>{{ Auth::user()->username }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Joining Date</th>
                                            <td>{{ Auth::user()->created_at->format('d M, Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Security Settings</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tr>
                                        <th>Change Password</th>
                                        <td><a href="{{ route('admin.change.password') }}"
                                                class="btn btn-primary btn-sm">Change</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>

            </div>
        </div>
    @endsection
