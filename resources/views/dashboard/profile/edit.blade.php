@extends('layouts.dashboard')
@section('title', 'Edit Profile')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Edit Profile</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Edit Profile</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('dashboard.profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-form.input name="first_name" id="first_name" label="First Name" :value="$user->profile->first_name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-form.input name="last_name" id="last_name" label="Last Name" :value="$user->profile->last_name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-form.input name="birthday" type="date" id="birthday" label="Birthday" :value="$user->profile->birthday" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-form.radio name="gender" id="gender" label="Gender" :options="['male' => 'Male', 'female' => 'Female']" :checked="$user->profile->gender" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input name="street_address" id="street_address" label="Street Address" :value="$user->profile->street_address" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input name="city" id="city" label="City" :value="$user->profile->city" :value="$user->profile->city" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input name="state" id="state" label="State" :value="$user->profile->state" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input name="postal_code" id="postal_code" label="Postal Code" :value="$user->profile->postal_code" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.select name="country" label="Country" :options="$countries" :seleted="$user->profile->country" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.select name="local" label="Local" :options="$locales" :seleted="$user->profile->local" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                {{-- <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary ms-4">back</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
