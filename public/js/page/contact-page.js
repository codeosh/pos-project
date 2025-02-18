// public\js\page\contact-page.js
function closeContactModal() {
    hideModal("add_contact_modal");

    $("#dropTypePayment").val("");
    $("#dropDayPayment").val("");
    $("#termsDropdownMenu").addClass("hidden");

    $("#termsDropdownBtn").text("Terms of Payment");
}

function refreshContactTable() {
    $.ajax({
        url: "/contacts/table",
        type: "GET",
        success: function (response) {
            $("table tbody").html(response);
        },
        error: function () {
            toastr.error("Failed to refresh contacts.");
        },
    });
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
                refreshContactTable();
                closeContactModal();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "An error occurred.");
            },
        });
    });

    $(document).on("click", ".delete-btn", function (e) {
        e.stopPropagation();

        let unitcode = $(this).data("id");
        let row = $(`#row-${unitcode}`);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: `/Contact/Delete/${unitcode}`,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        toastr.success(response.message);
                        row.fadeOut(300, function () {
                            $(this).remove();
                        });

                    },
                    error: function (xhr) {
                        toastr.error(
                            xhr.responseJSON?.message ||
                                "An error occurred while deleting."
                        );
                    },
                });
            }
        });
    });
});
