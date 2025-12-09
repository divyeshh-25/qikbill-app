<x-layout.app title="Roles & Permission - QikBill">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Roles & Permission</h4>
                    <h6>Manage your roles</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf">
                        <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img">
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel">
                        <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="img">
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header">
                        <i class="ti ti-chevron-up"></i>
                    </a>
                </li>
            </ul>
            <div class="page-btn">
                <button class="btn btn-primary" id="add-role">
                    <i class="ti ti-circle-plus me-1"></i>Add Role
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div class="search-set">
                    <div class="search-input">
                        <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                        <div id="data-table-search" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control form-control-sm" placeholder="Search"
                                    id="custom-search">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive w-100">
                    {!! $dataTable->table(['class' => 'table no-footer table-responsive']) !!}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function() {
            $(document).on('click', '#add-role', function() {
                $.ajax({
                    url: "{{ route('admin.roles.create') }}",
                    type: "GET",
                    success: function(response) {
                        openModal('Add Role', response, 'Save Role');
                    },
                    error: function(xhr) {
                        showToast('Error', 'Failed to load the form.', 'error');
                    }
                });
            });
            $(document).on('click', '.add-btn', function() {
                let form = $("#createRoleForm")[0];
                let formData = new FormData(form);
                $.ajax({
                    url: "{{ route('admin.roles.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $(".error-span").text('');
                        if (response.success) {
                            $('#data-table').DataTable().ajax.reload();
                            closeModal();
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
                            showToast('Error', 'An error occurred while saving the role.',
                                'error');
                        }
                    }
                });
            });
            $(document).on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.roles.edit',':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        openModal('Edit Role', response, 'Update Role', true);
                    },
                    error: function(xhr) {
                        showToast('Error', 'Failed to load the form.', 'error');
                    }
                });
            });
            $(document).on('click', '.update-btn', function() {
                let form = $("#editRoleForm")[0];
                let formData = new FormData(form);
                let id = $("#id").val();
                let url = "{{ route('admin.roles.update',':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $(".error-span").text('');
                        if (response.success) {
                            $('#data-table').DataTable().ajax.reload();
                            closeModal();
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
                            showToast('Error', 'An error occurred while saving the role.',
                                'error');
                        }
                    }
                });
            });
            $(document).on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                deleteModal('Delete Role', 'Are you sure you want to delete role?');
                $("#delete-modal-btn").attr('data-id', id);
            });

             $(document).on('click', '#delete-modal-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.roles.delete', ':id') }}";
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
        });
    </script>
    @endpush

</x-layout.app>