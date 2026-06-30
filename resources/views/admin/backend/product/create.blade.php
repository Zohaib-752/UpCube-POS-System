@extends('admin.layout.master')
@section('page-title', 'Add Product')




@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Product </h4> <br><br>

                            <form id="addProductForm" name="addProductForm" method="post"
                                action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="form-group col-sm-10">
                                        <input id="name" name="name" class="form-control" type="text">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="supplier_id" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-select"
                                            aria-label="Default select example">
                                            <option value="" selected disabled>Select Supplier</option>
                                            @forelse ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                </option>
                                            @empty
                                                <option value="">No Supplier Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="category_id" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id" class="form-select"
                                            aria-label="Default select example">
                                            <option value="" selected disabled>Select Category</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                                <option value="">No Category Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="unit_id" class="col-sm-2 col-form-label">Unit</label>
                                    <div class="col-sm-10">
                                        <select name="unit_id" id="unit_id" class="form-select"
                                            aria-label="Default select example">
                                            <option value="" selected disabled>Select Unit</option>
                                            @forelse ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @empty
                                                <option value="">No Unit Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <button type="submit" class="btn btn-info waves-effect waves-light">Add Product</button>
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


            $('#addProductForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    supplier_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Product Name',
                    },
                    supplier_id: {
                        required: 'Please Select Supplier Name',
                    },
                    category_id: {
                        required: 'Please Select Category Name',
                    },
                    unit_id: {
                        required: 'Please Select Unit',
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
