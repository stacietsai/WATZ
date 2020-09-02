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