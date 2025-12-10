<x-layout.app title="Users - QikBill">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Users</h4>
                    <h6>Manage your users</h6>
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
                <button class="btn btn-primary" id="add-user">
                    <i class="ti ti-circle-plus me-1"></i>Add User
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
            const callEvents = () => {
                const input = document.getElementById('profileImageInput');
                const profilePic = document.getElementById('profilePic');
                input.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        if (file.size > 2 * 1024 * 1024) {
                            alert('File size exceeds 2 MB');
                            this.value = '';
                            return;
                        }
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            profilePic.style.backgroundImage =
                                `url('${e.target.result}')`;
                            profilePic.innerHTML =
                                '';
                            profilePic.style.backgroundSize = 'cover';
                            profilePic.style.backgroundPosition =
                                'center';
                        }
                        reader.readAsDataURL(file);
                    }
                });
                if ($('.toggle-password').length > 0) {
                    $(document).on('click', '.toggle-password', function() {
                        var input = $(this).siblings('input');
                        if (input.attr("type") == "password") {
                            input.attr("type", "text");
                            $(this).removeClass("ti-eye-off").addClass("ti-eye");
                        } else {
                            input.attr("type", "password");
                            $(this).removeClass("ti-eye").addClass("ti-eye-off");
                        }
                    });
                }
            }
            $(document).on('click', '#add-user', function() {
                $.ajax({
                    url: "{{ route('admin.users.create') }}",
                    type: "GET",
                    success: function(response) {
                        openModal('Add User', response, 'Save User');
                        callEvents();
                    },
                    error: function(xhr) {
                        showToast('Error', 'Failed to load the form.', 'error');
                    }
                });
            });
            $(document).on('click', '.add-btn', function() {
                let form = $("#createUserForm")[0];
                let formData = new FormData(form);
                $.ajax({
                    url: "{{ route('admin.users.store') }}",
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
                            showToast('Error', 'An error occurred while saving the user.',
                                'error');
                        }
                    }
                });
            });
            $(document).on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.users.edit',':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        openModal('Edit User', response, 'Update User', true);
                        callEvents();
                    },
                    error: function(xhr) {
                        showToast('Error', 'Failed to load the form.', 'error');
                    }
                });
            });
            $(document).on('click', '.update-btn', function() {
                let form = $("#editUserForm")[0];
                let formData = new FormData(form);
                let id = $("#id").val();
                let url = "{{ route('admin.users.update',':id') }}";
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
                            showToast('Error', 'An error occurred while saving the user.',
                                'error');
                        }
                    }
                });
            });
            $(document).on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                deleteModal('Delete User', 'Are you sure you want to delete users?');
                $("#delete-modal-btn").attr('data-id', id);
            });
            $(document).on('click', '#delete-modal-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.users.delete', ':id') }}";
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
