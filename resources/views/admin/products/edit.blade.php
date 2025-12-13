<form method="POST" id="editProductForm">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="id" value="{{ $product->id }}">
    <div class="col-lg-12">
        <div class="new-employee-field">
            <div class="profile-pic-upload mb-2">
                <div class="profile-pic" id="productimage">
                    @if ($product->product_image_url)
                        <img src="{{ $product->product_image_url }}" alt="Profile Image">
                    @else
                        <span><i class="ti ti-mood-plus"></i>Add Image</span>
                    @endif
                </div>
                <div class="mb-0">
                    <div class="image-upload mb-0">
                        <input type="file" name="image" id="productimageInput" accept=".png, .jpg, .jpeg">
                        <div class="image-uploads">
                            <h4>Upload Image</h4>
                        </div>
                    </div>
                    <p class="fs-13 mt-2">JPEG, JPG, PNG up to 2 MB</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">SKU <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" required>
        <span class="text-sm text-danger" id="err-sku"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Product Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
        <span class="text-sm text-danger" id="err-name"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        <span class="text-sm text-danger" id="err-category_id"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Price <span class="text-danger">*</span></label>
        <input type="number" step="0.01" class="form-control" name="price" value="{{ $product->price }}" required>
        <span class="text-sm text-danger" id="err-price"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Cost Price <span class="text-danger">*</span></label>
        <input type="number" step="0.01" class="form-control" name="cost_price" value="{{ $product->cost_price }}"
            required>
        <span class="text-sm text-danger" id="err-cost_price"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="stock_quantity" value="{{ $product->stock_quantity }}"
            required>
        <span class="text-sm text-danger" id="err-stock_quantity"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
        <span class="text-sm text-danger" id="err-description"></span>
    </div>

</form>
