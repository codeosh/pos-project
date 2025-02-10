// public\js\auth\login.js
$(document).ready(function () {
    // Handle form submission via AJAX
    $("#loginForm").on("submit", function (e) {
        e.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            url: form.attr("action"),
            method: "POST",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    toastr.success(response.message);
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON;
                toastr.error(
                    errors.message || "An error occurred. Please try again."
                );
            },
        });
    });

    $("#bladewindSubmitBtn").on("click", function () {
        $("#loginForm").submit();
    });

    $("#loginForm").on("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            $("#loginForm").submit();
        }
    });
});
