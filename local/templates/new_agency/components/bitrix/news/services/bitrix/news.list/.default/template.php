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
?>

<section class="services wrap no-section">
	<h1 class="main-title">Услуги</h1>
	<div class="services-box">
	<?php foreach ($arResult["ITEMS"] as $arItem): ?>
	<?php $name = $arItem['NAME']; ?>
		<a target="_blank" href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="services-item">
			<div class="img-text">
				<img title="<?= $name; ?>" alt="<?= $name; ?>" class="services-img" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
				<div class="services-title">
					<?= $name; ?>
				</div>
			</div>

			<svg class="arrow" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m15.1956 17.7007c.387.394 1.0202.3997 1.4142.0127l5.0909-5c.1915-.188.2993-.4451.2993-.7134s-.1078-.5254-.2993-.7134l-5.0909-5.00005c-.394-.38699-1.0272-.38129-1.4142.01274-.3869.39403-.3812 1.02717.0128 1.41416l3.3463 3.28655h-15.5547c-.55228 0-1 .4477-1 1s.44772 1 1 1h15.5547l-3.3463 3.2866c-.394.3869-.3997 1.0201-.0128 1.4141z" fill="rgb(0,0,0)" fill-rule="evenodd" style="fill: #e3e3e3;"></path></svg>
		</a>
	<?php endforeach; ?>
	</div>
</section>