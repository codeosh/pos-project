// public\js\page\product-list.js
function closeProductModal() {
    hideModal("add_products_modal");
}
$(document).ready(function () {
    const button = $("#dropdownButton");
    const menu = $("#dropdownMenu");

    button.click(function (event) {
        menu.toggleClass("hidden");
        menu.toggleClass("opacity-0 scale-95 opacity-100 scale-100");
        event.stopPropagation(); // Prevents click from bubbling up
    });

    $(document).click(function (event) {
        if (!menu.is(event.target) && !button.is(event.target) && menu.has(event.target).length === 0) {
            menu.addClass("opacity-0 scale-95");
            setTimeout(() => menu.addClass("hidden"), 200); // Hide after transition
        }
    });
});