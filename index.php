<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "Digital-студия \"Новое агентство\"");
$APPLICATION->SetPageProperty("keywords", "Digital-студия \"Новое агентство\"");
$APPLICATION->SetPageProperty("title", "Digital агентство полного цикла в Новосибирске. Разработка сайтов и мобильных приложений");
$APPLICATION->SetPageProperty("description", "Digital агентство полного цикла в Новосибирске Услуги по созданию сайтов и мобильных приложений под ключ. Реальные отзывы, в портфолио более 700 кейсов. Звоните: +7(383) 207 57 29");
$APPLICATION->SetTitle("Digital агентство полного цикла в Новосибирске. Разработка сайтов и мобильных приложений"); ?>


<link href="<?=SITE_TEMPLATE_PATH?>/css/main_page/styles.css" rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/main_page/media.css" rel="stylesheet">

<?php 
$inserts = Return_All(
	Array("IBLOCK_ID"=>12, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE","PREVIEW_TEXT")
);
$inserts_id = Array_Converter_With_ID($inserts);
	//debug($inserts_id);
?>



<?php 
$companies = Return_All(
	Array("IBLOCK_ID"=>7, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE","PREVIEW_TEXT")
);

$slides = Return_All(
	Array("IBLOCK_ID"=>14, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT")
);
	//debug($slides);
?>

<section class="top-banner heatmap" style="position: relative;">
	<div class="top-slider uprise">
	<?php foreach ($slides as $slide_item): ?>
		<div class="top-banner-slide">
			<div class="wrap">
				<div>
					<h1 class="banner-title">
						<?= $slide_item['NAME']; ?>
					</h1>

					<p class="banner-text">
						<?= $slide_item['~PREVIEW_TEXT']; ?>
					</p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</section>

<section class="about wrap">
	<p class="hello">Привет!</p>
	<div class="about-text">
		<p>
			Мы агентство, которое занимается веб-разработкой и интернет-маркетингом. Специализируемся на создании сайтов (с учетом юзабилити), настройке контекстной рекламы и SEO. Входим в топ-30 digital-агентств РФ. Работаем более чем с 30 нишами. Разработали и помогли продвинуть 700+ проектов клиентов, повысив показатели конверсии в продажи.
		</p>
	</div>	
</section>

<?php 
$stages = Return_All(
	Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE","PREVIEW_TEXT", "PROPERTY_SERVICE_REF")
);
	//debug($stages);
?>

<section class="stages wrap"> 
	<h2 class="main-title">Услуги нашего агентства</h2>
	<div class="main-box">
		<a class="left-box one" href="/services/razrabotka-saytov/" target="_blank">
			<h2 class="left-box-title">
				<?= $inserts_id[50]['NAME']; ?>
			</h2>

			<p class="left-box-text">
				<?= $inserts_id[50]['~PREVIEW_TEXT']; ?>
			</p>

			<img alt="<?= $inserts_id[50]['NAME']; ?>" class="left-box-img" src="<?= \CFile::GetPath($inserts_id[50]['PREVIEW_PICTURE']); ?>">
		</a>

		<?php $counter = 0; ?>
		<div class="right-box three">
			<?php foreach ($stages as $stage_item): ?>
				<?php 
				$counter++;
				if($counter > 4) break;
				?>
				<a class="stages-item" target="_blank" href="<?= $stage_item['PROPERTY_SERVICE_REF_VALUE']; ?>">
					<div class="img-number">
						<img alt="<?= $stage_item['PREVIEW_TEXT']; ?>" class="stages-item-img" src="<?= \CFile::GetPath($stage_item['PREVIEW_PICTURE']); ?>">
						<span class="stages-item-number"><?= $counter; ?></span>
					</div>
					<h2 class="stages-item-title">
						<?= $stage_item['PREVIEW_TEXT']; ?>
					</h2>
				</a>
			<?php endforeach; ?>
		</div>

		<a class="left-box bottom-block two" href="/services/razrabotka-mobilnykh-prilozheniyy/" target="_blank">
			<h2 class="left-box-title">
				<?= $inserts_id[51]['NAME']; ?>
			</h2>

			<p class="left-box-text">
				<?= $inserts_id[51]['~PREVIEW_TEXT']; ?>
			</p>

			<img alt="<?= $inserts_id[51]['NAME']; ?>" class="left-box-img" src="<?= \CFile::GetPath($inserts_id[51]['PREVIEW_PICTURE']); ?>">
		</a>

		<?php $counter = 0; ?>
		<div class="right-box four">
			<?php foreach ($stages as $stage_item): ?>
				<?php 
				$counter++;
				if($counter < 5) continue;
				?>
				<a class="stages-item" target="_blank" href="<?= $stage_item['PROPERTY_SERVICE_REF_VALUE']; ?>">
					<div class="img-number">
						<img alt="<?= $stage_item['PREVIEW_TEXT']; ?>" class="stages-item-img" src="<?= \CFile::GetPath($stage_item['PREVIEW_PICTURE']); ?>">
						<span class="stages-item-number"><?= $counter; ?></span>
					</div>
					<h2 class="stages-item-title">
						<?= $stage_item['PREVIEW_TEXT']; ?>
					</h2>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- <section class="mobile-dev wrap no-section">
	<h2 class="main-title">Этапы работ над созданием сайта/мобильного приложения</h2>
	<div class="mobile-dev-text">
		<?= $inserts_id[52]['~PREVIEW_TEXT']; ?>
	</div>
</section> -->

<?php $iblock_idd = 10; ?>
<?require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/tab_box.php");?>

<?php 
$table_rows = Return_All(
	Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_OTHER_COMPANY","PROPERTY_OUR_COMPANY")
);
$num_rows = count($table_rows);
$j=0;
	//debug($table_rows);
?>

<section class="advantages wrap no-section">
	<h2 class="main-title">
		Тарифы
	</h2>

	<div class="adv-boxx">
		<div class="table-line hat">
			<div class="column one">
				<img alt="Тарифы" class="table-img" src="<?= SITE_TEMPLATE_PATH; ?>/img/table-img.png">
			</div>

			<div class="column two">
				<div>
					ПАКЕТ “SEO + тех. поддержка”
				</div>
			</div>

			<div class="column three">
				<div>
					ПАКЕТ “ПОЛНЫЙ”
				</div>
			</div>
		</div>
		<?php foreach ($table_rows as $row): ?>
			<?php $j++; ?>
			<div class="table-line <?= $j==$num_rows? 'last-line' : null; ?>">
				<div class="column one <?= $j==1? 'under-img' : null; ?>">
					<div>
						<?= $row['NAME']; ?>
					</div>
				</div>

				<div class="column two">
					<div>
						<?= $row['~PROPERTY_OTHER_COMPANY_VALUE']['TEXT']; ?>
					</div>
				</div>

				<div class="column three">
					<div>
						<?= $row['~PROPERTY_OUR_COMPANY_VALUE']['TEXT']; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<a class="more-info-serv" target="_blank" href="/services/">Полное описание услуг</a>
</section>

<!-- Блог -->
<link href="/blog/css/styles.css" rel="stylesheet">
<link href="/blog/css/media.css" rel="stylesheet">
<style type="text/css">
	.nav_chain
	{
		display: none !important;
	}
</style>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"blog", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
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
			0 => "SHOW_COUNTER",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "SHOW_COUNTER",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main-pagination",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/blog/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "blog",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>

<section class="more-items-blog-box wrap no-section">
	<!-- <button id="more-items-blog">Смотреть все</button> -->
</section>
<!-- Блог -->

<?php 
$tasks = Return_All(
	Array("IBLOCK_ID"=>11, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME","PREVIEW_TEXT", "PROPERTY_JOB_PRICE")
);
	//debug($tasks);
?>

<section class="tasks no-section">
	<div class="wrap">

	<div class="title-button">
		<h2 class="main-title">
			Аутстаффинг разработчиков компании
		</h2>

		<a target="_blank" class="more-dev desctop" href="/specialists/">Смотреть всех</a>
	</div>
		
		<div class="tasks-box">
			<?php foreach ($tasks as $tasks_item): ?>
				<div class="tasks-item">
					<div>
						<h2 class="tasks-title"><?= $tasks_item['NAME']; ?></h2>
						<div class="tasks-text">
							<?= $tasks_item['~PREVIEW_TEXT']; ?>
						</div>
					</div>
					<span class="job-price">
						Стоимость <span><?= $tasks_item['PROPERTY_JOB_PRICE_VALUE']; ?></span>/час
					</span>
				</div>
			<?php endforeach; ?>
		</div>

		<a class="more-dev mobile hide" href="/specialists/">Смотреть всех</a>
	</div>
</section>

<?php/* 
$techs = Return_All(
	Array("IBLOCK_ID"=>16, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME","PREVIEW_TEXT", "PREVIEW_PICTURE")
);
	*/
?>

<!-- <section class="tech wrap no-section">
	<h2 class="main-title">
		Технологии и стек
	</h2>

	<div class="tech-slider">
	<?php foreach ($techs as $tech_item): ?>
		<div class="tech-slide">
			<div class="tech-box">
				<img class="tech-logo" src="<?= \CFile::GetPath($tech_item['PREVIEW_PICTURE']); ?>">
				<h2 class="tech-title">
					<?= $tech_item['NAME']; ?>
				</h2>
				<p class="tech-text">
					<?= $tech_item['~PREVIEW_TEXT']; ?>
				</p>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</section> -->

<?require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/stack_box.php");?>

<section id="porlfolio" class="about wrap no-section our-company">
	<h2 class="main-title">
		Нам доверяют
	</h2>

	<div class="company-box">
		<?php foreach ($companies as $company): ?>
			<a target="_blank" href="<?= $company['~PREVIEW_TEXT'] ?>" class="company-item">
				<img alt="<?= $company['NAME']; ?>" class="company-logo" src="<?= \CFile::GetPath($company['PREVIEW_PICTURE']); ?>">
			</a>
		<?php endforeach; ?>

		<div class="hide-line top-line"></div>
		<div class="hide-line bottom-line"></div>
		<div class="hide-line left-line"></div>
		<div class="hide-line right-line"></div>
	</div>
</section>

<section class="quest-form no-section">
	<div class="wrap">
		<h2 class="main-title">Остались вопросы?</h2>
		<p class="fast-answer">Отвечаем оперативно! Пишите:</p>
		<form>
			<input id="quest-form-name" type="text" placeholder="Имя*">
			<input id="quest-form-phone" type="text" placeholder="Телефон*">
			<input id="quest-form-question" type="text" placeholder="Оставьте вопрос">
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

		<?php $phone = $all_contacts[0]['PROPERTY_PHONE_VALUE']; ?>

		<div class="difficulties">
			Если у вас есть трудности и вы не знаете с чего начать, позвоните нам по номеру 
			<a href="<?= 'tel:'.$phone; ?>">
				<?= Phone_Converter($phone,'-'); ?>
			</a>.
			Поможем разобраться.
		</div>
	</div>
</section>

<link href="<?=SITE_TEMPLATE_PATH?>/libraries/css/slick.css" rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/libraries/css/slick-theme.css" rel="stylesheet">
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/libraries/js/slick.min.js"></script>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/libraries/js/heatmap.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/main_page/main.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>