// public\js\page\contact-page.js
function closeContactModal() {
    hideModal("add_contact_modal");
    hideModal("view_contact_modal");

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

    $("#viewtermsDropdownBtn").on("click", function (event) {
        event.stopPropagation();
        $("#viewtermsDropdownMenu").toggleClass("hidden");
    });

    $("#viewtermsDropdownMenu").on("click", function (event) {
        event.stopPropagation();
    });

    $(document).on("mousedown", function (event) {
        if (
            !$(event.target).closest(
                "#viewtermsDropdownMenu, #viewtermsDropdownBtn"
            ).length
        ) {
            $("#viewtermsDropdownMenu").addClass("hidden");
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

    // Delete Function
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

    // View Function
    $(document).on("click", ".view-btn", function (e) {
        e.stopPropagation();

        let unitcode = $(this).data("id");

        $.ajax({
            url: `/contacts/${unitcode}`,
            type: "GET",
            success: function (response) {
                const contact = response.contact;
                const termPayment = response.termPayment;

                $("#viewseqcode").val(contact.unitcode);
                $("#viewidnum").val(contact.unitcode);
                $("#viewidcode").val(contact.unitcode);
                $("#viewconsignee").val(contact.customername);
                $("#viewcontactperson").val(contact.contactperson);
                $("#viewdropGroup").val(contact.group);
                $("#viewtin").val(contact.tin);
                $("#viewcontactaddress").val(contact.address);
                $("#viewcontactnum").val(contact.contact);
                $("#viewcontactcomment").val(contact.comment || "");

                if (termPayment) {
                    $("#viewdropTypePayment").val(termPayment.type).change();
                    $("#viewdropDayPayment").val(termPayment.day).change();

                    viewupdateTermsButtonText();
                }

                showModal("view_contact_modal");
            },
            error: function () {
                toastr.error("Failed to load contact details.");
            },
        });
    });

    function viewupdateTermsButtonText() {
        let type = $("#viewdropTypePayment").val() || "Type";
        let days = $("#viewdropDayPayment").val() || "Days";
        $("#viewtermsDropdownBtn").text(`${type} / ${days}`);
    }

    $("#viewdropTypePayment, #viewdropDayPayment").on(
        "change",
        viewupdateTermsButtonText
    );

    // Search function
    $("#searchInput").on("keyup", function () {
        let searchValue = $(this).val().toLowerCase();

        $("#ContactTable tr").each(function () {
            let unitCode = $(this).find("td:eq(0)").text().toLowerCase();
            let contactName = $(this).find("td:eq(1)").text().toLowerCase();

            if (
                unitCode.includes(searchValue) ||
                contactName.includes(searchValue)
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
