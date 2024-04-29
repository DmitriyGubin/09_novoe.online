/**********Подменю**********/

var menu_points_one = document.querySelectorAll('.site_map .more_items');

Tab_Hard_Menu(menu_points_one);

function Tab_Hard_Menu(submenu_selector)
{
	for (let item of submenu_selector)
	{
		let sub_menu = item.querySelector('.sub_menu');
		let arrow = item.querySelector('.arrow_header');

		item.addEventListener('click',function(event){
			event.stopPropagation();
			$(sub_menu).slideToggle(500);
			arrow.classList.toggle('active');
		});
	}
}

/**********Подменю**********/




