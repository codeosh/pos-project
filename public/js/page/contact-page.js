// public\js\page\contact-page.js
function closeContactModal() {
    hideModal("add_contact_modal");

    $("#dropTypePayment").val("");
    $("#dropDayPayment").val("");
    $("#termsDropdownMenu").addClass("hidden");
}

$(document).ready(function () {
    $("#termsDropdownBtn").on("click", function () {
        $("#termsDropdownMenu").toggleClass("hidden");
    });
});
