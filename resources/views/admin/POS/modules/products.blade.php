  <!-- Products -->
  <div class="col-md-12 col-lg-7 col-xl-8">
      <div class="pos-categories tabs_wrapper">
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
              <div>
                  <h5 class="mb-1">Welcome, {{ ucfirst(auth()->user()->name) }}</h5>
                  <p>{{ now()->format('F d, Y') }}</p>
              </div>
              <div class="d-flex align-items-center gap-3">
                  <div class="input-icon-start pos-search position-relative">
                      <span class="input-icon-addon">
                          <i class="ti ti-search"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="Search Product">
                  </div>
                  <a href="javascript:void(0)" id="view-all-categories" class="btn btn-sm btn-primary">
                      <img src="{{ asset('assets/img/categories/category-white.svg') }}" alt="Categories">
                      All Categories
                  </a>
              </div>
          </div>
          <ul class="tabs owl-carousel pos-category3 mb-4">
              <li id="all" class="active">
                  <a href="javascript:void(0);">
                      <img src="{{ asset('assets/img/categories/category.svg') }}" alt="Categories">
                  </a>
                  <h6><a href="javascript:void(0);">All Categories</a></h6>
              </li>
              @foreach ($categories as $category)
              <li id="{{ $category->slug }}">
                  <a href="javascript:void(0);">
                      <img src="{{ asset('assets/img/categories/category-2.svg') }}" alt="Categories">
                  </a>
                  <h6><a href="javascript:void(0);">{{ $category->name }}</a></h6>
              </li>
              @endforeach
          </ul>
          <div class="pos-products">
              <div class="tabs_container">
                  <div class="tab_content active" data-tab="all">
                      <div class="row row-cols-xxl-5 g-3">
                          @foreach ($products as $product)
                          @include('admin.POS.modules.product-listing', ['product' => $product])
                          @endforeach
                      </div>
                  </div>

                  @foreach ($categories as $category)
                  <div class="tab_content" data-tab="{{ $category->slug }}">
                      <div class="row row-cols-xxl-5 g-3">
                          @forelse ($category->products as $product)
                            @include('admin.POS.modules.product-listing', ['product' => $product])
                          @empty
                            <p class="text-center">No products found</p>
                          @endforelse
                      </div>
                  </div>
                  @endforeach

              </div>
          </div>
      </div>
  </div>
  <!-- /Products -->