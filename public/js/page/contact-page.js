// public\js\page\contact-page.js
function closeContactModal() {
    hideModal("add_contact_modal");

    $("#dropTypePayment").val("");
    $("#dropDayPayment").val("");
    $("#termsDropdownMenu").addClass("hidden");

    $("#termsDropdownBtn").text("Terms of Payment");
}

$(document).ready(function () {
    $("#termsDropdownBtn").on("click", function (event) {
        event.stopPropagation();
        $("#termsDropdownMenu").toggleClass("hidden");
    });

    $("#termsDropdownMenu").on("click", function (event) {
        event.stopPropagation();
    });

    $(document).on("mousedown", function (event) {
        if (
            !$(event.target).closest("#termsDropdownMenu, #termsDropdownBtn")
                .length
        ) {
            $("#termsDropdownMenu").addClass("hidden");
        }
    });

    function updateTermsButtonText() {
        let type = $("#dropTypePayment").val() || "Type";
        let days = $("#dropDayPayment").val() || "Days";
        $("#termsDropdownBtn").text(`${type} / ${days}`);
    }

    $("#dropTypePayment, #dropDayPayment").on("change", updateTermsButtonText);
});
