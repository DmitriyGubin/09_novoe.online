<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

//debug($arResult["ITEMS"]);
?>

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Блог</a>
	</li>
</ul>

<?php 
	$page = $APPLICATION->GetCurPage();
?>

<section class="blog wrap no-section">
	<!-- Для сео -->
	<?php if($page == '/'): ?>
		<h2 class="main-title">Наш блог</h2>
	<?php else: ?>
		<h1 class="main-title">Наш блог</h1>
	<?php endif; ?>
	 <!-- Для сео -->
	
	<div class="blog-box">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<a target="_blank" href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="blog-item">
			<img alt="<?= $arItem['NAME']; ?>" class="blog-item-img" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
			<div>
				<div class="date-views">
					<span class="date"><?= $arItem['ACTIVE_FROM']; ?></span>
					<!-- <img class="view" src="img/view.png"> -->
					<svg class="view" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient gradientUnits="userSpaceOnUse" x1="2.5" x2="61.5" y1="32" y2="32"><stop offset="0" stop-color="#1b70b7"></stop><stop offset=".3" stop-color="#3383c3"></stop><stop offset=".92" stop-color="#70b3e2"></stop><stop offset="1" stop-color="#79bae6"></stop></linearGradient><g data-name="Layer 58"><path d="m60.87 30.78-14.69-10.49a24.39 24.39 0 0 0 -28.36 0l-14.69 10.49a1.5 1.5 0 0 0 0 2.44l14.69 10.49a24.37 24.37 0 0 0 28.36 0l14.69-10.49a1.5 1.5 0 0 0 0-2.44zm-16.43 10.49a21.4 21.4 0 0 1 -24.88 0l-12.98-9.27 13-9.27a21.4 21.4 0 0 1 24.88 0l13 9.27zm-12.44-19.34a10.07 10.07 0 1 0 10.07 10.07 10.08 10.08 0 0 0 -10.07-10.07zm0 17.14a7.07 7.07 0 1 1 7.07-7.07 7.08 7.08 0 0 1 -7.07 7.07z" fill="url(#linear-gradient)" style="fill: #536bb7;"></path></g></svg>
					<span class="views"><?= $arItem['SHOW_COUNTER']; ?></span>
				</div>
				<h2 class="item-title"><?= $arItem['NAME']; ?></h2>
				<div class="item-text">
					<?= $arItem['~PREVIEW_TEXT']; ?>
				</div>
			</div>
		</a>
	<?php endforeach; ?>
	</div>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</section>
