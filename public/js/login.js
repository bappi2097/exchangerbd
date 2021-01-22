var password_hide_show = document.querySelector("#password-hide");
var password_field = document.querySelector("#password");
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
var loginmodal = document.getElementById("loginmodal");
var loginbtn = document.getElementById("loginbtn");
var closebtn = document.getElementById("close");
loginbtn.onclick = function() {
    document.querySelector("#nav").classList.remove("show");
    loginmodal.style.display = "block";
};
closebtn.onclick = function() {
    loginmodal.style.display = "none";
};
window.onclick = function(event) {
    if (event.target == loginmodal) {
        loginmodal.style.display = "none";
    }
};
