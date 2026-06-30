@extends('admin.layout.master')
@section('page-title', 'Add Category')




@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Category </h4> <br><br>

                            <form id="addCategoryForm" name="addCategoryForm" method="post"
                                action="{{ route('category.store') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
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
                                <button type="submit" class="btn btn-info waves-effect waves-light">Add Category</button>
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


            $('#addCategoryForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Category Name',
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
