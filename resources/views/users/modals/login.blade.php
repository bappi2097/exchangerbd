<div class="modal" id="loginmodal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-header-title">Login</span>
            <i class="fa fa-times close" id="close"></i>
        </div>
        <div class="modal-body">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-input">
                    <label for="email">Email</label><br />
                    <input type="email" name="email" id="email" class="email" autocomplete="email" required />
                </div>

                <div class="form-input">
                    <label for="password">Password</label><br />
                    <input type="password" name="password" id="password" class="password" required
                        autocomplete="false" />
                    <i class="fa fa-eye-slash" id="password-hide"></i>
                </div>
                <div class="remember-forget">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label for="remember">Remember Me</label>
                    <a href="{{route('password.email')}}">Forget Password</a>
                </div>
                <div class="login-btn">
                    <input type="submit" value="Login To Your Account" />
                </div>
            </form>
        </div>
    </div>
</div>
