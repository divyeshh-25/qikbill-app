<x-layout.app title="Add - Products">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="card-title-head mb-4">
                    <h6 class="fs-16 fw-bold">
                        <span class="fs-16 me-2"><i class="ti ti-settings"></i></span>
                        Add Products
                    </h6>
                </div>
                <form action="{{ route('admin.products.store') }}" method="POST" id="addProductForm"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Image Upload --}}
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="new-employee-field">
                                <div class="profile-pic-upload">
                                    <div class="profile-pic" id="productimage">
                                        <span><i class="ti ti-mood-plus"></i> Add Image</span>
                                    </div>
                                    <div class="image-upload mt-2">
                                        <input type="file" name="image" id="productimageInput"
                                            accept=".png,.jpg,.jpeg" class="@error('image') is-invalid @enderror">
                                        <div class="image-uploads">
                                            <h4>Upload Image</h4>
                                        </div>
                                        <p class="fs-13 mt-2">JPEG, JPG, PNG up to 2 MB</p>

                                        @error('image')
                                            <span class="text-danger fs-12">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Product Details --}}
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">SKU <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku"
                                value="{{ old('sku') }}">
                            @error('sku')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cost Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01"
                                class="form-control @error('cost_price') is-invalid @enderror" name="cost_price"
                                value="{{ old('cost_price') }}">
                            @error('cost_price')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror"
                                name="stock_quantity" value="{{ old('stock_quantity') }}">
                            @error('stock_quantity')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger fs-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="status" class="form-label" >Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                        </div>
                    </div>
                    {{-- Submit --}}
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary">
                            Save Product
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('productimageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                const preview = document.getElementById('productimage');

                preview.innerHTML = `
                    <img src="${e.target.result}"
                         alt="Product Image"
                         style="width:100%;height:100%;object-fit:cover;border-radius:8px;">
                `;
            };

            reader.readAsDataURL(file);
        });
    </script>

    @endpush
</x-layout.app>
