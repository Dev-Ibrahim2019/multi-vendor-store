@extends('layouts.dashboard')
@section('title', 'Users')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ User</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">User List</h3>
                    <div class="d-flex">
                        @if (Auth::user()->can('user.create'))
                            <a class="btn btn-primary text-light mx-3"
                                href="{{ route('dashboard.users.create') }}">Create
                                User</a>
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
                                    <th class="wd-20p">Created At</th>
                                    <th class="wd-10p"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a
                                                href="{{ route('dashboard.users.show', $user->id) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td name="bstable-actions">
                                            <div class="btn-list d-flex">
                                                @can('user.update')
                                                    <a id="bEdit"
                                                        href="{{ route('dashboard.users.edit', $user->id) }}"
                                                        class="btn btn-sm btn-primary mx-3">
                                                        <span class="fe fe-edit"> </span>
                                                    </a>
                                                @endcan
                                                @can('user.delete')
                                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}"
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
                        {{ $users->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
