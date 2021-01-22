var feedbackmodal = document.getElementById("feedbackmodal");
var feedbackbtn = document.getElementById("feedbackbtn");
var feedback_closebtn = document.getElementById("feedback-close");
feedbackbtn.onclick = function() {
    document.querySelector("#nav").classList.remove("show");
    feedbackmodal.style.display = "block";
};
feedback_closebtn.onclick = function() {
    feedbackmodal.style.display = "none";
};
window.onclick = function(event) {
    if (event.target == feedbackmodal) {
        feedbackmodal.style.display = "none";
    }
};
