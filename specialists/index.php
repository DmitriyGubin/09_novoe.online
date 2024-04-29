<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Аутстаффинг разработчиков, программистов - Услуги аутстаффинга IT-специалистов от компании Новое агентства, аустафф персонала");
$APPLICATION->SetPageProperty("description", "Аутстаффинг разработчиков - Аутстаффинг IT разработчиков от компании Новое агентство. Большой опыт и скорость. 20+ штатных специалистов.  Большое количество выполненных проектов. 13 лет успешной работы.  +7 (383) 207-57-29");
$APPLICATION->SetTitle("Аутстаффинг разработчиков, программистов - Услуги аутстаффинга IT-специалистов от компании Новое агентства, аустафф персонала ");

$APPLICATION->SetPageProperty("keywords", "");

$tables =  Return_All_Fields_Props(
		Array("IBLOCK_ID"=>17, "ACTIVE"=>"Y"),
		Array()
	);

$inserts =  Return_All_Fields_Props(
		Array("IBLOCK_ID"=>22, "ACTIVE"=>"Y"),
		Array()
	);
?>

<link href="css/styles.css" rel="stylesheet">

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	<li> 
		<a href="#">Аутстаффинг</a>
	</li>
</ul>

<section class="wrap all_tables no-section">
	<h1 class="main-title">Аутстаффинг разработчиков</h1>
	<p class="about_text">
		Требуется аутстаффинг IT специалистов? У нас их много. Решите свой кадровый вопрос уже сегодня. Выберите специалиста с нужным стеком и сразу приступайте к работе, а все остальное мы возьмем на себя.
	</p>
	<h2 class="sub_title">Стоимость аутстаффинга</h2>

<?php foreach ($tables as $item): ?>
<?php $props = $item["props"]; ?>
	<div class="price_table">
		<table>
			<thead>
				<tr>
					<th class="one">
						<h2 class="table_title">
							<?= $item['fields']['NAME']; ?>
						</h2>
					</th>
					<th class="another" colspan="2">До 3 месяцев	</th>
					<th class="another" colspan="2">До 6 месяцев (-3%)        </th>
					<th class="another" colspan="2">После 6 месяцев (-6%)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>УРОВЕНЬ</td>
					<td>ЧАС</td>
					<td>МЕСЯЦ</td>
					<td>ЧАС</td>
					<td>МЕСЯЦ</td>
					<td>ЧАС</td>
					<td>МЕСЯЦ</td>
				</tr>

				<tr>
					<td>Middle</td>
					<td>
					<?= Return_Price($props['MIDDLE_3_HOUR']['VALUE']); ?>
					</td>

					<td>
					<?= Return_Price($props['MIDDLE_3_MONTH']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['MIDDLE_UNTIL_6_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['MIDDLE_UNTIL_6_MONTH']['VALUE']); ?>
					</td>

					<td>
					<?= Return_Price($props['MIDDLE_AFTER_6_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['MIDDLE_AFTER_6_MONTH']['VALUE']); ?>	
					</td>
				</tr>

				<tr>
					<td>Senior</td>

					<td>
					<?= Return_Price($props['SENIOR_3_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['SENIOR_3_MONTH']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['SENIOR_UNTIL_6_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['SENIOR_UNTIL_6_MONTH']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['SENIOR_AFTER_6_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['SENIOR_AFTER_6_MONTH']['VALUE']); ?>	
					</td>
				</tr>

				<tr>
					<td>Architect</td>

					<td>
					<?= Return_Price($props['ARCHITECT_3_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['ARCHITECT_3_MONTH']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['ARCHITECT_UNTIL_6_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['ARCHITECT_UNTIL_6_MONTH']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['ARCHITECT_AFTER_6_HOUR']['VALUE']); ?>	
					</td>

					<td>
					<?= Return_Price($props['ARCHITECT_AFTER_6_MONTH']['VALUE']); ?>	
					</td>
				</tr>

			</tbody>
		</table>
	</div>
<?php endforeach; ?>

<h2 class="main-title">Стоимость аутстаффинга</h2>
<p class="about_text">
	Выбирайте профессиональных специалистов для работы над вашим проектом из нашего разнообразного пула IT-экспертов. Наша команда включает в себя разработчиков, дизайнеров, тестировщиков, DevOps, аналитиков и менеджеров, готовых взяться за любые задачи. Предоставленный сотрудник станет частью вашей команды и будет полностью посвящен выполнению ваших требований и задач под нашим чутким контролем.
	<br><br>
	Аутсорсинг и аутстаффинг предлагают различные модели сотрудничества. При аутсорсинге, вы поручаете выполнение задач другой команде и оплачиваете только за результат. Это отличный выбор, если вы не хотите глубоко вникать в процесс работы. С другой стороны, при аутстаффинге, вы нанимаете специалистов напрямую в свою команду, оплачиваете их навыки и самостоятельно организуете их работу. Этот подход подходит, если вам требуется полный контроль над процессом и более тесное взаимодействие со специалистами.
</p>

</section>


<?php 
	$advs =  Return_All_Fields_Props(
		Array("IBLOCK_ID"=>20, "ACTIVE"=>"Y"),
		Array()
	);
?>

<section class="stages wrap no-section">
	<h2 class="main-title">Преимущества  аутстаффинга</h2>
	<div class="sages_box">
	<?php $j = 0; ?>
	<?php foreach ($advs as $adv_item): ?>
	<?php $j++; ?>
		<div class="small-stage">
			<img alt="<?= $adv_item['fields']['NAME']; ?>" class="small-stage-img" src="<?=\CFile::GetPath($adv_item['fields']['PREVIEW_PICTURE']);?>">
			<div class="small-stage-text">
				<h3 class="stage-title"><?= $adv_item['fields']['NAME']; ?></h3>
				<div class="stage-text">
					 <?= $adv_item['fields']['~PREVIEW_TEXT']; ?>					
				</div>
			</div>
			<div class="num-stage"><?= Number_Converter($j); ?></div>
		</div>
	<?php endforeach; ?>
	</div>
</section>



<?php 
	$tesks =  Return_All_Fields_Props(
		Array("IBLOCK_ID"=>21, "ACTIVE"=>"Y"),
		Array()
	);
	//debug($tesks);
?>

<section class="tasks no-section">
	<div class="wrap">
		<h2 class="main-title">
			Чем мы занимаемся
		</h2>

		<div class="tasks-box">
			<?php foreach ($tesks as $tesks_item): ?>
				<div class="tasks-item">
					<div>
						<h2 class="tasks-title">
							<?= $tesks_item['fields']['NAME']; ?>
						</h2>
					</div>
					<span class="job-price">
						<?= $tesks_item['fields']['~PREVIEW_TEXT']; ?>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/stack_box.php");?>

<section class="why_we no-section wrap">
	<h2 class="main-title">Почему мы</h2>
	<ul class="list">
	<?php foreach ($inserts[0]['props']['WHY']['~VALUE'] as $li): ?>
		<li><?= $li['TEXT']; ?></li>
	<?php endforeach; ?>
	</ul>
</section>

<?php $iblock_idd = 23; ?>
<?require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/includes/tab_box.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>