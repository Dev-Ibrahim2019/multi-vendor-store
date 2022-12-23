<div class="form-group">
    <x-form.input label="Role" type="text" name="name" id="name" :value="$role->name" role="input" />
</div>

<fieldset class="border p-4">
    <legend>{{ __('Abilities') }}</legend>

    @foreach (config('abilities') as $ability_code => $ability_name)
        <div class="row mb-1">
            <div class="col-md-6">
                {{ $ability_name }}
            </div>
            <div class="col-md-2">
                <input type="radio" name="abilities[{{ $ability_code }}]" value="allow" @checked(($role_abilities[$ability_code] ?? '') == 'allow') > Allow
            </div>
            <div class="col-md-2">
                <input type="radio" name="abilities[{{ $ability_code }}]" value="deny" @checked(($role_abilities[$ability_code] ?? '') == 'deny')> Deny
            </div>
            <div class="col-md-2">
                <input type="radio" name="abilities[{{ $ability_code }}]" value="inherit" @checked(($role_abilities[$ability_code] ?? '') == 'inherit')> Inherit
            </div>
        </div>
    @endforeach
</fieldset>

<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary ms-4">back</a>
    </div>
</div>
