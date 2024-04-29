<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?foreach($arResult as $arItem): ?>
<li class="menu-li">
	<a class="<?= $arItem["SELECTED"]?'active_menu_main':null; ?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
</li>
<?endforeach?>

<?endif?>