@extends('layouts.dashboard')
@section('title', 'Trash Categories')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Category</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Category Trashed</h3>
                    <a class="btn btn-primary text-light" href="{{ route('dashboard.categories.index') }}">Back</a>
                </div>
                <form action="{{ URL::current() }}" method="GET" class="d-flex justify-content-betweem m-4">
                    <x-form.input name="name" placeholder="Name" :value="request('name')" />
                    <select name="status" class="form-select mx-3">
                        <option value="">All</option>
                        <option value="active" @selected(request('status') == 'active')>Active</option>
                        <option value="archived" @selected(request('status') == 'archived')>Archived</option>
                    </select>
                    <button class="btn btn-dark">Filter</button>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-10p"></th>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-10p">Status</th>
                                    <th class="wd-20p">Deleted At</th>
                                    <th class="wd-10p"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $category->image) }}" alt=""
                                                height="50px" width="70px" class="rounded">
                                        </td>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td><span
                                                class="badge bg-{{ $category->status == 'active' ? 'success' : 'danger' }} me-1">{{ $category->status }}</span>
                                        </td>
                                        <td>{{ $category->deleted_at }}</td>
                                        <td name="bstable-actions">
                                            <div class="btn-list d-flex">
                                                <form action="{{ route('dashboard.categories.restore', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button id="bEdit" type="submit"
                                                        class="btn btn-sm btn-info mx-3">
                                                        <i class="fa fa-undo" aria-hidden="true"></i>

                                                    </button>
                                                </form>
                                                <form
                                                    action="{{ route('dashboard.categories.force-delete', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="bDel" type="submit" class="btn btn-sm btn-danger">
                                                        <span class="fe fe-trash-2"> </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">No Categories Defined</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @push('scripts')
    <!-- DATA TABLE JS -->
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="../assets/js/table-data.js"></script>
@endpush --}}
