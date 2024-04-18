@extends('partials.main')
@section('title', 'User List')
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
                <button type="button" data-toggle="modal" data-target="#userCreate" class="btn btn-primary d-none d-sm-inline-block shadow-sm btn-sm"><i class="fa-solid fa-user-plus"></i> Create user</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center align-middle" style="width: 10vh">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $user->name }}</td>
                                    <td class="text-center align-middle">{{ $user->email }}</td>
                                    <td class="text-center align-middle">{{ $user->role }}</td>
                                    <td class="text-center align-middle" style="width: 18vh">
                                        <button type="button" data-toggle="modal" data-target="#userEdit{{ $user->id }}" class="btn btn-warning btn-circle">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <a href="{{ route('admin-user-delete', $user->id) }}" data-confirm-delete="true" data-toggle="modal" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('partials.admin.user-edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('partials.admin.user-create')
        {{-- @include('auth.admin.user-edit') --}}

@endsection
