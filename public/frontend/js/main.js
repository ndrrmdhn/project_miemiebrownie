/*  ---------------------------------------------------
    Template Name: Male Fashion
    Description: Male Fashion - ecommerce teplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.product__filter').length > 0) {
            var containerEl = document.querySelector('.product__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_left'><span/>", "<span class='arrow_right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,            
        autoplayTimeout: 5000      
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
		Radio Btn
	--------------------- */
    $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").on('click', function () {
        $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
		Scroll
	--------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end


    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"));
    });

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="fa fa-angle-up dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-down inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    var proQty = $('.pro-qty-2');
    proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    /*------------------
        Achieve Counter
    --------------------*/
    $('.cn_num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);

$(document).ready(function() {
    // Menghapus item dari keranjang
    $('.delete-item').on('click', function () {
        var itemId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/cart/remove', // Ganti dengan route yang sesuai
                    type: 'POST',
                    data: {
                        id: itemId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        // Mengupdate total cart di tampilan
                        $('#cart-total').text('$' + response.cartTotal);
                        // Menghapus item dari DOM
                        $('button[data-id="' + itemId + '"]').closest('tr').remove();
                    }
                });
            }
        });
    });

    // Memperbarui kuantitas item di keranjang
    $('.item-quantity').on('change', function () {
        var itemId = $(this).data('id');
        var quantity = $(this).val();
        
        if (quantity == 0) {
            $(this).closest('tr').find('.delete-item').click();
        } else {
            $.ajax({
                url: '/cart/update', // Ganti dengan route yang sesuai
                type: 'POST',
                data: {
                    id: itemId,
                    quantity: quantity,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Mengupdate total cart di tampilan
                    $('#cart-total').text('$' + response.cartTotal);
                }
            });
        }
    });
    
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-item').forEach(function (button) {
            button.addEventListener('click', function () {
                const itemId = this.getAttribute('data-id');
                
                fetch(`/cart/remove/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        id: itemId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Gagal menghapus item');
                    }
                });
            });
        });
    });


    // Update cart button
    $('#update-cart').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Update cart?',
            text: "Are you sure you want to update the cart?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var cartItems = [];
                $('.item-quantity').each(function() {
                    var itemId = $(this).data('id');
                    var quantity = $(this).val();
                    if (quantity > 0) {
                        cartItems.push({id: itemId, quantity: quantity});
                    }
                });

                $.ajax({
                    url: '/cart/update', // Ganti dengan route yang sesuai
                    type: 'POST',
                    data: {
                        items: cartItems,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        // Mengupdate total cart di tampilan
                        $('#cart-total').text('$' + response.cartTotal);
                        Swal.fire(
                            'Updated!',
                            'Your cart has been updated.',
                            'success'
                        );
                    }
                });
            }
        });
    });

    // Fungsi untuk membuka modal
    function openModal() {
        var modal = $("#myModal");
        var modalImg = $("#imgModal");
        var img = $("#productImg");
        var captionText = $("#caption");

        modal.css("display", "block");
        modalImg.attr("src", img.attr("src"));
        captionText.html(img.attr("alt"));
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        var modal = $("#myModal");
        modal.css("display", "none");
    }

    // Tambahkan event listener untuk membuka modal saat gambar diklik
    $("#productImg").on("click", function () {
        openModal();
    });

    // Tambahkan event listener untuk menutup modal saat tombol close diklik
    $(".close").on("click", function () {
        closeModal();
    });

    $(window).on('load', function() {
        // Mengatur timer untuk menghilangkan CTA setelah 5 detik
        setTimeout(function() {
            $('#cta-text').addClass('hidden');
        }, 5000); // 5000 milidetik = 5 detik
    });
});

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true,             
        margin: 10,             
        autoplay: true,         
        autoplayTimeout: 2000,  
        smartSpeed: 2000,       
        fluidSpeed: true,
        slideTransition: 'linear',
        animateOut: 'fadeOut',  
        animateIn: 'fadeIn',    
        responsive: {           
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    });

    $(document).ready(function(){
        var isLoggedIn = true; 
        
        // Jika pengguna login, tampilkan ikon keranjang
        if (isLoggedIn) {
            $('#cart-icon').fadeIn(); 
        }
    });
});

