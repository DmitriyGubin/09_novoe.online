// var this_url = document.location.href;
// if (this_url.indexOf('/about/') != -1)
$("#footer-form-phone").mask("+7(999) 999-9999");

document.querySelector('#phone-order-footer').addEventListener("click", function(){
	document.querySelector('#form-separator').value = 'Заказать звонок футер';
	Show_PopUp_Order("Заказать звонок");
});

document.querySelector('#send_order_header').addEventListener("click", function(){
	document.querySelector('#form-separator').value = 'Оставить заявку хидер';
	Show_PopUp_Order("Оставить заявку");
});//

document.querySelector('#send_order_header_mobile').addEventListener("click", function(){
	document.querySelector('#form-separator').value = 'Оставить заявку хидер';
	Show_PopUp_Order("Оставить заявку");
});//

document.querySelector('#footer-form').addEventListener("click", Send_Footer_Form);

function Send_Footer_Form(event)
{
	event.preventDefault();
	var err=0;
	var arr = ['#footer-form-name',
	'#footer-form-phone',
	'#footer-form-email'
	];

	err = Validate(arr,'#footer-form-phone','#footer-form-email');

	if (err == 0)
	{
		$.ajax({
			type: "POST",
			url: '/local/templates/new_agency/php/header_footer/send_order_ajax.php',
			data: {
				'name': $("#footer-form-name").val(),
				'phone': $("#footer-form-phone").val(),
				'email': $("#footer-form-email").val(),
				'popup-title': 'Связаться с нами, форма футера'
			},
			dataType: "json",
			success: function(data){

				if (data.status == true)
				{
					$("#footer-form-name").val('');
					$("#footer-form-phone").val('');
					$("#footer-form-email").val('');

					Show_PopUp_Order('');
					$("#form-content").addClass("hide");
					$("#succes_order").addClass("show");
				}
			}
		});
	}
}

function Validate(arr,phone_id,email_id)
{
	var err=0;
	var pattern = /\S+@\S+\.\S+/;//для валидации почты регулярка

	for (let item of arr)
	{
		var bool;

		if(item == phone_id)
		{
			bool = (($(item).val()).length != 16);
		}
		else if(item == email_id)
		{
			bool = ( !pattern.test($(item).val()) ) && ( $(item).val() != '' );
		}
		else 
		{
			bool = ($(item).val() == '');
		}

		if (bool)
		{
			err++;
			$(item).addClass("hasError");
		} 
		else 
		{
			$(item).removeClass("hasError");
		}
	}

	return err;
}

/***Плавное появление блоков****/

var this_url = document.location.href;
//var bool = (this_url.indexOf('PAGEN') == -1);

window.scrollBy({
	top: 10,
	left: 0,
	behavior: 'smooth'
});

window.addEventListener('scroll', Scroll);

function Scroll()
{
	var elements = document.querySelectorAll(".no-section");

	if(elements.length != 0)
	{
		for (let item of elements)
		{
			let offset = item.getBoundingClientRect().top - document.documentElement.clientHeight;
			if (offset < 0)
			{
				item.classList.remove('no-section');
			}
		}
	}
}
/***Плавное появление блоков****/


/*******************это для главной страницы чтоб перебивало скрол***************/
var test_sel = document.querySelectorAll('.heatmap .top-slider');
if(test_sel.length != 0)
{
	var this_url = document.location.href;
	var prev_url = document.referrer;

	if ((this_url.indexOf('PAGEN') != -1) || (prev_url.indexOf('PAGEN') != -1))
	{
	    document.querySelector('.blog .main-title').scrollIntoView({
	        behavior: 'smooth',
	        block: 'start'
	    });
	}
}

/*******************это для главной страницы чтоб перебивало скрол***************/


/*************табы футер***************/

if(screen.width < 750)
{
	var tab_boxes = document.querySelectorAll('footer .dev-box');
	for(let item of tab_boxes)
	{
		let button = item.querySelector('.tab-butt');
		let var_box = item.querySelector('.tab-box');
		let arrow = item.querySelector('.arrow-footer');

		button.addEventListener('click', function(){
			$(var_box).slideToggle(500);
			arrow.classList.toggle('active');
		});
	}
}


/*************табы футер***************/

/******мобильное меню*******/
var mobile_burger = document.querySelector(".header .mobile-burger");
var mobile_menu = document.querySelector(".header .menu");
var mobile_shade = document.querySelector(".header .mobile_shade");
var body = document.querySelector("body");

mobile_burger.addEventListener('click', Toggle_Mobile_Menu);
mobile_shade.addEventListener('click', Toggle_Mobile_Menu);

function Toggle_Mobile_Menu()
{
	mobile_menu.classList.toggle('active');
	body.classList.toggle('overflow');
	$(mobile_shade).fadeToggle(300);
	mobile_burger.classList.toggle('active');
}
/******мобильное меню*******/

/**********Подменю**********/
var menu_points = document.querySelectorAll('.header .more_items');

if(screen.width > 1000)
{
	for (let item of menu_points)
	{
		let sub_menu = item.querySelector('.sub_menu');
		let arrow = item.querySelector('.arrow_header');

		item.addEventListener('mouseover',function(){
			sub_menu.classList.add('show');
			arrow.classList.add('active');
		});

		item.addEventListener('mouseout',function(){
			sub_menu.classList.remove('show');
			arrow.classList.remove('active');
		});
	}
}
else
{
	for (let item of menu_points)
	{
		let sub_menu = item.querySelector('.sub_menu');
		let arrow = item.querySelector('.arrow_header');

		item.addEventListener('click',function(){
			$(sub_menu).slideToggle(500);
			arrow.classList.toggle('active');
		});
	}
}
/**********Подменю**********/


/**********Поиск по сайту**************/
var all_header = document.querySelector('.header .wrap.all_head');
var inp_box = document.querySelector('.header .wrap.inp_box');

document.querySelector('.header #head_loop').addEventListener("click", Toggle_Search);
document.querySelector('.header #inp_box_cross').addEventListener("click", Toggle_Search);

function Toggle_Search()
{
	all_header.classList.toggle('hide');
	inp_box.classList.toggle('hide');
}

var form = document.querySelector('.header .search_form');

document.querySelector('.header #inp_box_loopa').addEventListener("click", function(){
	form.submit();
});

/**********Поиск по сайту**************/
