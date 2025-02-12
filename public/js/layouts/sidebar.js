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
        toggleProfileContainer();
    }

    function toggleProfileContainer() {
        if ($(window).width() <= 768 && !$(".sidebar").hasClass("active")) {
            $(".profile-container").hide();
        } else {
            $(".profile-container").show();
        }
    }

    checkScreenSize();

    $(window).resize(function () {
        checkScreenSize();
    });

    $("#menu-bars").click(function () {
        $(".sidebar").toggleClass("active");
        $(".body-content").toggleClass("collapsed");
        toggleProfileContainer();
    });
});
