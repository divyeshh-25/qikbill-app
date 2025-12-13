<x-layout.app title="Profile Setting">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Profile</h4>
            </div>
            <div class="card-body profile-body">
                <form action="{{ route('admin.setting.profile.update',$user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <h5 class="mb-2"><i class="ti ti-user text-primary me-1"></i>Basic Information</h5>
                    <div class="profile-pic-upload image-field">
                        <div class="profile-pic p-2">
                            <img src="{{ $user->profile_image_url }}" class="object-fit-cover h-100 rounded-1"
                                alt="user" id="profilePic">
                        </div>
                        <div class="mb-3">
                            <div class="image-upload mb-0 d-inline-flex">
                                <input type="file" id="profileImageInput" name="image" id="image">
                                <div class="btn btn-primary fs-13">Change Image</div>
                            </div>
                            <p class="mt-2" id="image-js-error">Upload an image below 2 MB, Accepted File format JPG,
                                PNG</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Name<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name">
                                @error('name')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label>Email<span class="text-danger ms-1">*</span></label>
                                <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                                    id="email">
                                @error('email')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Phone Number<span class="text-danger ms-1">*</span></label>
                                <input type="text" value="{{ $user->phone }}" class="form-control" id="phone"
                                    name="phone">
                                @error('phone')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label d-flex justify-content-between">
                                    Password
                                    <span class="text-muted ms-3">Leave blank if you do not want to change the
                                        password.</span>
                                </label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input form-control" value="" name="password"
                                        id="password">
                                    <i class="ti ti-eye-off toggle-password"></i>
                                </div>

                                @error('password')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="javascript:void(0);" class="btn btn-secondary me-2 shadow-none">Cancel</a>
                            <button type="submit" class="btn btn-primary shadow-none">Save Changes</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /product list -->
    </div>

    @push('scripts')
    <script>
        const profileInput = document.getElementById('profileImageInput');
        const profilePicImage = document.getElementById('profilePic');
        const imgJsErr = document.getElementById('image-js-error');
        profileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    imgJsErr.innerHTML = "File size exceeds 2 MB";
                    this.value = '';
                    return;
                }
                const validTypes = ['image/jpeg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    imgJsErr.innerHTML = "Invalid file type. Please upload a JPG or PNG image.";
                    this.value = '';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePicImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    @endpush
</x-layout.app>