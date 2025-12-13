<form id="createUserForm" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="new-employee-field">
                <div class="profile-pic-upload mb-2">
                    <div class="profile-pic" id="profilePic">
                        <span><i class="ti ti-mood-plus"></i>Add Image</span>
                    </div>
                    <div class="mb-0">
                        <div class="image-upload mb-0">
                            <input type="file" name="image" id="profileImageInput" accept=".png, .jpg, .jpeg">
                            <div class="image-uploads">
                                <h4>Upload Image</h4>
                            </div>
                        </div>
                        <p class="fs-13 mt-2">JPEG, JPG, PNG up to 2 MB</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Name<span class="text-danger ms-1">*</span></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Kishanbhai Patel">
                <span class="error-span" id="err-name"></span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Role<span class="text-danger ms-1">*</span></label>
                <select class="form-select" name="role" id="role">
                    <option>Select</option>
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">Salesman</option>
                </select>
                <span class="error-span" id="err-role"></span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="kishanpatel@gmail.com">
                <span class="error-span" id="err-email"></span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Phone<span class="text-danger ms-1">*</span></label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="78696543210">
                <span class="error-span" id="err-phone"></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Password<span class="text-danger ms-1">*</span></label>
                <div class="pass-group">
                    <input type="password" class="pass-input form-control" name="password" id="password"
                        placeholder="********">
                    <i class="ti ti-eye-off toggle-password"></i>
                </div>
                <span class="error-span" id="err-password"></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Confirm Password<span class="text-danger ms-1">*</span></label>
                <div class="pass-group">
                    <input type="password" class="pass-input form-control" name="password_confirmation"
                        id="password_confirmation" placeholder="********">
                    <i class="ti ti-eye-off toggle-password"></i>
                </div>
                <span class="error-span" id="err-password_confirmation"></span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                <span class="status-label">Status</span>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" id="status" class="check" checked="" name="status">
                <label for="status" class="checktoggle"> </label>
            </div>
            <span class="error-span" id="err-status"></span>
        </div>
    </div>
</form>
