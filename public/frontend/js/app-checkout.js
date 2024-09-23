document.getElementById('apply-coupon-form').addEventListener('submit', function (e) {
    e.preventDefault();

    var couponCode = document.getElementById('kode_kupon').value;
    var csrfToken = document.getElementById('csrf-token').value;
    var applyCouponUrl = document.getElementById('apply-coupon-url').value;

    fetch(applyCouponUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ kode_kupon: couponCode }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            document.getElementById('coupon-message').textContent = data.error;
        } else {
            document.getElementById('coupon-message').textContent = data.success;
            document.getElementById('discount_section').style.display = 'block';
            document.getElementById('discount-total').textContent = 'Rp ' + data.discount;
            document.getElementById('checkout-total').textContent = 'Rp ' + data.cartTotal;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
