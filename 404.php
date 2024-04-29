<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetPageProperty("keywords", "Страница не найдена");
$APPLICATION->SetPageProperty("description", "Страница не найдена");
?>
<div class="wrap" style="text-align:center;margin: 150px auto;">
	<h1 style="font-size:42px;">Страница не найдена</h1>
	<p style="max-width: 840px;margin: 0 auto;">Кажется что-то пошло не так! Страница, которую вы запрашиваете не существует. Возможно она устарела,  была удалена или введен неверный адрес в адресной строке.</p>
</div>


<!-- $APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"36000000"
	)
); -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>