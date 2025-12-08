<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" id="editCategoryForm">
    @csrf
    @method('PUT')

     @if($type === 'subcategory')
     <div class="mb-3">
         <label class="form-label">Parent Category <span class="text-danger">*</span></label>
         <select name="parent_id" class="form-control" required>
             <option value="">Select Parent Category</option>

             @foreach($categories as $cat)
                 <option value="{{ $cat->id }}"
                     {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                     {{ $cat->name }}
                 </option>
             @endforeach
         </select>
     </div>
 @endif
    <div class="mb-3">
        <label class="form-label">Category <span class="text-danger ms-1">*</span></label>
        <input type="text"
               class="form-control"
               name="name"
               value="{{ old('name', $category->name) }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description <span class="text-danger ms-1">*</span></label>
        <textarea class="form-control"
                  name="description"
                  required>{{ old('description', $category->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status <span class="text-danger ms-1">*</span></label>
        <select class="form-control" name="status" required>
            <option value="published" {{ $category->status == 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ $category->status == 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
    </div>

    <div class="text-end mt-4">
        <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </div>
</form>
