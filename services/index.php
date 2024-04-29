<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Услуги digital-студии “Новое агентство”");
// $APPLICATION->SetPageProperty("description", "Диджитал-студия полного цикла “Новое агентство”. Предоставляем услуги: внедрения сквозной аналитики, разработки сайтов и мобильных приложений, seo-оптимизации, контекстной/таргетированной рекламы, внедрения CRM и другие. Работаем в более чем 30 нишах. Звоните: +7(383) 207 57 29");

$APPLICATION->SetPageProperty("description", "Диджитал-студия полного цикла “Новое агентство”. Предоставляем услуги: внедрения сквозной аналитики, разработки сайтов и мобильных приложений, seo-оптимизации, контекстной/таргетированной рекламы, внедрения CRM и другие. Работаем в более чем 30 нишах. Звоните: +7(383) 207 57 29");
$APPLICATION->SetTitle("Услуги digital-студии \"Новое агентство\"");

?>

<?php if(Main_Or_Detail_Page('services')): ?>
<link href="css/styles.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">

<link href="<?=SITE_TEMPLATE_PATH?>/libraries/css/slick.css" rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/libraries/css/slick-theme.css" rel="stylesheet">

<section class="top-banner">
	<div class="wrap">
		<div class="top-banner-all-text uprise">
			<p class="banner-title">
				Digital-студия полного цикла “Новое агентство”
			</p>
			<p class="banner-text">
				Создаем мобильные приложения, сайты и приводим бизнесу клиентов с помощью контекстной рекламы и SEO-продвижения.
			</p>
		</div>
	</div>
</section>

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Услуги</a>
	</li>
</ul>
<?php endif; ?>

<?
	$arrFilter=array("!PROPERTY_MOBILE_SUB_SERV_VALUE" => "YES", 
		"!PROPERTY_REKLAME_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_SEO_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_DEV_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_TECH_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_CRM_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_MARKET_SUB_SERV_VALUE" => "YES"
	);
?>

<!-- Услуги -->
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"services", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "TOP_BANNER_TITLE",
			1 => "TOP_BANNER_DESCR",
			2 => "TABS",
			3 => "TITLE_SERV_TEXT",
			4 => "PRICES_BLOCK_TITLE",
			5 => "UNDER_BANNER_TEXT",
			6 => "WORKS_TITLE",
			7 => "WORKS_STAGES",
			8 => "WORKS_TEXT",
			9 => "STAGES_REFF",
			10 => "PRICES_BLOCKS",
			11 => "SHOW_SUB_SERV",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main-pagination",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/services/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "services",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<!-- Услуги -->

<?php if(Main_Or_Detail_Page('services')): ?>
<?php 
	$areas = Return_All(
		Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE")
	);
?>

<section class="areas wrap no-section">
	<h2 class="main-title">С какими нишами мы работаем?</h2>
	<div class="areas-descr">
		Специалисты digital-студии «Новое агентство» настраивают рекламу и создают сайты/приложения более чем в 30 нишах, благодаря этому у нас есть возможность продвигать проекты в любой сфере бизнеса:
	</div>

		<div class="areas-box areas_slider">
		<?php foreach ($areas as $area_item): ?>
		<?php $name = $area_item['NAME']; ?>
		<div class="areas_slide">
			<div class="areas-item">
			<?php $img = $area_item['PREVIEW_PICTURE'];  ?>
			<?php if($img == ''): ?>
				<img title="<?= $name; ?>" alt="<?= $name; ?>" src="<?= SITE_TEMPLATE_PATH; ?>/img/no-photo.png">
			<?php else: ?>
				<img title="<?= $name; ?>" alt="<?= $name; ?>" src="<?= \CFile::GetPath($img); ?>">
			<?php endif; ?>
				<p class="areas-text"><?= $name; ?></p>
			</div>
		</div>
		<?php endforeach; ?>
		</div>
</section>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/libraries/js/slick.min.js"></script>
<script type="text/javascript" src="js/main_page.js"></script>
<?php endif; ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>