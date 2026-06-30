@extends('admin.layout.master')
@section('page-title', 'Add Unit')




@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Unit </h4> <br><br>

                            <form id="addUnitForm" name="addUnitForm" method="post" action="{{ route('unit.store') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Unit Name</label>
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

                                <button type="submit" class="btn btn-info waves-effect waves-light">Add Unit</button>
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


            $('#addUnitForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Unit Name',
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
