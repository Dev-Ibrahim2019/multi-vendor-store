<div class="form-group">
    <x-form.input label="User" type="text" name="name" id="name" :value="$user->name" />
</div>

<fieldset class="border p-4">
    <legend>{{ __('Roles') }}</legend>

    @foreach ($roles as $role)
        <div class="mb-3">
            <label class="ckbox"><input type="checkbox" name="roles[]" value="{{ $role->id }}" @checked(in_array($role->id, old('roles', $user_roles))) ><span>{{ $role->name }}</span></label>
        </div>
    @endforeach
</fieldset>

<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
        <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary ms-4">show users</a>
    </div>
</div>
