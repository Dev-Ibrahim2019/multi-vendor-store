@extends('layouts.dashboard')
@section('title', 'Show Category')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Show Category</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Product's Category List</h3>
                    <div class="d-flex">
                        <a class="btn btn-primary text-light mx-3" href="{{ route('dashboard.categories.index') }}">back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-10p"></th>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-20p">Store</th>
                                    <th class="wd-10p">Status</th>
                                    <th class="wd-20p">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($category->products as $product) --}}
                                @php
                                    $products = $category
                                        ->products()
                                        ->with('store')
                                        ->latest()
                                        ->paginate(5);
                                @endphp
                                {{-- Using Eager Loading --> with() --}}
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ $product->image_url }}" alt="" height="50px"
                                                width="70px" class="rounded">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->store->name }}</td>
                                        <td><span
                                                class="badge bg-{{ $product->status == 'active' ? 'success' : 'danger' }} me-1">{{ $product->status }}</span>
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">No Categories Defined</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
