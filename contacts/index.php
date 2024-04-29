<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контакты - Новое агентство");
$APPLICATION->SetPageProperty("keywords_inner", "Контакты digital-студии \"Новое агентство\"");
$APPLICATION->SetPageProperty("keywords", "Контакты digital-студии \"Новое агентство\"");
$APPLICATION->SetPageProperty("description", "Оставить заявку на обсуждение проекта можно на сайте. Связаться с нами можно в соцсетях, мессенджерах или по телефону: +7 (383) 207-57-29");
$APPLICATION->SetTitle("Контакты digital-студии \"Новое агентство\"");

$map_contacts = Return_All(
		Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", 
			"PROPERTY_PHONE",
			"PROPERTY_ADDRESS",
			"PROPERTY_LATITUDE",
			"PROPERTY_LONGITUDE",
			"PROPERTY_EMAIL",
			"PROPERTY_MAP_SIGNATURE",
			"PROPERTY_PHONE_TWO"
		)
);

//debug($map_contacts);
?>

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Контакты</a>
	</li>
</ul>

<div style="display: none;">
	<div id="lat"><?= $map_contacts[0]['PROPERTY_LATITUDE_VALUE']; ?></div>
	<div id="long"><?= $map_contacts[0]['PROPERTY_LONGITUDE_VALUE']; ?></div>
	<div id="address"><?= $map_contacts[0]['PROPERTY_ADDRESS_VALUE']; ?></div>
</div>

<link href="css/styles.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">

<section class="contacts wrap no-section">
	<h1 class="main-title">Контакты</h1>

	<div class="contacts-line">
		<div class="contacts-item adr">
			<img alt="Адрес" src="<?= SITE_TEMPLATE_PATH.'/img/map_point.svg'; ?>">
			<p class="adress"><?= $map_contacts[0]['PROPERTY_ADDRESS_VALUE']; ?></p>
		</div>

		<div class="contacts-item">
			<img alt="Электронная почта" src="<?= SITE_TEMPLATE_PATH.'/img/mail_black.svg'; ?>">
			<?php $mail = $map_contacts[0]['PROPERTY_EMAIL_VALUE']; ?>
			<a href="<?= 'mailto:'.$mail; ?>">
				<?= $mail; ?>
			</a>
		</div>

		<div class="contacts-item">
			<img alt="Телефон" src="<?= SITE_TEMPLATE_PATH.'/img/phone_black.svg'; ?>">
			<?php $phone = $map_contacts[0]['PROPERTY_PHONE_VALUE']; ?>
			<a href="<?= 'tel:'.$phone; ?>"><?= Phone_Converter($phone,' '); ?></a>
		</div>

		<div class="contacts-item">
			<img alt="Телефон" src="<?= SITE_TEMPLATE_PATH.'/img/phone_black.svg'; ?>">
			<?php $phone_two = $map_contacts[0]['PROPERTY_PHONE_TWO_VALUE']; ?>
			<a href="<?= 'tel:'.$phone_two; ?>"><?= Phone_Converter($phone_two,' '); ?></a>
		</div>
	</div>

	<div id="map">
		<div class="loader"></div>
	</div>

	<div class="contacts-text">
		<?= $map_contacts[0]['~PROPERTY_MAP_SIGNATURE_VALUE']['TEXT']; ?>
	</div>
</section>

<script src="https://api-maps.yandex.ru/2.1/?apikey=e5df13fe-7b6a-4037-9699-cddff13aa624&amp;lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript" src="js/map.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>