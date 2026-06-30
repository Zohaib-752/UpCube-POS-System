@extends('admin.layout.master')
@section('page-title', 'Edit Customer')



@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Customer </h4> <br><br>

                            <form id="editCustomerForm" name="editCustomerForm" method="POST"
                                action="{{ route('customer.update', $customer->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="form-group col-sm-10">
                                        <input id="name" name="name" class="form-control" type="text"
                                            value="{{ $customer->name }}">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Customer Email</label>
                                    <div class="form-group col-sm-10">
                                        <input id="email" name="email" class="form-control" type="email"
                                            value="{{ $customer->email }}">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-2 col-form-label">Customer Mobile</label>
                                    <div class="form-group col-sm-10">
                                        <input id="mobile_no" name="mobile_no" class="form-control" type="tel"
                                            value="{{ $customer->mobile_no }}">
                                        <span class="text-danger">
                                            @error('mobile_no')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Customer Address</label>
                                    <div class="form-group col-sm-10">
                                        <input id="address" name="address" class="form-control" type="text"
                                            value="{{ $customer->address }}">
                                        <span class="text-danger">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="customer_img" class="col-sm-2 col-form-label">Customer Image</label>
                                    <div class="form-group col-sm-10">
                                        <input id="customer_img" name="customer_img" class="form-control" type="file"
                                            value="{{ $customer->customer_img }}">
                                        <small class="text-muted">Only .jpg, .jpeg, .png are allowed</small>
                                        <span class="text-danger">
                                            @error('customer_img')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="showCustomerImg" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img src="{{ $customer->customer_img ? asset('uploads/customer_image/' . $customer->customer_img) : asset('uploads/no_avatar.png') }}"
                                            id="showCustomerImg" alt="customer image" class="rounded-circle avatar-lg">

                                    </div>
                                </div>
                                <!-- end row -->
                                <button type="submit" class="btn btn-info waves-effect waves-light">Update
                                    Customer</button>
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

            // Image preview
            $('#customer_img').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showCustomerImg').attr('src', e.target.result);
                };
                if (e.target.files && e.target.files[0]) {
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Validation
            $('#editCustomerForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                        validMobile: true,
                    },
                    address: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Customer Name',
                    },
                    email: {
                        required: 'Please Enter Customer Email',
                    },
                    mobile_no: {
                        required: 'Please Enter Customer Mobile',
                        validMobile: 'Please enter a valid mobile number (10-14 digits)',
                    },
                    address: {
                        required: 'Please Enter Customer Address',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
