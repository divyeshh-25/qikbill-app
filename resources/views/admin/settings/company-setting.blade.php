<x-layout.app title="Company Setting">
    <div class="main-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.setting.company-update', $companySetting->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Company Name -->
                        <div class="mb-3">
                            <label class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name', $companySetting->name) }}" required>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $companySetting->email) }}">

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ old('address', $companySetting->address) }}</textarea>

                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Logo Upload -->
                        <div class="mb-3">
                            <label class="form-label">Logo</label>

                            @if($companySetting->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$companySetting->logo) }}" width="100">
                                </div>
                            @endif

                            <input type="file" class="form-control" name="logo" accept="image/*">
                            <small>Recommended: PNG/JPG, Max 2MB</small>

                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Favicon Upload -->
                        <div class="mb-3">
                            <label class="form-label">Favicon</label>

                            @if($companySetting->favicon)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$companySetting->favicon) }}" width="40">
                                </div>
                            @endif

                            <input type="file" class="form-control" name="favicon" accept="image/*">

                            @error('favicon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Show Logo or Name -->
                        <div class="mb-3">
                            <label class="form-label">Show Logo OR Name</label>
                            <select name="show_logo_or_name" class="form-select">
                                <option value="logo" {{ $companySetting->show_logo_or_name == 'logo' ? 'selected' : '' }}>Logo</option>
                                <option value="name" {{ $companySetting->show_logo_or_name == 'name' ? 'selected' : '' }}>Name</option>
                            </select>

                            @error('show_logo_or_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout.app>
