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
$this->setFrameMode(true);

//debug($arResult["ITEMS"]);

$sect = Return_All_Sections(
	Array("IBLOCK_ID"=>25, "ACTIVE"=>"Y"),
	Array()
);

$page = $APPLICATION->GetCurPage();

$get_type = $_GET['type'];
//debug($sect);

$tegs_arr = Return_All(
	Array("IBLOCK_ID"=>27, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "CODE")
);

?>



<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Портфолио</a>
	</li>
</ul>

<?php 
	$h_one = $GLOBALS['h_one_tag'];
?>

<section class="porfolio wrap">
	<div class="title_line">
		<h1 class="main-title"><?= ($h_one == '') ? 'Портфолио' : $h_one; ?></h1>
		<div class="cat_box">
			<div class="tegs_box">
			<?php foreach ($tegs_arr as $tag_item): ?>
			<?php
				$tag_code = $tag_item['CODE'];
				$url = $page.$tag_code.'/'; 
			?>
				<a href="<?= $url; ?>" class="teg_item <?= ($tag_code==$get_type)?'active':null; ?>">
					<?= '#'.$tag_item['NAME']; ?>	
				</a>
			<?php endforeach; ?>
			</div>

			<div class="butt_box">
				<!-- <button id="more_tags">
					<div class="more_name">Показать еще</div>
					<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M13 18L13 6M13 18L8 12.8571M13 18L18 12.8571" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button> -->
			</div>	

			<div class="cat_box_wrap">
				<?php 
					$bool_page = (($page == '/portfolio/') and ($get_type == ''));
				?>
				<a href="/portfolio/" class="cat_item <?= $bool_page ? 'active':null; ?>">Все</a>
				<?php foreach ($sect as $sect_item): ?>
				<?php
					$sect_page_url = $sect_item['SECTION_PAGE_URL'];
					if($get_type == '')
					{
						$url = $sect_page_url;
					}
					else
					{
						$url = $sect_page_url.$get_type.'/';
					}
				?>
					<a href="<?= $url; ?>" class="cat_item <?= ($sect_page_url==$page)?'active':null; ?>">
						<?= $sect_item['NAME'] ?>	
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div class="proj_box">
	<?php foreach($arResult["ITEMS"] as $arItem): ?>
		<!-- <a target="_blank" href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="proj_item"> -->
		<a class="proj_item" style="background: <?= $arItem['PROPERTIES']['BACK_COLOR']['VALUE']; ?>">
			<img title="<?=$arItem['NAME']?>" alt="<?=$arItem['NAME']?>" class="proj_img" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
			<div class="site_name">
				<?= $arItem['NAME']; ?>
			</div>
		</a>
	<?php endforeach; ?>
	</div>
</section>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

<?php /* 
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
			<?else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
	</p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
*/?>
