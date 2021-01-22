var ordermodal = document.getElementById("ordermodal");
var orderbtn = document.getElementById("orderbtn");
var orderclose = document.getElementById("orderclose");
orderbtn.onclick = function() {
    if (
        $("#send-us")
            .children("option:selected")
            .val() != "Choose" &&
        $("#receive-in")
            .children("option:selected")
            .val() != "Choose" &&
        $("#send-amount").val() != "" &&
        $("#receive-amount").val() != ""
    ) {
        ordermodal.style.display = "block";
        $("#send_wallet_name").val(
            $("#send-us")
                .children("option:selected")
                .val()
        );
        $("#receive_wallet_name").val(
            $("#receive-in")
                .children("option:selected")
                .val()
        );
        $("#send_wallet_name_1").val(
            $("#send-us")
                .children("option:selected")
                .val()
        );
        $("#receive_wallet_name_1").val(
            $("#receive-in")
                .children("option:selected")
                .val()
        );
        $("#receive_amount").val($("#receive-amount").val());
        $("#send_amount").val($("#send-amount").val());
        $("#receive_amount_1").val($("#receive-amount").val());
        $("#send_amount_1").val($("#send-amount").val());
    }
};
orderclose.onclick = function() {
    ordermodal.style.display = "none";
};
window.onclick = function(event) {
    if (event.target == ordermodal) {
        ordermodal.style.display = "none";
    }
};
