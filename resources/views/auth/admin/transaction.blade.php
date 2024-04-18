@extends('partials.main')
@section('title', 'Transaction List')
@section('content')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <a href="{{ route('admin-transaction-excel') }}" class="btn btn-success d-none d-sm-inline-block shadow-sm btn-sm"><i class="fa-solid fa-file-export"></i> Export excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name Customer</th>
                                <th>Sale Date</th>
                                <th>Total Price</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name Customer</th>
                                <th>Sale Date</th>
                                <th>Total Price</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td class="text-center align-middle" style="width: 10vh">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $transaksi->pelanggan->name }}</td>
                                    <td class="text-center align-middle">{{ date('d-m-Y', strtotime($transaksi->created_at)) }}</td>
                                    <td class="text-center align-middle">Rp. {{ number_format($transaksi->total_price, 0, ',', '.') }}</td>
                                    <td class="text-center align-middle">{{ $transaksi->user->name }}</td>
                                    <td class="text-center align-middle" style="width: 25vh">
                                        <button type="button" data-toggle="modal" data-target="#transactionShow{{ $transaksi->id }}" class="btn btn-warning btn-circle">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <a href={{ route('admin-transaction-pdf', $transaksi->id) }} class="btn btn-primary btn-circle">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                        </a>
                                        <a href="{{ route('admin-transaction-delete', $transaksi->id) }}" data-confirm-delete="true" data-toggle="modal" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('partials.admin.transaction-show')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
