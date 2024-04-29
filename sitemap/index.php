<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Перечень разделов сайта “Новое агентство”: услуги (разработка сайта, интернет-реклама, поддержка сайта, дизайн); компания (блог, контакты, услуги, аутстаффинг разработчиков); написать нам: Telegram, Whats App.");
$APPLICATION->SetTitle("Карта сайта");
?>

<link rel="stylesheet" type="text/css" href="styles.css">

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Карта сайта</a>
	</li>
</ul>

<section class="wrap site_map no-section">
	<h1 class="main-title">Карта сайта</h1>

	<?$APPLICATION->IncludeComponent("bitrix:menu", "site_map", Array(
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
			"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"MAX_LEVEL" => "1",	// Уровень вложенности меню
			"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_TYPE" => "N",	// Тип кеширования
			"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
			"ROOT_MENU_TYPE" => "site_map",	// Тип меню для первого уровня
			"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
			"COMPONENT_TEMPLATE" => "main_header"
		),
		false
	);?>
</section>

<script type="text/javascript" src="main.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>