document.querySelector('#close').addEventListener("click", Hide_PopUp_Order);

$("#pop-up-phone").mask("+7(999) 999-9999");

var body = document.querySelector('body');

function Show_PopUp_Order(title)
{
	document.querySelector('#pop-up-title').innerHTML = title;
	document.querySelector('.send_order').classList.add('show_pop_up_order');
	body.classList.add('overflow');
	Out_Pop_Up_Click();
}

function Hide_PopUp_Order()
{
	document.querySelector('.send_order').classList.remove('show_pop_up_order');

	document.querySelector('#form-content').classList.remove('hide');
	document.querySelector('#succes_order').classList.remove('show');

	body.classList.remove('overflow');
}

document.querySelector('#for_send').addEventListener("click", Send_Order_Pop_Up);

function Send_Order_Pop_Up(event)
{
	event.preventDefault();
	var err=0;
	var arr = ['#pop-up-name',
	'#pop-up-phone'
	];

	err = Validate(arr,'#pop-up-phone','#footer-form-email');

	if (err == 0)
	{
		$.ajax({
			type: "POST",
			url: '/local/templates/new_agency/php/all_popup/send_order_ajax.php',
			data: {
				'name': $("#pop-up-name").val(),
				'phone': $("#pop-up-phone").val(),
				'popup-title': $("#form-separator").val()
			},
			dataType: "json",
			success: function(data){

				if (data.status == true)
				{
					$("#pop-up-name").val('');
					$("#pop-up-phone").val('');

					$("#form-content").addClass("hide");
					$("#succes_order").addClass("show");
				}
			}
		});
	}
}

/*клик вне попапа закрывает его*/
function Out_Pop_Up_Click()
{
	document.onclick = function (e) {
	    if (e.target.className == "send_order show_pop_up_order")
	    {
	    	Hide_PopUp_Order();
	    }
	};
}
/*клик вне попапа закрывает его*/
