<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 

$serv = Return_All(
	Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", 
		"!PROPERTY_MOBILE_SUB_SERV_VALUE" => "YES", 
		"!PROPERTY_REKLAME_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_SEO_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_DEV_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_TECH_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_CRM_SUB_SERV_VALUE" => "YES",
		"!PROPERTY_MARKET_SUB_SERV_VALUE" => "YES"
	),
	Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL")
);


$page = $APPLICATION->GetCurPage();
$check_main_page = ($page == '/');

//debug($arResult);
?>

<?if (!empty($arResult)):?>

<?foreach($arResult as $arItem): ?>
<?php 
	$link = $arItem["LINK"];
	$smoth = ($arItem["LINK"][0] == '#');
	if(!$check_main_page and $smoth)
	{
		$link = '/'.$link;
	}
?>

<?php if($link == '/services/'): ?>
<li class="more_items">
	<a class="<?= $arItem["SELECTED"]?'active_menu':null; ?>" href="<?= $link; ?>">
		<?=$arItem["TEXT"]?>
	</a>
	<svg class="arrow_header" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M1 1L6 6L11 1" stroke="white" stroke-linecap="round" stroke-linejoin="round">
		</path>
	</svg>

	<ul class="sub_menu" style="display: none;">
	<?php foreach ($serv as $serv_item): ?>
	<li>
		<a href="<?= $serv_item['DETAIL_PAGE_URL']; ?>">
			<?= $serv_item['NAME']; ?>
		</a>
	</li>
	<?php endforeach; ?>
	</ul>
</li>
<?php else: ?>
<li>
	<a class="
	<?= $arItem["SELECTED"]?'active_menu':null; ?> 
	<?= $smoth?'smoth_link':null; ?>
	" href="<?= $link; ?>">
		<?=$arItem["TEXT"]?>
	</a>
</li>
<?php endif; ?>

<?endforeach?>

<?endif?>

