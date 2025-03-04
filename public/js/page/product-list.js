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
    
    $('#addProductForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
    
        let formData = new FormData(this); // Get form data
    
        $.ajax({
            url: `{{ route('products.store') }}'`, // Route to store the product
            type: 'POST',
            data: formData, 
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success (e.g., show a success message, close the modal, etc.)
                alert(response.message);
                $('#add_products_modal').modal('hide');
            },
            error: function(response) {
                // Handle error (e.g., show an error message)
                alert('There was an error saving the product.');
            }
        });
    });
    
});