<x-layout.app title="Products - Admin">
    <div class="content">

        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Products</h4>
                    <h6>Manage your products</h6>
                </div>
            </div>

            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" title="Refresh" onclick="location.reload()">
                        <i class="ti ti-refresh"></i>
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" title="Collapse" id="collapse-header">
                        <i class="ti ti-chevron-up"></i>
                    </a>
                </li>
            </ul>

            <div class="page-btn">
                <button class="btn btn-primary"
                        data-url="{{ route('admin.products.create') }}"
                        data-type="add"
                        data-title="Add Product"
                        data-ajax-popup="true">
                    <i class="ti ti-circle-plus me-1"></i>Add Product
                </button>
            </div>
        </div>

        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div class="search-set"></div>

                <div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
                           data-bs-toggle="dropdown">
                            Status
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3">
                            <li><a class="dropdown-item rounded-1">Active</a></li>
                            <li><a class="dropdown-item rounded-1">Inactive</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
</x-layout.app>
