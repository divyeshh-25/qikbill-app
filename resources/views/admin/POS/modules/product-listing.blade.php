<div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl">
    <div class="product-info card" id="{{ $product->id }}" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-qty="1">
        <a href="javascript:void(0);" class="product-image">
            <img src="{{ $product->product_image_url }}" alt="{{ $product->name }}">
        </a>
        <div class="product-content">
            <h6 class="fs-14 fw-bold mb-1">{{ $product->name }}</h6>
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="text-teal fs-14 fw-bold">${{ $product->price }}</h6>
                <p class="text-pink">{{ $product->stock_quantity }} Pcs</p>
            </div>
        </div>
    </div>
</div>