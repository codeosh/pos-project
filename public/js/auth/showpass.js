$(document).ready(function () {
    // Show password functionality
    $("#show-password").change(function () {
        var passwordField = $('input[name="password"]');
        if ($(this).is(":checked")) {
            passwordField.attr("type", "text");
        } else {
            passwordField.attr("type", "password");
        }
    });
});
