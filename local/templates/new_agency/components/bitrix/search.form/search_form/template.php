<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<?php
	$heder_background = (Check_Main_Page() or (!Main_Or_Detail_Page('services') && Check_Page('services')));
?>

<form class="search_form" action="<?=$arResult["FORM_ACTION"]?>">
	<input placeholder="Введите ваш запрос" id="search_input" type="text" style="background: <?= $heder_background? '#1b2265' : '#2a49be'; ?>" name="q" value="" size="15" maxlength="50" />
	<!-- <input name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" /> -->
</form>
