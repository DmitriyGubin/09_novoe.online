<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сопровождение");
?>

<link href="css/styles.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">

<section class="convoy wrap">
	<!-- <div class="top_line">
		<div class="points">
			<div class="point_item">Точно сделаем</div>
			<div class="point_item">Без предоплаты</div>
			<div class="point_item">И в срок</div>
		</div>

		<div class="pnone_button">
			<a class="phone" href="<?= 'tel:'.$phone; ?>">
                <?= Phone_Converter($phone,' '); ?>
            </a>
			<button class="call_order">Заказать звонок</button>
		</div>
	</div> -->

	<div class="form_anime">
		<div class="form_box">
			<h1 class="title">  
				Услуги <span>по сопровождению, техподдержке</span> и доработке сайтов  
			</h1>

			<div class="sub_title">
				Выполняем любые доработки сайтов — на любых CMS.  
			</div>

			<form class="order_form">
				<div class="inp_box">
					<label> Имя * </label>
					<input id="form_name" type="text">
				</div>

				<div class="inp_box">
					<label>  Введите телефон * </label>
					<input id="form_phone" class="inp_phone" type="text">
				</div>

				<button id="send_form">
					<span>Оставить заявку‍</span>
					<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
				</button>
			</form>
		</div>

		<div id="animatee" class="animate_box">
			for(let item of letters){time = time + delta_in; setTimeout (function() {item.classList .remove ('hide_letter');
		</div>
	</div>

	<div class="quest_box">
		<div class="delimeter"></div>
		<h2 class="quest_title">  Остались вопросы?  </h2>
		<div class="quest_sub">  Отвечаем оперативно! Пишите:  </div>
	</div>

	<div class="last_line">  Если у вас есть трудности и вы не знаете с чего начать, позвоните нам по номеру <a href="<?= 'tel:'.$phone; ?>"><?= Phone_Converter($phone,' '); ?></a> и поможем разобраться.  
	</div>
</section>

<!-- <script type="text/javascript" src="js/main.js"></script> -->

<script type="text/javascript" src="script.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>