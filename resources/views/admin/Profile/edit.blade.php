@extends('admin.layout.master')
@section('page-title', 'Edit Profile')

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile</h4>
                            <form name="updateProfile" id="updateProfile" method="POST"
                                action="{{ route('admin.update.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Artisanal kale"
                                            id="name" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Artisanal kale"
                                            id="username" name="username" value="{{ Auth::user()->username }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="bootstrap@example.com"
                                            id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="user_img" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="user_img" name="user_img">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img src="{{ Auth::user()->user_img ? asset('uploads/admin_images/' . Auth::user()->user_img) : asset('uploads/no_avatar.png') }}"
                                            id="showImage" alt="avatar-5" class="rounded-circle avatar-lg">
                                    </div>
                                </div>
                                <!-- end row -->

                                <button type="submit" class="btn btn-info btn-lg mt-5">Update Profile</button>
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>

    </div>
@endsection

@section('code-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            const imageInput = $('#user_img');
            const showImage = $('#showImage');
            if (imageInput && showImage) {
                imageInput.on('change', function(e) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        showImage.attr('src', e.target.result);
                    }
                    if (e.target.files && e.target.files[0]) {
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }
        });
    </script>
@endsection
