@extends('layouts.dashboard')
@section('title', 'Products')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Products</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Products List</h3>
                    <div class="d-flex">
                        <a class="btn btn-primary text-light mx-3" href="{{ route('dashboard.products.create') }}">Create
                            Product</a>
                        <a class="btn btn-danger text-light" href="{{ route('dashboard.categories.trash') }}">Trash</a>
                    </div>
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
                                    <th class="wd-20p">Category</th>
                                    <th class="wd-20p">Store</th>
                                    <th class="wd-10p">Status</th>
                                    <th class="wd-10p">Price</th>
                                    <th class="wd-10p">Compare Price</th>
                                    <th class="wd-20p">Created At</th>
                                    <th class="wd-10p"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ $product->image_url }}" alt=""
                                                height="50px" width="70px" class="rounded">
                                        </td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        {{-- <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->store_name }}</td> --}}
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->store->name }}</td>
                                        <td><span
                                                class="badge @if ($product->status == 'active') bg-success @elseif($product->status == 'draft') bg-danger @else bg-warning @endif me-1">{{ $product->status }}</span>
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->compare_price }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td name="bstable-actions">
                                            <div class="btn-list d-flex">
                                                <a id="bEdit"
                                                    href="{{ route('dashboard.products.edit', $product->id) }}"
                                                    class="btn btn-sm btn-primary mx-3">
                                                    <span class="fe fe-edit"> </span>
                                                </a>
                                                <form action="{{ route('dashboard.products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- method spoofing --}}
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
                                        <td class="text-center" colspan="10">No Categories Defined</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
