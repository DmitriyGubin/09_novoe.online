<?php

$page = $_SERVER['REQUEST_URI'];
if(strpos($page, '/razrabotka-mobilnykh-prilozheniy/') != false)
{
	header('Location: https://novoe.online/services/razrabotka-mobilnykh-prilozheniyy/');
}

$APPLICATION->SetPageProperty("keywords", "");

 ?>



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

?>

<section class="top-banner">
	<div class="wrap">
		<div class="top-banner-all-text uprise">
			<h1 class="banner-title">
				<?= $arResult['PROPERTIES']['TOP_BANNER_TITLE']['VALUE']; ?>
				<span style="display: none;">.</span>
			</h1>
			<p class="banner-text">
				<?= $arResult['PROPERTIES']['TOP_BANNER_DESCR']['VALUE']; ?>
			</p>

			<button id="tob-ban-order">
				Оставить заявку
			</button>
		</div>
	</div>
</section>

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="/services/">Услуги</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#"><?= Сut_Text($arResult['NAME'], 12); ?></a>
	</li>
</ul>

<section class="hello-box wrap no-section">
	<!-- <p class="hello">Привет!</p> -->
	<div class="about-text">
		<?= $arResult['PROPERTIES']['UNDER_BANNER_TEXT']['~VALUE']['TEXT']; ?>
	</div>
</section>

<?php 
	$section_reff = $arResult['PROPERTIES']['STAGES_REFF']['VALUE'];
	$stages = Return_All(
		Array("IBLOCK_ID"=>13, "ACTIVE"=>"Y", "SECTION_ID" => $section_reff),
		Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE","PREVIEW_TEXT","PROPERTY_BIG_BLOCK", "PROPERTY_HIDE_THIS")
	);

	$section = Return_All_Sections(
		Array("IBLOCK_ID"=>13, "ACTIVE"=>"Y", "ID"=>$section_reff),
		Array("ID", "IBLOCK_ID", "NAME")
	);

	//debug(count($stages));
	//debug($stages);
?>
<?php if($section_reff != ''): ?>
<section class="stages wrap no-section">
	<h2 class="main-title"><?= $section[0]['NAME']; ?></h2>
	<div class="stages-box">
<?php $flag = false; ?>
<?php for ($i = 0; $i <= (count($stages)-2); $i++): ?>
	<?php
		$hide_bool = ($stages[$i]['PROPERTY_HIDE_THIS_VALUE'] == 'YES');
		$bool = ($stages[$i]['PROPERTY_BIG_BLOCK_VALUE'] == '') && ($stages[$i+1]['PROPERTY_BIG_BLOCK_VALUE'] == '');
		if($flag && ($bool==false))
		{
			$flag = false;
			continue;
		}

		if($bool)
		{
			$flag = true;
		}
		else
		{
			$flag = false;
		}
	?>
	<?php if($bool): ?>
		<div class="small-stages-box">
			<div class="small-stage <?= $hide_bool?'hide':null; ?>">
				<img alt="<?= $stages[$i]['NAME']; ?>" class="small-stage-img" src="<?=\CFile::GetPath($stages[$i]['PREVIEW_PICTURE'])?>">
				<div class="small-stage-text">
					<h3 class="stage-title"><?= $stages[$i]['NAME']; ?></h3>
					<div class="stage-text">
						<?= $stages[$i]['~PREVIEW_TEXT']; ?>
					</div>
				</div>
				<div class="num-stage"><?= Number_Converter($i + 1); ?></div>
			</div>
		<?php $hide_bool_two = ($stages[$i+1]['PROPERTY_HIDE_THIS_VALUE'] == 'YES'); ?>
			<div class="small-stage <?= $hide_bool_two?'hide':null; ?>">
				<img alt="<?= $stages[$i+1]['NAME']; ?>" class="small-stage-img" src="<?=\CFile::GetPath($stages[$i+1]['PREVIEW_PICTURE'])?>">
				<div class="small-stage-text">
					<h3 class="stage-title"><?= $stages[$i+1]['NAME']; ?></h3>
					<div class="stage-text">
						<?= $stages[$i+1]['~PREVIEW_TEXT']; ?>
					</div>
				</div>
				<div class="num-stage"><?= Number_Converter($i + 2); ?></div>
			</div>
		</div>
	<?php else: ?>
		<div class="big-stage <?= $hide_bool?'hide':null; ?>">
			<h3 class="stage-title"><?= $stages[$i]['NAME']; ?></h3>
			<div class="stage-text">
				<?= $stages[$i]['~PREVIEW_TEXT']; ?>
			</div>
			<div class="num-stage"><?= Number_Converter($i + 1); ?></div>
			<img alt="<?= $stages[$i]['NAME']; ?>" class="big-stage-img" src="<?=\CFile::GetPath($stages[$i]['PREVIEW_PICTURE'])?>">
		</div>
	<?php endif; ?>
<?php endfor; ?>
	</div>	
</section>
<?php endif; ?>

<?php $arr = $arResult['PROPERTIES']['PROJ_EXAMPLES']['VALUE']; 
//debug(count($arr));
?>
<?php if($arr != ''): ?>
<section class="examples wrap no-section">
	<h2 class="main-title">
		Мы создаем качественный продукт, который выделяется среди конкурентов
	</h2>

	<p class="examples-text">
		Мы специализируемся на разработке
		технически сложных продуктов
		по индивидуальным требованиям
	</p>

	<div class="examples-box">
	<?php foreach ($arr as $key => $value): ?>
		<div class="examples-item">
			<h3 class="examples-title">
				<?= $arResult['PROPERTIES']['PROJ_EXAMPLES']['DESCRIPTION'][$key]; ?>
			</h3>
			<img class="examples-img" src="<?=\CFile::GetPath($value);?>">
		</div>
	<?php endforeach; ?>
	</div>

	<div id="more-info-button-parent">
		<!-- <button id="examples-more-info">Смотреть все</button> -->
	</div>
</section>
<?php endif; ?>

<?php $text_about_serv = $arResult['~DETAIL_TEXT']; ?>
<?php if($text_about_serv != ''): ?>
<section class="about-serv wrap no-section">
	<h2 class="main-title"><?= $arResult['PROPERTIES']['TITLE_SERV_TEXT']['VALUE']; ?></h2>
	<div class="about-serv-text">
		<?= $text_about_serv; ?>
	</div>
</section>
<?php endif; ?>

<?php if($arResult['PROPERTIES']['SHOW_SUB_SERV']['VALUE'] == 'YES'): ?>
<?php
	
	$prop = SecCode_To_PropCode($arResult['CODE']);

	$serv = Return_All(
		Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "PROPERTY_".$prop."_VALUE" => "YES", "!PROPERTY_NO_SHOW_IN_PARENT_VALUE" => "YES"),
		Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL")
	);
?>

	<section class="mob_serv no-section <?= count($serv) == 0 ? 'hide' : null; ?>">
		<div class="wrap">
			<h2 class="main-title">Наши услуги</h2>
			<div class="serv_box">
			<?php foreach ($serv as $serv_item): ?>
				<a class="serv_item" href="<?= $serv_item['DETAIL_PAGE_URL']; ?>">
					<?= $serv_item['NAME']; ?>
				</a>
			<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php 
	$tabs = $arResult['PROPERTIES']['TABS']['~VALUE']; 
	//debug($tabs);
?>
<?php if($tabs != ''): ?>
<section class="questions wrap no-section">
	<h2 class="main-title">Частые вопросы</h2>
<?php foreach ($tabs as $tabs_item): ?>
<?php $tabs_mas = explode('||||', $tabs_item['TEXT']); ?>
	<div class="quest-tab">
		<div class="quest-item">
			<div class="quest-title"><?= $tabs_mas[0]; ?></div>

			<svg class="arrow rotate-out" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
		</div>

		<div class="tab-item no-height">
			<div>
			<?= $tabs_mas[1]; ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</section>
<?php endif; ?>

<?php 
	$section_reff = $arResult['PROPERTIES']['PRICES_BLOCKS']['VALUE'];

	$boxes = Return_All(
		Array("IBLOCK_ID"=>15, "ACTIVE"=>"Y", "SECTION_ID" => $section_reff),
		Array("ID", "IBLOCK_ID", "NAME","PROPERTY_TITLE_BOX", "PROPERTY_TEXT_BOX")
	);

	$classes_arr = ['one', 'two'];
	$id_arr = ['fixed-price', 'time-and-material'];

	//debug($boxes);
?>

<section class="price wrap no-section <?= ($section_reff=='')?'no_margin':null; ?>">
	<h2 class="main-title"><?= $arResult['PROPERTIES']['PRICES_BLOCK_TITLE']['VALUE']; ?></h2>
	<div class="variants-box">
	<?php $j=0; ?>
	<?php foreach ($boxes as $box_item): ?>
		<div class="variants-item <?= $classes_arr[$j]; ?>">
			<div class="price-text">
				<h3 class="var-title"><?= $box_item['~PROPERTY_TITLE_BOX_VALUE']['TEXT']; ?></h3>
				<div class="var-text">
					<?= $box_item['~PROPERTY_TEXT_BOX_VALUE']['TEXT']; ?>
				</div>
			</div>
			<button class="var-button" id="<?= $id_arr[$j]; ?>">Заказать</button>
		</div>
	<?php $j++; ?>
	<?php endforeach; ?>
	</div>

	<?php 
		$this_page = $APPLICATION->GetCurPage();
	?>
	<?php if($this_page == '/services/nastroyka-kontekstnoy-i-targetirovannoy-reklamy/'): ?>
		<div class="price-remark">
			*Минимальный бюджет на настройку рекламы от 30 000 руб. Зависит от количества продвигаемых товаров/услуг.
		</div>
	<?php endif; ?>

	<?php if($this_page == '/services/nastroyka-targetirovannoy-reklamy/'): ?>
		<div class="price-remark">
			*Минимальный бюджет на настройку рекламы рассчитывается индивидуально
		</div>
	<?php endif; ?>
</section>

<?php 
	//debug($arResult['PROPERTIES']);
 ?>

<section class="works wrap no-section">
	<h2 class="main-title">
		<?= $arResult['PROPERTIES']['WORKS_TITLE']['~VALUE']['TEXT']; ?>
	</h2>

	<div class="works-box">
		<div class="all-works">
		<?php $j=0; ?>
		<?php foreach ($arResult['PROPERTIES']['WORKS_STAGES']['~VALUE'] as $stage): ?>
			<?php $j++; ?>
			<div class="stage <?= ($j%2 == 0)?'white':'blue'; ?>"><?= $stage['TEXT']; ?></div>
		<?php endforeach; ?>
		</div>

		<div class="right-info">
			<img alt="Услуги по разработке и продвижению сайта, дизайн и внедрение CRM" class="works-img" src="/services/img/works.png">

			<div class="works-text">
				<?= $arResult['PROPERTIES']['WORKS_TEXT']['~VALUE']['TEXT']; ?>
			</div>
		</div>
	</div>
</section>

<section class="quest-form no-section">
	<div class="wrap">
		<h2 class="main-title">Обсудим ваш проект?</h2>
		<p class="fast-answer">
			Расскажите о целях, задачах, сроках и бюджете вашего проекта как можно подробнее.
			Это поможет нам лучше вникнуть и предоставить вам предложение намного быстрее.
		</p>
		<form>
			<input id="quest-form-name" type="text" placeholder="Имя*">
			<input id="quest-form-phone" type="text" placeholder="Телефон*">
			<input id="quest-form-question" type="text" placeholder="Введите вопрос">
			<button id="quest-form-button">Отправить</button>
		</form>

		<div class="checkbox-text">
			<div class="my-checkbox">
				<div class="galka hide"></div>
			</div>
			<span class="my-checkbox-descr">
				Согласен с условиями обработки персональных данных
			</span>
		</div>

		<?php
			$contacts = Return_All(
					Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
					Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PHONE")
			);
			$phone = $contacts[0]['PROPERTY_PHONE_VALUE']; 
		?>

		<div class="difficulties">
			Если у вас есть трудности и вы не знаете с чего начать, позвоните нам по номеру 
			<a href="<?= 'tel:'.$phone; ?>">
				<?= Phone_Converter($phone,'-'); ?>
			</a>.
			Поможем разобраться.
		</div>
	</div>
</section>

<script type="text/javascript" src="/services/js/detail_page.js"></script>