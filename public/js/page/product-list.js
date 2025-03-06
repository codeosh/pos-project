// public\js\page\product-list.js
function closeProductModal() {
    hideModal("add_products_modal");
}

function refreshTable() {
    $.ajax({
        url: "/Product-list/table",
        type: "GET",
        success: function (response) {
            $("table tbody").html(response);
        },
        error: function () {
            toastr.error("Failed to refresh table.");
        },
    });
}
$(document).ready(function () {
    const button = $("#dropdownButton");
    const menu = $("#dropdownMenu");

    button.click(function (event) {
        menu.toggleClass("hidden");
        menu.toggleClass("opacity-0 scale-95 opacity-100 scale-100");
        event.stopPropagation();
    });

    $(document).click(function (event) {
        if (
            !menu.is(event.target) &&
            !button.is(event.target) &&
            menu.has(event.target).length === 0
        ) {
            menu.addClass("opacity-0 scale-95");
            setTimeout(() => menu.addClass("hidden"), 200);
        }
    });

    $("#addProductForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/Product/Page/Store",
            data: $(this).serialize(),
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                toastr.success("Added successfully!");
                $("#addProductForm")[0].reset();
                closeProductModal();
                refreshTable();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "An error occurred.");
            },
        });
    });
});
