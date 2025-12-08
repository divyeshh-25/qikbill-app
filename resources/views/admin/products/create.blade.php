<form action="{{ route('admin.products.store') }}" method="POST" id="addProductForm">
    @csrf

    <div class="mb-3">
        <label class="form-label">SKU <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="sku" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Product Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Price <span class="text-danger">*</span></label>
        <input type="number" step="0.01" class="form-control" name="price" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cost Price <span class="text-danger">*</span></label>
        <input type="number" step="0.01" class="form-control" name="cost_price" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="stock_quantity" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <div class="text-end mt-4">
        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
</form>
