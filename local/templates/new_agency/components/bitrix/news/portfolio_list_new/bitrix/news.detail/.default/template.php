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

//debug($arResult);

$props = $arResult['PROPERTIES'];
//debug($props);
?>

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="/portfolio/">Портфолио</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#"><?= $arResult['NAME']; ?></a>
	</li>
</ul>

<section class="ab_proj wrap">
	<div class="head_line">
		<img alt="<?= $arResult['NAME']; ?>" class="logo" src="<?= \CFile::GetPath($props['COMPANY_LOGO']['VALUE']); ?>">
		<h1 class="proj_title"><?= $props['COMPANY_NAME']['VALUE']; ?></h1>
	</div>

	<div class="line top">
		<div class="about_text column">
			<?= $props['ABOUT_COMPANY_TEXT']['~VALUE']['TEXT']; ?>
		</div>

		<div class="task column">
			<h2 class="sub_title">Задача проекта</h2>
			<div class="about_text">
				<?= $props['PROJECT_TASK']['~VALUE']['TEXT']; ?>
			</div>
		</div>
	</div>

	<div class="line bottom">
		<div class="column review">
			<h2 class="sub_title">Отзыв клиента</h2>
			<div class="photo_name">
				<div class="photo_box">
					<?php $photo = $props['CLIENT_PHOTO']['VALUE']; ?>
					<?php if($photo == ''): ?>
						<img src="<?=SITE_TEMPLATE_PATH?>/img/no-photo.png">
					<?php else: ?>
						<img src="<?= \CFile::GetPath($photo); ?>">
					<?php endif; ?>
				</div>

				<div class="about_pers">
					<?= $props['ABOUT_CLIENT']['~VALUE']['TEXT']; ?>
				</div>
			</div>
			<div class="client_text">
				<?= $props['REVIEW_CLIENT']['~VALUE']['TEXT']; ?>
			</div>
		</div>

		<div class="column">
			<div class="about_instr">
				<h2 class="sub_title">Применяемые инструменты</h2>

				<div class="instr_box">
				<?php foreach ($props['TOOLS']['VALUE'] as $key => $img_id): ?>
					<div class="instr_item">
						<img class="instr_logo" src="<?= \CFile::GetPath($img_id); ?>">
						<div class="instr_text">
							<?= $props['TOOLS']['~DESCRIPTION'][$key]; ?>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>

			<div class="tech">
				<h2 class="sub_title">Применяемые технологии</h2>
				<div class="tech_box">
				<?php foreach ($props['TECH']['VALUE'] as $tech): ?>
					<div class="tech_item"><?= $tech; ?></div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<a href="/portfolio/" class="go_back hide">
		<svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M4.79746 1.3171C4.90972 1.16443 4.96839 0.968061 4.96173 0.767219C4.95507 0.566377 4.88357 0.375857 4.76153 0.233734C4.63948 0.0916119 4.47588 0.00835228 4.30341 0.000595093C4.13095 -0.00716305 3.96232 0.0611525 3.83122 0.191889L0.199273 4.41341C0.07164 4.56293 0 4.76519 0 4.97602C0 5.18684 0.07164 5.3891 0.199273 5.53862L3.83122 9.76813C3.96026 9.91734 4.13492 10.0007 4.31676 10C4.49861 9.99925 4.67275 9.91441 4.80089 9.76414C4.92902 9.61387 5.00064 9.41048 5 9.19871C4.99935 8.98694 4.9265 8.78415 4.79746 8.63494L1.89875 5.25931C1.7617 5.09971 1.7617 4.85232 1.89875 4.7007L4.79746 1.3171Z" fill="#D8D8D8"/>
		</svg>
		<div>Вернуться в портфолио</div>
	</a>
</section>

<section class="spec">
	<div class="wrap">
	<?php foreach ($props['PERFORMERS']['VALUE'] as $pers): ?>
	<?php $arr = explode('%%%', $pers['TEXT']); $len = count($props['PERFORMERS']['VALUE']); ?>
		<div class="spec_item">
			<h2 class="position"><?= $arr[0]; ?></h2>
			<?php for ($i = 1; $i <= $len; $i++): ?>
				<p class="fio"><?= $arr[$i]; ?></p>
			<?php endfor; ?>
		</div>
	<?php endforeach; ?>

	<div class="spec_item date">
		<h2 class="position"><?= 'Дата публикации: '.$props['PUBLISH_DATE']['VALUE']; ?></h2>
		<p class="fio"><?= $props['TERM']['VALUE']; ?></p>
	</div>
	</div>
</section>

<?php /* 
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '')):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif($arResult["DETAIL_TEXT"] <> ''):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>
*/ ?>