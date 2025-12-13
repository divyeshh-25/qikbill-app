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
                <button class="btn btn-primary" id="add-product">
                    <i class="ti ti-circle-plus me-1"></i>Add Product
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div class="search-set">

                </div>

                <div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                    <div class="dropdown">
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center"
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
        <script>
            $(document).on('click', '#add-product', function() {
                $.ajax({
                    url: "{{ route('admin.products.create') }}",
                    type: "GET",
                    success: function(response) {
                        openModal('Add Product', response, 'Save Product');
                    },
                    error: function(xhr) {
                        showToast('Error', 'Failed to load the form.', 'error');
                    }
                });
            });
            $(document).on('click', '.add-btn', function() {
                let form = $("#addProductForm")[0];
                let formData = new FormData(form);
                $.ajax({
                    url: "{{ route('admin.products.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $(".error-span").text('');
                            $('#data-table').DataTable().ajax.reload();
                            closeModal();
                            showToast('Success', response.message, 'success');

                    },
                    error: function(xhr) {
                        $(".error-span").text('');
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`#err-${field}`).text(errors[field][0]).css('color',
                                    'red');
                            }
                        } else {
                            showToast('Error', 'An error occurred while saving the product.',
                                'error');
                        }
                    }
                });
            });
            $(document).on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.products.edit', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        openModal('Edit Product', response, 'Update Product', true);
                    },
                    error: function(xhr) {
                        showToast('Error', 'Failed to load the form.', 'error');
                    }
                });
            });
            $(document).on('click', '.update-btn', function() {
                let form = $("#editProductForm")[0];
                let formData = new FormData(form);
                let id = $("#id").val();
                let url = "{{ route('admin.products.update', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $(".error-span").text('');
                            $('#data-table').DataTable().ajax.reload();
                            closeModal();
                            showToast('Success', response.message, 'success');
                    },
                    error: function(xhr) {
                        $(".error-span").text('');
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`#err-${field}`).text(errors[field][0]).css('color',
                                    'red');
                            }
                        } else {
                            showToast('Error', 'An error occurred while saving the product.',
                                'error');
                        }
                    }
                });
            });
            $(document).on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                deleteModal('Delete Product', 'Are you sure you want to delete product?');
                $("#delete-modal-btn").attr('data-id', id);
            });
            $(document).on('click', '#delete-modal-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.products.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "DELETE",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#data-table').DataTable().ajax.reload();
                            closeDeleteModal();
                            showToast('Success', response.message, 'success');
                        } else {
                            showToast('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        $(".error-span").text('');
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`#err-${field}`).text(errors[field][0]).css('color',
                                    'red');
                            }
                        } else {
                            showToast('Error', 'An error occurred while delete.', 'error');
                        }
                    }
                });
            });
        </script>
    @endpush
</x-layout.app>
