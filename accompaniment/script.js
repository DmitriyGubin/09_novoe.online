 $(".convoy .inp_phone").mask("+7(999) 999-9999");

// document.querySelector('.convoy .call_order').addEventListener("click", function(){
// 	document.querySelector('#form-separator').value = 'Оставить заявку хидер';
// 	Show_PopUp_Order("Заказать звонок");
// });

document.querySelector('.order_form #send_form').addEventListener("click", Send_Form);

function Send_Form(event)
{
	event.preventDefault();
	var err=0;
	var arr = ['#form_name',
	'#form_phone'
	];

	err = Validate(arr,'#form_phone','');

	if (err == 0)
	{
		$.ajax({
			type: "POST",
			url: '/local/templates/new_agency/php/all_site/send_order_ajax.php',
			data: {
				'name': $("#form_name").val(),
				'phone': $("#form_phone").val(),
				'delimeter': 'Услуги по сопровождению'
			},
			dataType: "json",
			success: function(data){

				if (data.status == true)
				{
					$("#form_name").val('');
					$("#form_phone").val('');
					
					Show_PopUp_Order('');
					$("#form-content").addClass("hide");
					$("#succes_order").addClass("show");
				}
			}
		});
	}
}

// copy
var str = document.querySelector("#animatee").innerText;
var str_len = str.length - 1;
var result = '';
for (var i = 0; i <= str_len; i++) 
{
	let letter = `<span class="hide_letter">${str[i]+'|'}</span>`;

	result = result + letter;
}
document.querySelector("#animatee").innerHTML = result;
		// copy

		var letters = document.querySelectorAll('#animatee .hide_letter');
		var delta_in = 150;
		var delta_out = 50;

		function In_Out()
		{
			var time = 0;
			//туда
			for(let item of letters)
			{
				time = time + delta_in;
				setTimeout(function() {
					item.classList.remove('hide_letter');
					
					setTimeout(function(){
						item.innerHTML = (item.innerHTML).replace('|', '');
					}, 100);
				}, time);
			}

			//обратно
			setTimeout(function() {

				time_back = letters.length*delta_out;

				for(let item of letters)
				{
					setTimeout(function() {
						
						item.innerHTML = item.innerHTML + '|';
						setTimeout(function(){
							item.classList.add('hide_letter');
						}, 100);

					}, time_back);
					time_back = time_back - delta_out;
				}

			}, letters.length*delta_in);
		}

		var len = letters.length;
		var all = len*delta_in + len*delta_out;

		In_Out();

		setInterval(function() {
			In_Out();
		}, all);