<form method="POST" id="editCategoryForm">
    @csrf
    @method('PUT')
    <input type="hidden" id="id" name="id" value="{{ $category->id }}">
    @if ($type === 'subcategory')
        <div class="mb-3">
            <label class="form-label">Parent Category <span class="text-danger">*</span></label>
            <select name="parent_id" class="form-control" required>
                <option value="">Select Parent Category</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            <span class="text-sm text-danger" id="err-parent_id"></span>
        </div>
    @endif
    <div class="mb-3">
        <label class="form-label">Category <span class="text-danger ms-1">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}" required>
        <span class="text-sm text-danger" id="err-name"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Description <span class="text-danger ms-1">*</span></label>
        <textarea class="form-control" name="description" required>{{ old('description', $category->description) }}</textarea>
        <span class="text-sm text-danger" id="err-description"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Status <span class="text-danger ms-1">*</span></label>
        <select class="form-control" name="status" required>
            <option value="published" {{ $category->status == 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ $category->status == 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <span class="text-sm text-danger" id="err-status"></span>
    </div>

</form>
