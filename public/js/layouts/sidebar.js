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
        closeDropdowns();
    }

    function toggleProfileContainer() {
        if ($(window).width() <= 768 && !$(".sidebar").hasClass("active")) {
            $(".profile-container").hide();
        } else {
            $(".profile-container").show();
        }
    }

    function closeDropdowns() {
        $(".dropdown-menu").slideUp(100);
        $(".dropdown-btn i.fa-chevron-down").removeClass("rotate-180");
    }

    checkScreenSize();

    $(window).resize(function () {
        checkScreenSize();
    });

    $("#menu-bars").click(function () {
        $(".sidebar").toggleClass("active");
        $(".body-content").toggleClass("collapsed");
        toggleProfileContainer();

        if ($(".sidebar").hasClass("active")) {
            closeDropdowns();
        }
    });

    $(".dropdown-btn").on("click", function (e) {
        e.preventDefault();

        let $menu = $(this).next(".dropdown-menu");
        let $icon = $(this).find("i.fa-chevron-down");

        $(".dropdown-menu").not($menu).slideUp(100);
        $(".dropdown-btn i.fa-chevron-down")
            .not($icon)
            .removeClass("rotate-180");

        $menu.slideToggle(100);
        $icon.toggleClass("rotate-180");
    });
});
