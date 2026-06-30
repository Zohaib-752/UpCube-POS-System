@extends('admin.layout.master')
@section('page-title', 'All Suppliers')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">All Supplier Data </h4>
                                <a href="{{ route('supplier.create') }}"
                                    class="btn btn-dark btn-rounded waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Add Supplier
                                </a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="fw-bold" style="min-width: 100px;">Show Entries:</span>
                                            <select class="form-select form-select-sm">
                                                <option value="">20</option>
                                                <option value="">30</option>
                                                <option value="">40</option>
                                                <option value="">50</option>
                                            </select>
                                        </div>
                                        <div class="d-flex  gap-2">
                                            <input type="text" placeholder="Search" class="form-control rounded-pill"
                                                style="width: 200px;height: 40px;">
                                            <button type="submit" class="btn btn-info rounded-pill">Search</button>
                                        </div>
                                    </div>
                                </thead>


                                <tbody>

                                    @forelse ($supplier as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->mobile_no }} </td>
                                            <td> {{ $item->email }} </td>
                                            <td> {{ substr($item->address, 0, 20) . ' ...' }} </td>

                                            <td>
                                                <a href="{{ route('supplier.edit', $item->id) }}"
                                                    class="btn btn-info btn-rounded waves-effect waves-light mb-2"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('supplier.delete', $item->id) }}"
                                                    class="btn btn-danger btn-rounded waves-effect waves-light mb-2"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
