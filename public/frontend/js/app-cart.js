
console.log("app-cart.js is loaded");

$(document).on('click', '#update-cart', function (e) {
    e.preventDefault(); 

    var items = [];

    // Mengumpulkan semua item dan kuantitasnya
    $('.item-quantity').each(function() {
        var itemId = $(this).data('id');
        var quantity = $(this).val();
        items.push({ id: itemId, quantity: quantity });
    });

    // Update cart melalui AJAX POST request
    $.ajax({
        url: '/cart/keranjang/update',
        type: 'POST',
        data: {
            items: items,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.cartTotal) {
                $('#cart-total').text('Rp ' + response.cartTotal);
                location.reload();
            }
            if (response.cartSubtotal) {
                $('#cart-subtotal').text('Rp ' + response.cartSubtotal);
                location.reload();
            }
            if (response.updatedItems) {
                updateCartDisplay(response.updatedItems);
            }
        },
        error: function (xhr) {
            console.log('Error:', xhr.responseText);
        }
    });
});

    // Menghapus item dari keranjang
    $(document).on('click', '.delete-item', function(e) {
        e.preventDefault();

        var productId = $(this).data('id');

        $.ajax({
            url: '/cart/keranjang/delete',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: productId,
            },
            success: function(response) {
                if (response.cartTotal) {
                    $('#cart-total').text('Rp ' + response.cartTotal);
                    location.reload(); 
                }
            },
            error: function(xhr, status, error) {
                console.log("Terjadi kesalahan:", error);
            }
        });
    });
    