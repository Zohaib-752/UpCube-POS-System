@extends('admin.layout.master')
@section('page-title', 'Add Suppliers')



@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Purchase </h4> <br><br>
                            <div class="row mb-4">
                                <div class="col-lg-4">
                                    <label for="date" class="col-form-label">Date</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="purchase_no" class="col-form-label">Purchase No</label>
                                    <input type="text" name="purchase_no" id="purchase_no" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="supplier_id" class="col-form-label">Supplier Name</label>
                                    <select name="supplier_id" id="supplier_id" class="form-select">
                                        <option value="" selected disabled>Select Supplier</option>
                                        @forelse ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @empty
                                            <option value="">No Supplier Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="date" class="col-form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="" selected disabled>First Select Supplier</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="product_id" class="col-form-label">Product</label>
                                    <select name="product_id" id="product_id" class="form-select">
                                        <option value="" selected disabled>First Select Supplier and Category
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-4 d-flex align-items-end mt-4 mt-lg-0 mt-md-0">
                                    <i class="btn btn-secondary rounded-pill waves-effect waves-light addEvent">
                                        Add
                                        <i class="mdi mdi-plus"></i>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Purchase Items</h4> <br><br>
                            <table class="table table-bordered" id="purchaseTable">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>PCS/KG</th>
                                        <th>Unit Price</th>
                                        <th>Description</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <form id="addPurchaseItemForm" name="addPurchaseItemForm" method="post"
                                    action="{{ route('purchase.store') }}">
                                    @csrf
                                    <tbody id="addRow" class="addRow">

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td> <input type="text" name="estimation_amount" id="estimation_amount"
                                                    class="form-control bg-lights" value="0" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                            <button type="submit" class="btn btn-info btn-lg waves-effect waves-light mt-4">Add
                                Purchase</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection




@section('code-scripts')

    <script id="document-template" type="text/x-handlebars-template">

            <tr class="delete_add_item" id="delete_add_item">
                <input type="hidden" name="date[]" value="@{{ date }}">
                <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
                <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">

                <td>
                    <input type="text" name="category_id[]" id="category_id" class="form-control bg-light text-right"
                        value="@{{ category_name }}">
                </td>
                <td>
                    <input type="text" name="product_id[]" id="product_id" class="form-control bg-light text-right"
                        value="@{{ product_name }}">
                </td>
                <td>
                    <input type="number" min="1" name="buying_qty[]" id="buying_qty"
                        class="form-control bg-light text-right " value="">
                </td>
                <td>
                    <input type="number" name="unit_price[]" id="unit_price" class="form-control bg-light text-right"
                        value="">
                </td>

                <td>
                    <input type="text" name="description[]" id="description" class="form-control bg-light text-right">
                </td>
                <td>
                    <input type="number" name="total_cost[]" id="total_cost" class="form-control bg-light text-right"
                        value="0" readonly>
                </td>
                <td>
                    <i class="btn btn-danger btn-sm fa fa-trash removeEvent"></i>
                </td>
            </tr>
    </script>


    <script type="text/javascript">
        $(document).ready(function() {


            $('#addPurchaseForm').validate({
                rules: {
                    date: {
                        required: true,
                    },
                    purchase_no: {
                        required: true,
                    },
                    supplier_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    product_id: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },

                },
                messages: {
                    date: {
                        required: 'Please Enter Date',
                    },
                    purchase_no: {
                        required: 'Please Enter Purchase Number',
                    },
                    supplier_id: {
                        required: 'Please Enter Supplier',
                    },
                    category_id: {
                        required: 'Please Enter Category',
                    },
                    product_id: {
                        required: 'Please Enter Product',
                    },
                    unit_id: {
                        required: 'Please Enter Unit',
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

    <script>
        $(document).ready(function() {
            $(document).on('change', '#supplier_id', function() {
                let supplier_id = $(this).val();

                $.ajax({
                    url: "{{ route('get.category') }}",
                    type: 'GET',
                    data: {
                        supplier_id: supplier_id
                    },
                    success: function(res) {
                        let html =
                            '<option value="" selected disabled>Select Category</option>';

                        $.each(res, function(key, value) {
                            html += `
                            <option value="${value.category_id}">${value.category.name}</option>
                            `;
                        })
                        $('#category_id').html(html);


                    }
                })

            })

            $(document).on('change', '#category_id', function() {
                let category_id = $(this).val();

                $.ajax({
                    url: "{{ route('get.product') }}",
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    success: function(res) {
                        let html =
                            '<option value="" selected disabled>Select Product</option>';

                        $.each(res, function(key, value) {
                            html += `
                            <option value="${value.id}">${value.name}</option>
                            `;
                        })
                        $('#product_id').html(html);


                    }
                })

            })

        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.addEvent').click(function() {

                let date = $('#date').val();
                let purchase_no = $('#purchase_no').val();
                let supplier_id = $('#supplier_id').val();
                let category_id = $('#category_id').val();
                let category_name = $('#category_id').find('option:selected').text();
                let product_id = $('#product_id').val();
                let product_name = $('#product_id').find('option:selected').text();


                if (date == '') {
                    $.notify("Please Select Date", {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                if (purchase_no == '') {
                    $.notify("Please Enter Purchase Number", {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                if (supplier_id == null) {
                    $.notify("Please Select Supplier", {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                if (category_id == null) {
                    $.notify("Please Select Category", {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                if (product_id == null) {
                    $.notify("Please Select Product", {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                let source = $('#document-template').html();

                let template = Handlebars.compile(source);

                let data = {
                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name,
                }

                let html = template(data);
                $('#addRow').append(html);

            })

            $(document).on('click', '.removeEvent', function() {
                $(this).closest('.delete_add_item').remove();
            })

            $(document).on('keyup click', '#unit_price,#buying_qty', function() {
                let unitPrice = $(this).closest('tr').find('input#unit_price').val();
                let buyingQty = $(this).closest('tr').find('input#buying_qty').val();
                let total = unitPrice * buyingQty;

                $(this).closest('tr').find('input#total_cost').val(total);

                let estimateTotal = total + total;
                $('#estimate_total').val(estimateTotal);



            })
        })
    </script>

@endsection
