@extends('admin.layout.master')
@section('page-title', 'Edit Suppliers')




@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Supplier </h4> <br><br>

                            <form id="editSupplierForm" name="editSupplierForm" method="POST"
                                action="{{ route('supplier.update', $supplier->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="form-group col-sm-10">
                                        <input id="name" name="name" class="form-control" type="text"
                                            value="{{ $supplier->name }}">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Supplier Email</label>
                                    <div class="form-group col-sm-10">
                                        <input id="email" name="email" class="form-control" type="email"
                                            value="{{ $supplier->email }}">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-2 col-form-label">Supplier Mobile</label>
                                    <div class="form-group col-sm-10">
                                        <input id="mobile_no" name="mobile_no" class="form-control" type="tel"
                                            value="{{ $supplier->mobile_no }}">
                                        <span class="text-danger">
                                            @error('mobile_no')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="form-group col-sm-10">
                                        <input id="address" name="address" class="form-control" type="text"
                                            value="{{ $supplier->address }}">
                                        <span class="text-danger">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->
                                <button type="submit" class="btn btn-info waves-effect waves-light">Update
                                    Supplier</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>


@section('code-scripts')
    <script type="text/javascript">
        $(document).ready(function() {


            $('#editSupplierForm').validate({
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
                        required: 'Please Enter Supplier Name',
                    },
                    email: {
                        required: 'Please Enter Supplier Email',
                    },
                    mobile_no: {
                        required: 'Please Enter Supplier Mobile',
                        validMobile: 'Please enter a valid mobile number (10-14 digits)',
                    },
                    address: {
                        required: 'Please Enter Supplier Address',
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




@endsection
