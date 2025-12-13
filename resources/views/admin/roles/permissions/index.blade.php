<x-layout.app title="Roles & Permission - QikBill">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Permission</h4>
                    <h6>Manage your permissions</h6>
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
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                    <i data-feather="arrow-left" class="me-2"></i> Back to Roles
                </a>
            </div>
        </div>

        <!-- /product list -->
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
                <div class="d-flex align-items-center">
                    <input type="hidden" id="role_id" value="{{ $role->id }}">
                    <p class="mb-0 fw-medium text-gray-9 me-1">Role:</p>
                    <p>{{ ucfirst($role->name) }}</p>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th class="no-sort">
                                    Modules
                                </th>
                                <th>
                                    Permissions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $module => $permission)
                            @php
                            $hasDisbaled = $rolePermissionsByModule
                            @endphp
                            <tr>
                                <td class="text-gray-9">{{ ucfirst($module) }}</td>
                                <td class="py-3">
                                    <div class="row">
                                        @foreach ($permission as $action)
                                        @php
                                            $parts = explode('.', $action->name);
                                            $module = $parts[0];
                                            $type = $parts[1];

                                            $modulePermissions = $rolePermissionsByModule[$module] ?? collect();

                                            $isChecked = $modulePermissions->contains('name', $action->name);

                                            $hasNonView = $modulePermissions->contains(function($p) {
                                                return explode('.', $p->name)[1] !== 'view';
                                            });
                                            $checkView = ($type === 'view' && $hasNonView);
                                        @endphp
                                        <div class="col-2">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input permissions-checkbox"
                                                    id="{{ $action->name }}" name="permissions[]" type="checkbox"
                                                    value="{{ $action->name }}" {{ $isChecked ? 'checked' : '' }}
                                                    {{ $checkView ? 'checked disabled' : '' }}>

                                                <label for="{{ $action->name }}" class="form-label user-select-none"
                                                    role="button">
                                                    {{ ucfirst($type) }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="">
                                    <button class="btn btn-primary add-btn" id="add-btn">Save</button>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#add-btn', function() {
                let permissions = $(".permissions-checkbox:checked")
                    .map(function() {
                        return $(this).val();
                    }).get();
                let id = $("#role_id").val();
                console.log(id);
                let url = "{{ route('admin.roles.sync-permissions',':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        'permissions': permissions
                    },
                    success: function(response) {
                        $(".error-span").text('');
                        if (response.success) {
                            $('#data-table').DataTable().ajax.reload();
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
            $(document).on('change', '.permissions-checkbox', function() {
                let action = $(this).attr('id');
                let parts = action.split(".");
                let module = parts[0];
                let type = parts[1];
                if (type === "view") {
                    return;
                }
                let viewSelector = `#${module}\\.view`;
                let $view = $(viewSelector);
                let otherSelectors = `.permissions-checkbox[id^="${module}."]:not(#${module}\\.view)`;
                if ($(this).prop('checked')) {
                    $view.prop('checked', true).prop('disabled', true);
                } else {
                    let anyOtherChecked = $(otherSelectors).filter(':checked').length > 0;
                    if (anyOtherChecked) {
                        $view.prop('checked', true).prop('disabled', true);
                    } else {
                        $view.prop('checked', false).prop('disabled', false);
                    }
                }
            });
        })
    </script>
    @endpush
</x-layout.app>