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

    <div class="col-lg-12">
        <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
            <span class="status-label">Status</span>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" id="status" class="check" name="status" value="1"
                {{ old('status', $category->getRawOriginal('status')) ? 'checked' : '' }}>
            <label for="status" class="checktoggle"></label>
        </div>
        <span class="error-span" id="err-status"></span>
    </div>

</form>
