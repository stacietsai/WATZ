 // 多張輪播 一次播5張
 $('#test').slick({
	arrows: true,
	slidesToShow: 5,         //一次顯示幾張
	slidesToScroll: 5,       //一次卷幾張
	dots: true,              //顯示圓點
	dotsClass: 'slick-dots', //圓點樣式
	// 自訂左右箭頭
	// next arrow
	prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
	// next arrow
	nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
	infinite: true,          //無限輪播
	autoplay: true,          //自動輪播
	autoplaySpeed: 3000      //輪播速度
});