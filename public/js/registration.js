var password_hide_show = document.querySelector("#reg-password-hide");
var password_field = document.querySelector("#reg-password");
password_hide_show.onclick = () => {
    if (password_hide_show.classList.value.search("fa-eye-slash") > 0) {
        password_hide_show.classList.remove("fa-eye-slash");
        password_hide_show.classList.add("fa-eye");
        password_field.type = "text";
    } else {
        password_hide_show.classList.remove("fa-eye");
        password_hide_show.classList.add("fa-eye-slash");
        password_field.type = "password";
    }
};

var login_password_hide_show = document.querySelector("#password-hide");
var login_password_field = document.querySelector("#password");
login_password_hide_show.onclick = () => {
    if (login_password_hide_show.classList.value.search("fa-eye-slash") > 0) {
        login_password_hide_show.classList.remove("fa-eye-slash");
        login_password_hide_show.classList.add("fa-eye");
        login_password_field.type = "text";
    } else {
        login_password_hide_show.classList.remove("fa-eye");
        login_password_hide_show.classList.add("fa-eye-slash");
        login_password_field.type = "password";
    }
};

var confirm_password_hide_show = document.querySelector("#con-password-hide");
var confirm_password_field = document.querySelector("#con-password");
confirm_password_hide_show.onclick = () => {
    if (confirm_password_hide_show.classList.value.search("fa-eye-slash") > 0) {
        confirm_password_hide_show.classList.remove("fa-eye-slash");
        confirm_password_hide_show.classList.add("fa-eye");
        confirm_password_field.type = "text";
    } else {
        confirm_password_hide_show.classList.remove("fa-eye");
        confirm_password_hide_show.classList.add("fa-eye-slash");
        confirm_password_field.type = "password";
    }
};
var regmodal = document.getElementById("regmodal");
var regbtn = document.getElementById("regbtn");
var closebtn = document.getElementById("reg-close");
regbtn.onclick = function() {
    document.querySelector("#nav").classList.remove("show");
    regmodal.style.display = "block";
};
closebtn.onclick = function() {
    regmodal.style.display = "none";
};
window.onclick = function(event) {
    if (event.target == regmodal) {
        regmodal.style.display = "none";
    }
};

var terms_checkbox = document.getElementById("terms");
terms_checkbox.onclick = function() {
    let reg_submit = document.getElementById("reg-submit");
    if (terms_checkbox.checked == true) {
        reg_submit.disabled = false;
    } else {
        reg_submit.disabled = true;
    }
};
