@extends('admin.layout.master')
@section('page-title', 'Purchase')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">All Purchases Data </h4>
                                <a href="{{ route('purchase.create') }}"
                                    class="btn btn-dark btn-rounded waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Add Purchase
                                </a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Purchase No</th>
                                        <th>Date</th>
                                        <th>Supplier</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Status</th>
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

                                    @forelse ($pendings as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->purchase_no }} </td>
                                            <td> {{ date('Y-m-d', strtotime($item->date)) }} </td>
                                            <td> {{ $item->supplier->name }} </td>
                                            <td> {{ $item->category->name }} </td>
                                            <td> {{ $item->product->name }} </td>
                                            <td> {{ $item->buying_qty }} </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <span class="bg-warning rounded px-3 py-2 text-center d-block">Pending</span>
                                                @elseif($item->status == 1)
                                                    <span class="bg-success rounded px-3 py-2 text-center d-block">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <a href="{{ route('purchase.approved', $item->id) }}"
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2"
                                                        title="Approved" id="approvedBtn"> <i class="fas fa-check"></i>
                                                    </a>
                                                @endif
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
