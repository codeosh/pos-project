// public\js\layouts\sidebar.js
$(document).ready(function () {
    $("#menu-bars").click(function () {
        $(".sidebar").toggleClass("active");
        $(".body-content").toggleClass("collapsed");
    });
});
