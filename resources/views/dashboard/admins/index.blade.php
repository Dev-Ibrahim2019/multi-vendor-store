@extends('layouts.dashboard')
@section('title', 'Admins')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Admin</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Admin List</h3>
                    <div class="d-flex">
                        @if (Auth::user()->can('admin.create'))
                            <a class="btn btn-primary text-light mx-3"
                                href="{{ route('dashboard.admins.create') }}">Create
                                Admin</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-20p">Email</th>
                                    <th class="wd-20p">Role</th>
                                    <th class="wd-20p">Created At</th>
                                    <th class="wd-10p"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td><a
                                                href="{{ route('dashboard.admins.show', $admin->id) }}">{{ $admin->name }}</a>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        {{-- <td>{{ $admin->role->name }}</td> --}}
                                        <td></td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td name="bstable-actions">
                                            <div class="btn-list d-flex">
                                                @can('admins.update')
                                                    <a id="bEdit"
                                                        href="{{ route('dashboard.admins.edit', $admin->id) }}"
                                                        class="btn btn-sm btn-primary mx-3">
                                                        <span class="fe fe-edit"> </span>
                                                    </a>
                                                @endcan
                                                @can('admins.delete')
                                                    <form action="{{ route('dashboard.admins.destroy', $admin->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{-- method spoofing --}}
                                                        @method('DELETE')
                                                        <button id="bDel" type="submit" class="btn btn-sm btn-danger">
                                                            <span class="fe fe-trash-2"> </span>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">No Categories Defined</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $admins->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
