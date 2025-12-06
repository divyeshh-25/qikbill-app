<x-layout.auth title="Login - Admin">
    <div class="account-content">
        <div class="row login-wrapper m-0">
            <div class="col-lg-6 p-0">
                <div class="login-content">
                    <form method="POST" action="{{ route('login.check') }}">
                        <div class="login-userset">

                            <!-- Logo -->
                            <div class="login-logo logo-normal">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="img">
                            </div>

                            <a href="index.html" class="login-logo logo-white">
                                <img src="{{ asset('assets/img/logo-white.png') }}" alt="Img">
                            </a>

                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Access the Dreamspos panel using your email and passcode.</h4>
                            </div>
                                @csrf
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Email Address <span class="text-sm text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" value="" name="email" id="email" placeholder="admin@example.com" class="form-control border-end-0">
                                        <span class="input-group-text border-start-0">
                                            <i class="ti ti-mail"></i>
                                        </span>
                                    </div>
                                    @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">Password <span class="text-sm text-danger">*</span></label>
                                    <div class="pass-group">
                                        <input type="password" value="" name="password" id="password" class="pass-input form-control">
                                        <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-login authentication-check">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>Remember me
                                            </label>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="{{ route('forgot.password') }}">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-login">
                                    <button type="submit" class="btn btn-login">Sign In</button>
                                </div>

                            <div class="signinform">
                                <h4>New on our platform?
                                    <a href="{{ route('register') }}" class="hover-a"> Create an account</a>
                                </h4>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side Image -->
            <div class="col-lg-6 p-0">
                <div class="login-img">
                    <img src="{{ asset('assets/img/authentication/authentication-01.svg') }}" alt="img">
                </div>
            </div>

        </div>
    </div>
</x-layout.auth>
