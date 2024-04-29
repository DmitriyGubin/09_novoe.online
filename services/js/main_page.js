var banner_text = document.querySelector('.top-banner-all-text');
banner_text.classList.remove('uprise');

if(screen.width < 750)
{
	$('.areas_slider').slick({
		dots: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: '<div class="prev-photo"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 0.999999L2 9L10 17" stroke="white" stroke-width="1.6" stroke-linecap="round"/></svg></div>',
		nextArrow: '<div class="next-photo"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17L9 9L1 0.999999" stroke="white" stroke-width="1.6" stroke-linecap="round"/></svg></div>'
	});
}