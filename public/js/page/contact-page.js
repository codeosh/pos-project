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

    function fetchNextUnitCode() {
        $.ajax({
            type: "GET",
            url: "/Contact/NextCode",
            success: function (response) {
                $("#seqcode").val(response.unitcode);
                $("#idnum").val(response.unitcode);
                $("#idcode").val(response.unitcode);
            },
            error: function () {
                toastr.error("Failed to fetch unit code.");
            },
        });
    }

    fetchNextUnitCode();

    $("#addContactForm").on("submit", function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/Contact/Page/Store",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                toastr.success("Added successfully!");
                $("#addContactForm")[0].reset();
                fetchNextUnitCode();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "An error occurred.");
            },
        });
    });
});
