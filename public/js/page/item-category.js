// public\js\page\item-category.js
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

    function refreshTable() {
        $.ajax({
            url: "/item-category/table",
            type: "GET",
            success: function (response) {
                $("table tbody").html(response);
            },
            error: function () {
                toastr.error("Failed to refresh contacts.");
            },
        });
    }

    fetchNextUnitCode();

    // Search function
    $("#searchInput").on("keyup", function () {
        let searchValue = $(this).val().toLowerCase();

        $("#itemCategoryTable tr").each(function () {
            let unitCode = $(this).find("td:eq(0)").text().toLowerCase();
            let description = $(this).find("td:eq(1)").text().toLowerCase();

            if (
                unitCode.includes(searchValue) ||
                description.includes(searchValue)
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    $("#addItemCategoryForm").on("submit", function (e) {
        e.preventDefault();

        const formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/Item-Category/Page/Store",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                toastr.success("Added successfully!");
                $("#addItemCategoryForm")[0].reset();
                fetchNextUnitCode();
                refreshTable();
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
                    url: `/Item-Category/Delete/${unitcode}`,
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

                        $("#clearButton").click();
                        $("#addItemCategoryBtn").show();
                        $("#saveItemCategoryBtn").hide();
                        $("#resetButton").show();
                        $("#clearButton").hide();
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

    $(document).on("click", "#resetButton", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "This will delete ALL item categories!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, reset it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "/Item-Category/Reset",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        toastr.success(response.message);
                        $("#itemCategoryTable").html("");
                        fetchNextUnitCode();
                        refreshTable();
                    },
                    error: function (xhr) {
                        toastr.error(
                            xhr.responseJSON?.message ||
                                "An error occurred while resetting."
                        );
                    },
                });
            }
        });
    });

    $("#saveItemCategoryBtn").hide();
    $("#clearButton").hide();

    $(document).on("click", "#itemCategoryTable tr", function () {
        let unitCode = $(this).find("td:eq(0)").text().trim();
        let description = $(this).find("td:eq(1)").text().trim();

        $("#unitcode").val(unitCode);
        $("#pname").val(description);

        $("#addItemCategoryBtn").hide();
        $("#saveItemCategoryBtn").show();

        $("#resetButton").hide();
        $("#clearButton").show();
    });

    $("#clearButton").on("click", function (e) {
        e.preventDefault();
        fetchNextUnitCode();
        $("#pname").val("");
        $("#addItemCategoryBtn").show();
        $("#saveItemCategoryBtn").hide();

        $("#resetButton").show();
        $("#clearButton").hide();
    });

    $("#saveItemCategoryBtn").on("click", function () {
        let unitcode = $("#unitcode").val().trim();
        let pname = $("#pname").val().trim();

        if (pname === "") {
            toastr.error("Description cannot be empty.");
            return;
        }

        $.ajax({
            type: "PUT",
            url: "/Item-Category/Update",
            data: {
                unitcode: unitcode,
                pname: pname,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                toastr.success(response.message);
                refreshTable();
                fetchNextUnitCode();
                $("#pname").val("");

                $("#addItemCategoryBtn").show();
                $("#saveItemCategoryBtn").hide();

                $("#resetButton").show();
                $("#clearButton").hide();
            },
            error: function (xhr) {
                toastr.error(
                    xhr.responseJSON?.message ||
                        "An error occurred while updating."
                );
            },
        });
    });
});
