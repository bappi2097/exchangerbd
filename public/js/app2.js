// document.oncontextmenu = document.body.oncontextmenu = function () {
//   return false;
// };
// const flavoursContainer = document.getElementById("bappi");
// const flavoursScrollWidth = flavoursContainer.scrollWidth;

// window.addEventListener("load", () => {
//   self.setInterval(() => {
//     console.log(flavoursContainer.scrollLeft);
//     if (flavoursContainer.scrollLeft !== flavoursScrollWidth) {
//       flavoursContainer.scrollTo(flavoursContainer.scrollLeft + 1, 0);
//     }
//   }, 15);
// });

function togglenav() {
    if (document.querySelector("#nav").classList.value.search("show") > 0) {
        document.querySelector("#nav").classList.remove("show");
    } else {
        document.querySelector("#nav").classList.add("show");
    }
}

window.load = function() {
    if (document.querySelector("#nav").classList.value.search("show") > 0) {
        document.querySelector("#nav").classList.remove("show");
    }

    if (document.getElementById("regmodal") != null) {
        if (document.getElementById("terms").checked == true) {
            document.getElementById("terms").checked = false;
        }
        document.getElementById("reg-submit").disabled = true;
    }
};
