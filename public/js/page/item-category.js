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
                    <tr class="even:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="px-4 py-3 text-gray-700">${category.unitcode}</td>
                        <td class="px-4 py-3 text-gray-700">${category.pname}</td>
                        <td class="px-4 py-3 text-center">
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
                toastr.success("Item Category added successfully!");
                $("#addItemCategoryForm")[0].reset();
                fetchNextUnitCode();
                fetchItemCategories();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || "An error occurred.");
            },
        });
    });
});
