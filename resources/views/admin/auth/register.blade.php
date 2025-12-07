<x-layout.auth title="Register - Admin">
    <div class="account-content">
        <div class="row login-wrapper m-0">
            <div class="col-lg-6 p-0">
                <div class="login-content">
                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="login-userset">
                            
                            {{-- Logo (normal) --}}
                            <div class="login-logo logo-normal">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="img">
                            </div>

                            {{-- Logo (white) --}}
                            <a href="{{ url('/') }}" class="login-logo logo-white">
                                <img src="{{ asset('assets/img/logo-white.png') }}" alt="Img">
                            </a>

                            <div class="login-userheading">
                                <h3>Register</h3>
                                <h4>Create New Dreamspos Account</h4>
                            </div>

                            {{-- Business Name --}}
                            <div class="mb-3">
                                <label class="form-label">Business Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="business_name" placeholder="The Choco Cafe" type="text" name="business_name" class="form-control border-end-0" value="{{ old('business_name') }}">
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-briefcase"></i>
                                    </span>
                                </div>
                                @error('business_name')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Owner Name --}}
                            <div class="mb-3">
                                <label class="form-label">Owner Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="name" type="text" placeholder="Jack Doe" name="name" class="form-control border-end-0" value="{{ old('name') }}">
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-user"></i>
                                    </span>
                                </div>
                                @error('name')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Owner Email --}}
                            <div class="mb-3">
                                <label class="form-label">Owner Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="email" type="email" placeholder="jackdoe@example.com" name="email" class="form-control border-end-0" value="{{ old('email') }}">
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                                @error('email')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input id="password" type="password" name="password" class="pass-input form-control">
                                    <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                </div>
                                @error('password')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="pass-inputs form-control">
                                    <span class="ti toggle-passwords ti-eye-off text-gray-9"></span>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Terms --}}
                            <div class="form-login authentication-check">
                                <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                    <input id="terms" type="checkbox" name="terms">
                                    <span class="checkmarks"></span>
                                    I agree to the <a href="#" class="text-primary">Terms & Privacy</a>
                                </label>
                                @error('terms')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign Up</button>
                            </div>

                            <div class="signinform">
                                <h4>Already have an account ?
                                    <a href="{{ route('login') }}" class="hover-a">Sign In Instead</a>
                                </h4>
                            </div>

                            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                <p>Copyright &copy; 2025 DreamsPOS</p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 p-0">
                <div class="login-img">
                    <img src="{{ asset('assets/img/authentication/authentication-02.svg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</x-layout.auth>
