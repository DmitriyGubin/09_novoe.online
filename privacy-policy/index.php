<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Согласие на автоматизированную обработку персональных данных в соответствии со следующим перечнем: фамилия, имя и условия заказа в случае заполнения любых форм на сайте.");
$APPLICATION->SetTitle("Политика конфиденциальности");

$text = Return_All(
	Array("IBLOCK_ID"=>18, "ACTIVE"=>"Y", "ID"=>162),
	Array("ID", "IBLOCK_ID", "NAME","PREVIEW_TEXT")
);

//debug($text);
?>

<link rel="stylesheet" type="text/css" href="style.css">

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Политика конфиденциальности</a>
	</li>
</ul>

<section class="wrap politic no-section">
	<h1 class="main-title">Политика в отношении обработки персональных данных </h1>
	<div class="all_text">
		<?= $text[0]['~PREVIEW_TEXT']; ?>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>