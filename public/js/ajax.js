$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $("#send-amount").on("input propertychange", function() {
        if (
            $("#send-us")
                .children("option:selected")
                .val() == "Choose" ||
            $("#receive-in")
                .children("option:selected")
                .val() == "Choose"
        ) {
            toastr.error("First Choose both dropdown");
        }
    });
    $("#receive-amount").on("input propertychange", function() {
        if (
            $("#send-us")
                .children("option:selected")
                .val() == "Choose" ||
            $("#receive-in")
                .children("option:selected")
                .val() == "Choose"
        ) {
            toastr.error("First Choose both dropdown");
        }
    });
    $.ajax({
        type: "GET",
        url: "ajax/wallet",
        success: function(data) {
            data.forEach(element => {
                $("#send-us").append(
                    '<option value="' +
                        element.name +
                        '">' +
                        element.name +
                        "</option>"
                );
                if (!element.is_bd == true) {
                    let html =
                        '<div class="rate-box">' +
                        '<div class="buy-sell">' +
                        '<table class="tbl">' +
                        "<thead>" +
                        "<tr>" +
                        '<th class="tbl-head" colspan="2">' +
                        element.name +
                        "</th>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>" +
                        "<tr>" +
                        '<td class="tbl-row-1-left">BUY</td>' +
                        '<td class="tbl-row-1-right">SELL</td>' +
                        "</tr>" +
                        "<tr>" +
                        '<td class="tbl-row-2-left">' +
                        element.buy +
                        "</td>" +
                        '<td class="tbl-row-2-right">' +
                        element.sell +
                        "</td>" +
                        "</tr>" +
                        "</tbody>" +
                        "</table>" +
                        "</div>" +
                        '<p class="reserve">Reserve</p>' +
                        '<p class="reserve-amount">' +
                        element.reserve +
                        "</p>" +
                        "</div>";
                    $("#autoscroll").append(html);
                } else {
                    let html =
                        '<div class="rate-box">' +
                        '<div class="buy-sell">' +
                        '<table class="tbl">' +
                        "<thead>" +
                        "<tr>" +
                        '<th class="tbl-head" colspan="2">' +
                        element.name +
                        "</th>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>" +
                        "<tr>" +
                        '<td class="tbl-row-1-left">BUY</td>' +
                        '<td class="tbl-row-1-right">SELL</td>' +
                        "</tr>" +
                        "<tr>" +
                        '<td class="tbl-row-2-left">' +
                        1 +
                        "</td>" +
                        '<td class="tbl-row-2-right">' +
                        1 +
                        "</td>" +
                        "</tr>" +
                        "</tbody>" +
                        "</table>" +
                        "</div>" +
                        '<p class="reserve">Reserve</p>' +
                        '<p class="reserve-amount">' +
                        element.reserve +
                        "</p>" +
                        "</div>";
                    $("#autoscroll").append(html);
                }
            });
        },
        error: function(error) {
            toastr.error("Something Went Wrong!");
        }
    });
    $.ajax({
        type: "GET",
        url: "/ajax/feedback",
        success: function(data) {
            if (Array.isArray(data) && data.length) {
                var html =
                    '<div class="rowr">' +
                    "<h2>Feedback</h2>" +
                    "</div>" +
                    '<div class="rowr horizontal-scroll" id="feedback">' +
                    "</div>";
                $("#review").append(html);
            }
            data.forEach(element => {
                html =
                    '<div class="review-box">' +
                    '<div class="review-head">' +
                    '<div class="user-img left">' +
                    '<img src="' +
                    element.image +
                    '" alt="' +
                    element.full_name +
                    '" />' +
                    "</div>" +
                    '<div class="user-name left">' +
                    "<span>" +
                    element.full_name +
                    "</span>" +
                    "</div>" +
                    "</div>" +
                    '<div class="review-star">' +
                    '<i class="fa fa-star ' +
                    (element.star > 0 ? "glow" : "") +
                    '"></i>' +
                    '<i class="fa fa-star ' +
                    (element.star > 1 ? "glow" : "") +
                    '"></i>' +
                    '<i class="fa fa-star ' +
                    (element.star > 2 ? "glow" : "") +
                    '"></i>' +
                    '<i class="fa fa-star ' +
                    (element.star > 3 ? "glow" : "") +
                    '"></i>' +
                    '<i class="fa fa-star ' +
                    (element.star > 4 ? "glow" : "") +
                    '"></i>' +
                    "</div>" +
                    '<div class="review-body">' +
                    element.feedback +
                    "</div>" +
                    "</div>";
                $("#feedback").append(html);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
    $("#receive-amount").val("");
    $("#send-amount").val("");
    $("#send-us").change(function() {
        $("#receive-in").empty();
        $("#receive-in").append("<option selected>Choose</option>");
        $("#wallet_account_id").empty();
        $("#wallet_account_id").append("<option selected>Choose</option>");
        if (
            $(this)
                .children("option:selected")
                .val() != "Choose"
        ) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "/ajax/wallet-option",
                data: {
                    name: $(this)
                        .children("option:selected")
                        .val()
                },
                success: function(data) {
                    data.wallets.forEach(element => {
                        $("#receive-in").append(
                            '<option value="' +
                                element.name +
                                '">' +
                                element.name +
                                "</option>"
                        );
                    });
                    data.wallet_contacts.forEach(element => {
                        $("#wallet_account_id").append(
                            '<option value="' +
                                element.id +
                                '">' +
                                element.contact +
                                "</option>"
                        );
                    });
                },
                error: function(error) {
                    toastr.error("Something Went Wrong!");
                }
            });
        }
    });
    $("#send-amount").on("input propertychange", function() {
        if (
            $("#send-us")
                .children("option:selected")
                .val() != "Choose" &&
            $("#receive-in")
                .children("option:selected")
                .val() != "Choose"
        ) {
            if ($("#send-amount").val() == "") {
                $("#receive-amount").val("");
            } else {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/ajax/currency-conversion",
                    data: {
                        name: $("#send-us")
                            .children("option:selected")
                            .val(),
                        opposite: $("#receive-in")
                            .children("option:selected")
                            .val(),
                        value: $("#send-amount").val(),
                        type: "send"
                    },
                    success: function(data) {
                        $("#receive-amount").val(data.value);
                    },
                    error: function(error) {
                        toastr.error("Something Went Wrong!");
                    }
                });
            }
        }
    });

    $("#receive-amount").on("input propertychange", function() {
        if (
            $("#send-us")
                .children("option:selected")
                .val() != "Choose" &&
            $("#receive-in")
                .children("option:selected")
                .val() != "Choose"
        ) {
            if ($("#receive-amount").val() == "") {
                $("#send-amount").val("");
            } else {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/ajax/currency-conversion",
                    data: {
                        name: $("#receive-in")
                            .children("option:selected")
                            .val(),
                        opposite: $("#send-us")
                            .children("option:selected")
                            .val(),
                        value: $("#receive-amount").val(),
                        type: "receive"
                    },
                    success: function(data) {
                        $("#send-amount").val(data.value);
                        // if(data.error)
                    },
                    error: function(error) {
                        toastr.error("Something Went Wrong!");
                    }
                });
            }
        }
    });
    $("#receive-in").on("input propertychange", function() {
        if (
            $("#send-us")
                .children("option:selected")
                .val() != "Choose" &&
            $("#receive-in")
                .children("option:selected")
                .val() != "Choose" &&
            $("#send-amount").val() != ""
        ) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "/ajax/currency-conversion",
                data: {
                    name: $("#send-us")
                        .children("option:selected")
                        .val(),
                    opposite: $("#receive-in")
                        .children("option:selected")
                        .val(),
                    value: $("#send-amount").val(),
                    type: "send"
                },
                success: function(data) {
                    $("#receive-amount").val(data.value);
                },
                error: function(error) {
                    toastr.error("Something Went Wrong!");
                }
            });
        }
    });
});
