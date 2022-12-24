@extends('layouts.dashboard')
@section('title', 'Edit Admin')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Edit Admin</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Edit Admin</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('dashboard.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.admins._form', [
                            'button_label' => 'Update'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
