var banner_text = document.querySelector('.top-banner-all-text');
banner_text.classList.remove('uprise');

/**табы**/
var elements = document.querySelectorAll('.questions .quest-tab');
for (let item of elements)
{
    item.addEventListener("click", function(){
        item.querySelector('.tab-item').classList.toggle('no-height');
        item.querySelector('.arrow').classList.toggle('rotate-in');
        item.querySelector('.arrow').classList.toggle('rotate-out');
    });
}
/**табы**/

/*******чекбокс**************/
document.querySelector('.quest-form .checkbox-text').addEventListener("click", function(){
    this.querySelector('.galka').classList.toggle('hide');
});

/************Кнопка смотреть все***********/
Show_All_Items(4, '#more-info-button-parent', '.examples .examples-item', 'hide');

function Show_All_Items(number_initially_visible, selector_button_parent, selector_item, hide_class)
{
	var items = document.querySelectorAll(selector_item);
    var amount = items.length;
    if(amount != 0)
    {
        if (amount  > number_initially_visible)
        {
            var j = 0;
            for (let item of items)
            {
                j++;
                if(j > number_initially_visible)
                {
                    item.classList.add(hide_class);
                }
            }

            var parent = document.querySelector(selector_button_parent);
            let button = document.createElement('button');
            button.id = 'examples-more-info';
            button.innerHTML = 'Смотреть все';
            parent.appendChild(button);

            button.addEventListener('click', function (){
                for (let item of items)
                {
                    item.classList.remove(hide_class);
                }
                button.remove();
            });
        }
    }
}
/************Кнопка смотреть все***********/

/*******Попапы*********/
$("#quest-form-phone").mask("+7(999) 999-9999");

document.querySelector('#tob-ban-order').addEventListener("click", function(){
    document.querySelector('#form-separator').value = 'Верхний баннер, детальная страница услуг';
    Show_PopUp_Order("Оставить заявку");
});

document.querySelector('#fixed-price').addEventListener("click", function(){
    document.querySelector('#form-separator').value = 'Левый блок стоимости пакетов, детальная страница услуг';
    Show_PopUp_Order("Оставить заявку");
});

document.querySelector('#time-and-material').addEventListener("click", function(){
    document.querySelector('#form-separator').value = 'Правый блок стоимости пакетов, детальная страница услуг';
    Show_PopUp_Order("Оставить заявку");
});

document.querySelector('#quest-form-button').addEventListener("click", Discuss_Project_Form);

function Discuss_Project_Form(event)
{
    event.preventDefault();
    var err=0;
    var arr = ['#quest-form-name',
    '#quest-form-phone'
    ];

    var err = Validate(arr,'#quest-form-phone','');

    var check_galka = Validate_Galka(".my-checkbox .galka", ".my-checkbox-descr", "hide");

    if ((err == 0) && check_galka)
    {
        $.ajax({
            type: "POST",
            url: '/local/templates/new_agency/php/main_page/send_order_ajax.php',
            data: {
                'name': $("#quest-form-name").val(),
                'phone': $("#quest-form-phone").val(),
                'question': $("#quest-form-question").val(),
                'popup-title': 'Обсудим ваш проект, детальная страница услуг'
            },
            dataType: "json",
            success: function(data){

                if (data.status == true)
                {
                    $("#quest-form-name").val('');
                    $("#quest-form-phone").val('');
                    $("#quest-form-question").val('');

                    Show_PopUp_Order('');
                    $("#form-content").addClass("hide");
                    $("#succes_order").addClass("show");
                    $(".my-checkbox .galka").addClass("hide");
                }
            }
        });
    }
}

function Validate_Galka(galka_selektor, text_selektor, hide_class)
{
  var galka = document.querySelector(galka_selektor);
  var text = document.querySelector(text_selektor);
  if(galka.classList.contains(hide_class))
  {
    text.classList.add('red-text');
    return false;
  }
  else
  {
    text.classList.remove('red-text');
    return true;
  }
}


