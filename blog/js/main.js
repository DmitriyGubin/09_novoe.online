// window.scrollBy({
// 		top: 1,
// 		left: 0,
// 		behavior: 'smooth'
// 	});


var counter = 0;
var delta;

BX.addCustomEvent('onAjaxSuccess', function() 
{
	var pos_y = document.querySelector('.delimeter-header').getBoundingClientRect().top;
	counter++;

	if((counter % 2) == 1)
	{
		delta = 1;
	}
	else
	{
		delta = -1;
	}
	
	window.scrollBy({
		top: pos_y + delta,
		left: 0,
		behavior: 'smooth'
	});

	// document.querySelector('header').scrollIntoView({
	//             behavior: 'smooth',
	//             block: 'start'
	//         });
});