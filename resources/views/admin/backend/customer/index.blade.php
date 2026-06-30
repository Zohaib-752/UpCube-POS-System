@extends('admin.layout.master')
@section('page-title', 'All Customers')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">All Customer Data </h4>
                                <a href="{{ route('customer.create') }}"
                                    class="btn btn-dark btn-rounded waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Add Customer
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
                                        <th>Image</th>
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
                                            <button type="submit"
                                                class="btn btn-info waves-effect waves-light  rounded-pill">Search</button>
                                        </div>
                                    </div>
                                </thead>


                                <tbody>

                                    @forelse ($customer as $key => $item)
                                        <tr id="{{ $item->id }}">
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->mobile_no }} </td>
                                            <td> {{ $item->email }} </td>
                                            <td> {{ substr($item->address, 0, 20) . ' ...' }} </td>
                                            <td>
                                                @if ($item->customer_img == null)
                                                    <img src="/uploads/no_avatar.png" width="100" height="100"
                                                        alt="No Image Found" class="rounded-circle" />
                                                @else
                                                    <img src="/uploads/customer_image/{{ $item->customer_img }}"
                                                        width="100" height="100"
                                                        alt="{{ substr($item->name, 0, 10) . ' ...' }}"
                                                        class="rounded-circle" />
                                                @endif

                                            <td>
                                                <a href="{{ route('customer.edit', $item->id) }}"
                                                    class="btn btn-info btn-rounded waves-effect waves-light mb-2"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('customer.delete', $item->id) }}"
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
