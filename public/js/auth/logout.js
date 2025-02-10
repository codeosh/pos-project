// public\js\auth\logout.js
$(document).ready(function () {
    $(document).on("click", "#logoutBtn", function () {
        $.ajax({
            url: "/logout",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                window.location.href = "/";
            },
            error: function (xhr) {
                console.error("Logout failed:", xhr.responseText);
            },
        });
    });
});
