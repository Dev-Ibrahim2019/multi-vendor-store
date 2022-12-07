<div class="form-group">
    <x-form.input label="Product Name" type="text" name="name" id="name" :value="$product->name" role="input" />
</div>
<div class="form-group">
    <label for="name">Category</label>
    <select name="category_id" class="form-control form-select">
        <option value="">Primary Category</option>
        @foreach (App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <x-form.textarea label="Description" name="description" id="desc" :value="$product->description" />
</div>
<div class="form-group">
    <x-form.label id="image">Image</x-form.label>
    <x-form.input type="file" name="image" id="image" accept="image/*" />
    @if ($product->image)
        <img src="{{ $product->image_url }}" alt="" width="100" height="100" class="m-3">
    @endif
</div>
<div class="form-group">
    <x-form.input label="Price" type="text" name="price" id="price" :value="$product->price" />
</div>
<div class="form-group">
    <x-form.input label="Compare Price" type="text" name="compare_price" id="compare_price" :value="$product->compare_price" />
</div>
<div class="form-group">
    <x-form.input label="Tag" type="text" name="tag" id="tag" :value="$tags" />
</div>
<div class="form-group">
    <x-form.label>Status</x-form.label>
    <x-form.radio name="status" :checked="$product->status" :options="['active' => 'Active', 'archived' => 'Archived', 'draft' => 'Draft']" />
</div>
<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
        <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary ms-4">back</a>
    </div>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var inputElm = document.getElementById('tag'),
            tagify = new Tagify(inputElm);

        inputElm.addEventListener('change', onChange)

        function onChange(e) {
            // outputs a String
            console.log(e.target.value)
        }
    </script>
@endpush
