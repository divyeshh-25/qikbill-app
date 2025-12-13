<x-layout.app title="Company Setting">
    <div class="main-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <form id="companySettingForm"
                          action="{{ route('admin.setting.company-update', $companySetting->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Header -->
                        <div class="card-title-head mb-4">
                            <h6 class="fs-16 fw-bold">
                                <span class="fs-16 me-2"><i class="ti ti-settings"></i></span>
                                General Settings
                            </h6>
                        </div>

                        <!-- Logo & Favicon -->
                        <div class="row mb-4">
                            <!-- Company Logo -->
                            <div class="col-md-6">
                                <div class="profile-pic-upload">
                                    <div class="profile-pic">
                                        @if($companySetting->logo)
                                            <img id="logoPreview"
                                                 src="{{ asset('storage/'.$companySetting->logo) }}"
                                                 class="img-fluid rounded"
                                                 alt="Company Logo">
                                        @else
                                            <img id="logoPreview" style="display:none;">
                                            <span id="logoPlaceholder">
                                                <i class="ti ti-circle-plus mb-1 fs-16"></i> Add Logo
                                            </span>
                                        @endif
                                    </div>

                                    <div class="new-employee-field">
                                        <div class="image-upload mb-0">
                                            <input type="file"
                                                   name="logo"
                                                   accept="image/png,image/jpeg"
                                                   onchange="previewAndValidateImage(this, 'logoPreview', 'logoPlaceholder')">
                                            <div class="image-uploads">
                                                <h4>Upload Logo</h4>
                                            </div>
                                        </div>

                                        <small id="logoError" class="text-danger d-block mt-1"></small>

                                        <span class="fs-13 fw-medium mt-2">
                                            Upload an image below 2 MB, Accepted File format JPG, PNG
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div class="col-md-6">
                                <div class="profile-pic-upload">
                                    <div class="profile-pic">
                                        @if($companySetting->favicon)
                                            <img id="faviconPreview"
                                                 src="{{ asset('storage/'.$companySetting->favicon) }}"
                                                 class="img-fluid rounded"
                                                 alt="Favicon">
                                        @else
                                            <img id="faviconPreview" style="display:none;">
                                            <span id="faviconPlaceholder">
                                                <i class="ti ti-circle-plus mb-1 fs-16"></i> Add Favicon
                                            </span>
                                        @endif
                                    </div>

                                    <div class="new-employee-field">
                                        <div class="image-upload mb-0">
                                            <input type="file"
                                                   name="favicon"
                                                   accept="image/png,image/jpeg,image/x-icon"
                                                   onchange="previewAndValidateImage(this, 'faviconPreview', 'faviconPlaceholder')">
                                            <div class="image-uploads">
                                                <h4>Upload Favicon</h4>
                                            </div>
                                        </div>

                                        <small id="faviconError" class="text-danger d-block mt-1"></small>

                                        <span class="fs-13 fw-medium mt-2">
                                            Recommended: 32x32 or 64x64 | PNG, ICO
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Company Information -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name', $companySetting->name) }}"
                                           class="form-control"
                                           required minlength="3">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email', $companySetting->email) }}"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="phone"
                                           value="{{ old('phone', $companySetting->phone) }}"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="address"
                                           value="{{ old('address', $companySetting->address) }}"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Show Logo or Name <span class="text-danger">*</span></label>
                                    <select name="show_logo_or_name" class="form-select" required>
                                        <option value="">Select</option>
                                        <option value="logo" {{ old('show_logo_or_name', $companySetting->show_logo_or_name) == 'logo' ? 'selected' : '' }}>Logo</option>
                                        <option value="name" {{ old('show_logo_or_name', $companySetting->show_logo_or_name) == 'name' ? 'selected' : '' }}>Name</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                Save Settings
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    function previewAndValidateImage(input, previewId, placeholderId) {
        const file = input.files[0];
        const errorEl = input.closest('.new-employee-field').querySelector('small');

        errorEl.textContent = '';

        if (!file) return;

        const allowedTypes = ['image/jpeg', 'image/png', 'image/x-icon'];
        const maxSize = 2 * 1024 * 1024;

        if (!allowedTypes.includes(file.type)) {
            errorEl.textContent = 'Only JPG, PNG or ICO files are allowed';
            input.value = '';
            return;
        }

        if (file.size > maxSize) {
            errorEl.textContent = 'Image size must be less than 2MB';
            input.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).style.display = 'block';

            if (placeholderId) {
                document.getElementById(placeholderId)?.remove();
            }
        };
        reader.readAsDataURL(file);
    }
</script>
@endpush
</x-layout.app>

