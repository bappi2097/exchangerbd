<div class="modal" id="regmodal">
    <div class="modal-content modal-content-reg">
        <div class="modal-header">
            <span class="modal-header-title">Registration</span>
            <i class="fa fa-times close" id="reg-close"></i>
        </div>
        <div class="modal-body">
            <form class="form-reg" action="{{route('register')}}" method="post">
                @csrf
                <div class="form-input form-input-reg">
                    <label for="firstname">First Name</label><br />
                    <input type="text" name="firstname" id="firstname" class="firstname" required />
                </div>
                <div class="form-input form-input-reg">
                    <label for="lastname">Last Name</label><br />
                    <input type="text" name="lastname" id="lastname" class="lastname" required />
                </div>
                <div class="form-input form-input-reg">
                    <label for="reg-email">Email</label><br />
                    <input type="email" name="email" id="reg-email" class="reg-email" autocomplete="email" required />
                </div>
                <div class="form-input form-input-reg">
                    <label for="reg-phone">Mobile No</label><br />
                    <input type="tel" name="phone" id="reg-phone" class="reg-phone"
                        pattern="(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$" required />
                </div>
                <div class="form-input form-input-reg">
                    <label for="reg-username">Username</label><br />
                    <input type="text" name="username" id="reg-username" class="reg-username" autocomplete="off"
                        required />
                </div>
                <div class="form-input form-input-reg">
                    <label for="reg-address">Address</label><br />
                    <input type="address" name="address" id="reg-address" class="reg-address" required />
                </div>
                <div class="form-input form-input-reg">
                    <label for="password">Password</label><br />
                    <input type="password" name="password" id="reg-password" class="password" autocomplete="off"
                        required />
                    <i class="fa fa-eye-slash" id="reg-password-hide"></i>
                </div>
                <div class="form-input form-input-reg">
                    <label for="con-password">Confirm Password</label><br />
                    <input type="password" name="password_confirmation" id="con-password" class="con-password"
                        required />
                    <i class="fa fa-eye-slash" id="con-password-hide"></i>
                </div>
                <div class="form-input-terms">
                    <input type="checkbox" name="terms" id="terms" />
                    <label for="terms"><span style="color: black">I, accept </span>Terms & Condition</label>
                </div>
                <div class="reg-btn">
                    <input type="submit" value="Register" id="reg-submit" disabled="true" />
                </div>
            </form>
        </div>
    </div>
</div>
