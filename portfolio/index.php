<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");

$pagee = $APPLICATION->GetCurPage();
$tegs_arr = Return_All(
	Array("IBLOCK_ID"=>27, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "CODE")
);

/***редирект на get параметр*****/
//header('Location: /test/');

foreach ($tegs_arr as $teg_item) 
{
	if(strpos($pagee, '/'.$teg_item['CODE']) != false)
	{
		$new_url = str_replace($teg_item['CODE'].'/', '?type='.$teg_item['CODE'], $pagee);
		header('Location: '.$new_url);
		exit();
	}
}
/***редирект на get параметр*****/


$tag_name = $_GET['type'];
$tag_id = '';
$tag_name_rus = '';

if($tag_name != '')
{
	foreach ($tegs_arr as $value) 
	{
		if($value['CODE'] == $tag_name)
		{
			$tag_id = $value['ID'];
			$tag_name_rus = $value['NAME'];
			break;
		}
	}
}

$arrFilter=array("PROPERTY_PORT_TAGS"=>$tag_id);

$sect_name_rus = '';
if($pagee != '/portfolio/')
{
	$sect = Return_All_Sections(
		Array("IBLOCK_ID"=>25, "ACTIVE"=>"Y"),
		Array()
	);

	foreach ($sect as $sect_item) 
	{
		if($sect_item['SECTION_PAGE_URL'] == $pagee)
		{
			$sect_name_rus = $sect_item['NAME'];
			break;
		}
	}
}

$title = '';
if(($sect_name_rus != '') and ($tag_name_rus != ''))
{
	$title = $sect_name_rus.' || '.$tag_name_rus;
}
elseif($sect_name_rus != '')
{
	$title = $sect_name_rus;
}
elseif($tag_name_rus != '')
{
	$title = $tag_name_rus;
}

$GLOBALS['h_one_tag'] = '';


if($title != '')
{
	$GLOBALS['h_one_tag'] = str_replace(' || ', ', ', $title);
	$APPLICATION->SetPageProperty("title", $title);
}
else
{
	$APPLICATION->SetPageProperty("title", 'Портфолио');
}


?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"portfolio_list_new", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
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
			0 => "ABOUT_COMPANY_TEXT",
			1 => "ABOUT_CLIENT",
			2 => "REVIEW_CLIENT",
			3 => "PROJECT_TASK",
			4 => "TECH",
			5 => "PERFORMERS",
			6 => "PUBLISH_DATE",
			7 => "TERM",
			8 => "COMPANY_NAME",
			9 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "25",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "BACK_COLOR",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "12",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main-pagination",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/portfolio/",
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
		"COMPONENT_TEMPLATE" => "portfolio_list_new",
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
			"section" => "#SECTION_CODE_PATH#/",
			"detail" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		)
	),
	false
);?>

<?php  

if($title != '')
{
	$APPLICATION->SetPageProperty("description", $GLOBALS['h_one_tag']);
}

?>

<script type="text/javascript" src="/portfolio/script.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>