<div class="form-group">
    <x-form.input label="Role" type="text" name="name" id="name" :value="$role->name" role="input" />
</div>

<fieldset>
    <legend>{{ __($abilities) }}</legend>

    @foreach (config('abilities') as $ability_code => $ability_name)
        <div class="row">
            <div class="col-md-6">
                {{ $ability_name }}
            </div>
            <div class="col-md-2">

            </div>
        </div>
    @endforeach
</fieldset>



<div class="form-group">
    <x-form.input label="Abilities" type="text" name="ability" id="ability" :value="$role->ability" role="input" />
</div>

<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary ms-4">back</a>
    </div>
</div>
