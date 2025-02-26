$(document).ready(function () {
    function fetchNextUnitCode() {
        $.ajax({
            type: "GET",
            url: "/Item-Category/NextCode",
            success: function (response) {
                $("#unitcode").val(response.unitcode);
            },
            error: function () {
                toastr.error("Failed to fetch unit code.");
            },
        });
    }

    fetchNextUnitCode();

    $("#addItemUnitsForm").on("submit", function (e) {
        e.preventDefault();

        const formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/Item-Units/Page/Store",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                toastr.success("Added successfully!");
                $("#addItemUnitsForm")[0].reset();
                fetchNextUnitCode();
                refreshTable();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "An error occurred.");
            },
        });
    });
});
