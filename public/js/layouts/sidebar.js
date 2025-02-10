// public\js\layouts\sidebar.js
$(document).ready(function () {
    function checkScreenSize() {
        if ($(window).width() <= 768) {
            $(".sidebar").addClass("active");
            $(".body-content").addClass("collapsed");
        } else {
            $(".sidebar").removeClass("active");
            $(".body-content").removeClass("collapsed");
        }
    }

    checkScreenSize();

    $(window).resize(function () {
        checkScreenSize();
    });

    $("#menu-bars").click(function () {
        $(".sidebar").toggleClass("active");
        $(".body-content").toggleClass("collapsed");
    });
});
