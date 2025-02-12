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

    function fetchItemCategories() {
        $.ajax({
            type: "GET",
            url: "/Item-Category/Fetch",
            success: function (response) {
                if (response.success && response.categories.length > 0) {
                    let rows = "";
                    response.categories.forEach((category) => {
                        rows += `
                    <tr id="row-${category.unitcode}" class="even:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="px-2 py-2 text-gray-700 border-b border-gray-300">${category.unitcode}</td>
                        <td class="px-2 py-2 text-gray-700 border-b border-gray-300">${category.pname}</td>
                        <td class="px-2 py-2 text-center border-b border-gray-300">
                            <button class="delete-btn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" 
                                data-id="${category.unitcode}">
                                Delete
                            </button>
                        </td>
                    </tr>`;
                    });

                    $("#itemCategoryTable").html(rows);
                } else {
                    toastr.warning("No item categories found.");
                }
            },
            error: function () {
                toastr.error(
                    "An error occurred while fetching item categories."
                );
            },
        });
    }

    fetchNextUnitCode();
    fetchItemCategories();

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
                fetchItemCategories();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "An error occurred.");
            },
        });
    });

    $(document).on("click", ".delete-btn", function () {
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
