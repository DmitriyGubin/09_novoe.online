var lat = document.querySelector("#lat").innerHTML;
var long = document.querySelector("#long").innerHTML;
var address = document.querySelector("#address").innerHTML;

ymaps.ready(init);

function init () 
{
			var myMap = new ymaps.Map("map", {
				center: [lat,long],
				zoom: 15,
				controls: [],//без элементов управления
			}, {
				searchControlProvider: 'yandex#search'
			}),
    // Создание макета содержимого хинта.
    // Макет создается через фабрику макетов с помощью текстового шаблона.
    HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
    	"{{ properties.address }}" +
    	"</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                	var el = this.getElement(),
                	result = null;
                	if (el) {
                		var firstChild = el.firstChild;
                		result = new ymaps.shape.Rectangle(
                			new ymaps.geometry.pixel.Rectangle([
                				[0, 0],
                				[firstChild.offsetWidth, firstChild.offsetHeight]
                				])
                			);
                	}
                	return result;
                }
            }
            );

//https://yandex.ru/dev/maps/jsbox/2.1/icon_customImage

    function Add_point(x, y, adress)
    {
        var myPlacemark = new ymaps.Placemark([x, y], 
        { 
            iconContent: '',
            balloonContent: '<p class="ballon-title">' + adress + '</p>'
        },
        {  
            iconLayout: 'default#imageWithContent',
            iconImageHref: 'img/map-point.png',
            iconImageSize: [26, 36],
            iconImageOffset: [-13, -18],
            iconContentOffset: [0, 0]
        });
        myMap.geoObjects.add(myPlacemark);
    }

    Add_point(lat,long,address);
    //myMap.setCenter([55.048513, 82.911446], 15);
}





