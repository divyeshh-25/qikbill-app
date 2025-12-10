<form action="{{ route('admin.categories.store') }}" method="POST" id="addCategoryForm">
    @csrf

    @if ($type === 'subcategory')
        <div class="mb-3">
            <label class="form-label">Parent Category<span class="text-danger">*</span></label>
            <select class="form-control" name="parent_id" required>
                <option value="">Select</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <span class="text-sm text-danger" id="err-parent_id"></span>
        </div>
    @else
        <input type="hidden" name="parent_id" value="">
    @endif

    <div class="mb-3">
        <label class="form-label">Category<span class="text-danger ms-1">*</span></label>
        <input type="text" class="form-control" name="name" required>
        <span class="text-sm text-danger" id="err-name"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Description<span class="text-danger ms-1">*</span></label>
        <textarea class="form-control" name="description" required></textarea>
        <span class="text-sm text-danger" id="err-description"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Status<span class="text-danger ms-1">*</span></label>
        <select class="form-control" name="status" required>
            <option value="published" selected>Published</option>
            <option value="draft">Draft</option>
        </select>
        <span class="text-sm text-danger" id="err-status"></span>

    </div>
</form>
