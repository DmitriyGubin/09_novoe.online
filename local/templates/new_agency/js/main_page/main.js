/*******чекбокс**************/
document.querySelector('.quest-form .checkbox-text').addEventListener("click", function(){
    this.querySelector('.galka').classList.toggle('hide');
});
/*******чекбокс**************/


/************Кнопка смотреть все блог***********/
var this_url = document.location.href;

if (this_url.indexOf('PAGEN') == -1)
{
    Show_All_Items(2, '.more-items-blog-box', '.blog-item', 'hide');
}

function Show_All_Items(number_initially_visible, selector_button_parent, selector_item, hide_class)
{
	//Проверка существования пагинации
	var pages = document.querySelectorAll('.modern-page-navigation');
	var bool_pages = (pages.length != 0);
	//Проверка существования пагинации
	
	if(bool_pages)
	{
       document.querySelector(".modern-page-navigation").classList.add(hide_class);
   }
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
        button.id = 'more-items-blog';
        button.innerHTML = 'Смотреть все';
        parent.appendChild(button);

        button.addEventListener('click', function (){
            for (let item of items)
            {
                item.classList.remove(hide_class);
            }
            button.remove();
            if(bool_pages)
            {
               document.querySelector(".modern-page-navigation").classList.remove(hide_class);
           }
       });
    }
}
}

/************Кнопка смотреть все блог***********/

/**************форма*******************/
$("#quest-form-phone").mask("+7(999) 999-9999");

document.querySelector('#quest-form-button').addEventListener("click", Send_Quest_Form);

function Send_Quest_Form(event)
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
                'popup-title': 'Остались вопросы, главная страница'
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

/**************форма*******************/

// $('.top-slider').slick({
// });

let slider = document.querySelector('.top-banner .top-slider');
slider.classList.remove('uprise');

/*********Тепловая рисовалка**************/
var heatmapContainer = document.querySelector('.heatmap');

var heatmapInstance = h337.create({
    container: heatmapContainer,
    maxOpacity: 0.9,
    radius: 30
});

var timeout;

//Поправка
// var el = document.querySelector('.heatmap-canvas');
// el.width = parseInt(getComputedStyle(heatmapContainer).width);
//Поправка

if (screen.width < 770)//интенсивность растворения следа
{
  var delta_int = 0.1;
}
else
{
  var delta_int = 0.005;
}

function ClearAll()
{
    //heatmapInstance.setData({data:[]});

    let promise = new Promise(function(resolve) {
        var val_item = 0.5;//начальное значение интенсивности
        var delta = delta_int;//уменьшение интенсивности при каждой истерации
        var iters = Math.floor(val_item/delta);

        for (let i = 1; i <= iters; i++)
        {
        setTimeout(function timer() {
          ////////////////////////////////////////////////////////////////////
           let old_data = heatmapInstance.getData().data;
           let new_data = [];
           let j = 0;

           val_item = val_item - delta;

           if(i == iters)
           {
              resolve(heatmapInstance); // завершаем промис
           }

          for(let item of old_data)
          {
            new_data[j] = 
            {
              "x": item.x,
              "y": item.y,
              "radius": item.radius,
              "value": val_item
            };
            j++;
          }

        heatmapInstance.setData( {min: 0, max: 1, data: new_data} );
        ////////////////////////////////////////////////////////////////////
        }, 1000);//timeout
        }
    });

    promise.then(function(heatmapInstance) {
        // console.log(777);

        heatmapInstance.setData({min: 0, max: 1, data: []});
    });
}

var delta_y = 0;
if (screen.width < 770)
{
  delta_y = 65;
}

heatmapContainer.onmousemove = heatmapContainer.ontouchmove = function(e) {

// we need preventDefault for the touchmove
//e.preventDefault();

clearTimeout(timeout);
timeout = setTimeout(ClearAll, 2000);


var x = e.layerX;
var y = e.layerY;
if (e.touches) 
{
    x = e.touches[0].pageX;
    y = e.touches[0].pageY - delta_y;
}

heatmapInstance.addData({ x: x, y: y, value: 0.5 });

};



/*********Тепловая рисовалка**************/

// if(screen.width > 1000)
// {
//   $('.tech-slider').slick({
//       dots: true,
//       infinite: true,
//       slidesToShow: 3,
//       slidesToScroll: 3,
//       arrows : false
//   });
// }
// else if(screen.width > 750)
// {
//   $('.tech-slider').slick({
//       dots: true,
//       infinite: true,
//       slidesToShow: 2,
//       slidesToScroll: 2,
//       arrows : false
//   });
// }
// else
// {
//   $('.tech-slider').slick({
//       dots: true,
//       infinite: true,
//       slidesToShow: 1,
//       slidesToScroll: 1,
//       arrows : false
//   });
// }


/********скроллинг*********/

var mobile_burger = document.querySelector(".header .mobile-burger");
var mobile_menu = document.querySelector(".header .menu");
var mobile_shade = document.querySelector(".header .mobile_shade");
var body = document.querySelector("body");

function Toggle_Mobile_Menu()
{
  mobile_menu.classList.toggle('active');
  body.classList.toggle('overflow');
  $(mobile_shade).fadeToggle(300);
  mobile_burger.classList.toggle('active');
}

Scroll_to_elements('.smoth_link');

function Scroll_to_elements(selector)
{
  var smoothLinks = document.querySelectorAll(selector);

  for (let item of smoothLinks)
  {
    item.addEventListener('click', function (e) 
      {
        if(mobile_menu.classList.contains('active'))
        {
          Toggle_Mobile_Menu();
        }
        
          e.preventDefault();
          var id = item.getAttribute('href');

          document.querySelector(id).scrollIntoView({
              behavior: 'smooth',
              block: 'start'
          });
      });
  }
}

/********скроллинг*********/ 

