<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin=" anonymous"></script>

<script>
// hide-nav //
$(window).scroll(function () {
    let scrollTop = $(this).scrollTop();
    if (scrollTop <= 150) {
        $(".nav").removeClass('hide-nav');
    } else {
        $(".nav").addClass('hide-nav');
    }
});
// menu //

$(".nav-list .dropdown>a").hover(function(){
    $(this).closest(".dropdown").addClass('show');
})
$(".nav-list .dropdown").mouseleave(function(){
    $(this).closest(".dropdown").removeClass('show');
})

$("#menuClickArea").click(function () {
    $(this).closest(".menu").toggleClass('current');
})

$(".menu").mouseleave(function(){
    $(this).removeClass('current');
    $(this).find(".dropdown").removeClass('show');
})

$(".menu-list .dropdown>a").click(function(){
    $(this).closest(".dropdown").toggleClass('show');
})

// btn-top //
let vh = $(window).height();

$("#goTop").css({
    "visibility" : "hidden",
    "opacity": "0"
})

$("#goTop").click(function () {
    $("html").animate({
        scrollTop: 0
    })
});
$(window).scroll(function () {
    let scrollTop2 = $(this).scrollTop();
    // console.log(scrollTop)
    if (scrollTop2 < vh) {
        $("#goTop").css({
            "visibility" : "hidden",
            "opacity": "0"
        })
    }
    else {
        $("#goTop").css({
            "visibility": "visible",
            "opacity": "1",
            "cursor": "pointer"
        })
    }
})

// footer

if ($(window).width() < 768) {
    $(".bg-footer").attr("src","images/footer-bg-mobile.svg")
}

//-------------- SVG 變色 -------------//
jQuery('img.svg').each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function (data) {
        // Get the SVG tag, ignore the rest   
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG   
        if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG   
        if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org   
        $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.   
        if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        // Replace image with new SVG   
        $img.replaceWith($svg);

    }, 'xml');

});


// cart_count and cart_short_list
    const cart_count = $('.cart_count');
    const cart_short_list = $('.cart-short-list');

    //將資料送到api取得結果

    $.get('cart-handle.php', function(data) {
        setCartCount(data); //將取得的結果送到function處理
    }, 'json');


    function setCartCount(data) {
        let count = 0;
        cart_short_list.empty(); //先清空再append新的內容
        if (data && data.cart && data.cart.length) {
            for (let i in data.cart) {
                let item = data.cart[i];
                let subtotal = item['price'] * item['qty']
                count += item['qty'];
                cart_short_list.append(`
                <div class="nav-eachsock-list flex">
                    <div class="nav-img-product">
                        <img src="images/product/${item['img_ID']}-1.jpg" alt="">
                    </div>
                    <div class="nav-socks-nameNprice flex">
                        <h5 class="nav-socks-title">${item['product_name']}</h5>
                        <div class="qtyNprice flex">
                        <h5>× ${item['qty']}</h5>
                        <h5 class="nav-socks-price">NT$ ${subtotal}</h5>
                        </div>
                    </div>
                </div>`)
            }
            cart_count.css('background', '#FF9685');
            cart_count.text(count);

        } else {
            cart_short_list.append(`
            <div class="nav-icon-empty-cart flex">    
                <img class="img-empty-cart" src="images/cart-empty.svg" alt="">
                <h4 class="nav-empty-cart">購物車空空的。</h4>
            </div>`)

            cart_count.css('background', 'transparent');
            cart_count.text('');
        }
    }

    $('.a-cart').click(function() {
        $('.box-cart-short').toggleClass('show')
    })
</script>