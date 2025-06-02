jQuery(document).ready(function($){
	var headerHeight = $('header.header').height();
	$('body').css('padding-top', headerHeight)
	$(window).scroll(function(){
		var header = $('header.header'),
				headerHeight = header.height(),
				top = $(this).scrollTop();
		if (top >= headerHeight && $(window).width() > 991) {
			header.addClass('fixed')
		} 
		else {
			header.removeClass('fixed');
		}
	});
	
	$('.categor-mob__arrow').click(function(event){
		$(this).closest('.categor-mob__item').toggleClass('active');
		return false;
	})

	var swiper = new Swiper('.home_swiper_container', {
    slidesPerView: 1,
    loop: true,
    spaceBetween: 20,
    // effect: "fade",
    speed: 1000,
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev'
	});

	var swiper = new Swiper('.register_swiper_container', {
    slidesPerView: 1,
    loop: true,
    spaceBetween: 20,
    // effect: "fade",
    speed: 1000,
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
	});

	var countVideos = $('.product-video__link').length;
  $('.product-nav li > a[href="#tab-video"]').append(' (' + countVideos + ')');

	$('.product-video__link').click(function(){
  	$('.product-video__link').removeClass('active');
  	$(this).closest('.product-video__link').addClass('active');
		
		var link = $(this).attr('youtube-embed');
    $('.product-video__item').html('<iframe width=\"100%\" height=\"415\" src=\"' + link + '\" frameborder=\"0\" allowfullscreen></iframe>');
	});
	if($('.rotate-cover').length > 0) {
		//$('.rotate-cover').attr('href', '\https://procraft.ua' + $("iframe.threede_view").attr("src") + '\ ');
		$('.rotate-cover').attr('href', $('.rotate-cover').attr("data-rotate") + '\ ');
		$('.threede_view').attr('src', $('.rotate-cover').attr("data-rotate") + '\ ');
	}
});