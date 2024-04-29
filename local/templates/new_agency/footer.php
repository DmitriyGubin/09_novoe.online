<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- <footer class="no-section"> -->
<footer>
	<div class="form-contacts">
		<div class="wrap">
			<form>
				<h3 class="title">Связаться с нами</h3>
				<input id="footer-form-name" type="text" placeholder="Имя*">
				<input id="footer-form-phone" type="text" placeholder="Номер телефона*">
				<input id="footer-form-email" type="email" placeholder="Почта">
				<button id="footer-form">Отправить</button>
			</form>

			<div class="contact-box">
				<h3 class="title">Контакты</h3>
				<div class="conact-line">
					<img alt="Электронная почта" src="<?= SITE_TEMPLATE_PATH.'/img/mail.svg'; ?>">
					<?php $mail = $all_contacts[0]['PROPERTY_EMAIL_VALUE']; ?>
					<a href="<?= 'mailto:'.$mail ?>"><?= $mail ?></a>
				</div>

				<div class="conact-line">
					<img alt="Телефон" src="<?= SITE_TEMPLATE_PATH.'/img/phone.svg'; ?>">
					<?php 
						$phone = $all_contacts[0]['PROPERTY_PHONE_VALUE'];
						$phone_two = $all_contacts[0]['PROPERTY_PHONE_TWO_VALUE']; 
					?>
					<a href="<?= 'tel:'.$phone; ?>"><?= $phone; ?></a>
				</div>

				<div class="conact-line">
					<img alt="Телефон" src="<?= SITE_TEMPLATE_PATH.'/img/phone.svg'; ?>">
					<a href="<?= 'tel:'.$phone_two; ?>"><?= $phone_two; ?></a>
				</div>

				<div class="conact-line">
					<img alt="Telegram" src="<?= SITE_TEMPLATE_PATH.'/img/telega.svg'; ?>">
					<?php $telega = $all_contacts[0]['PROPERTY_TELEGRAM_VALUE']; ?>
					<a target="_blank" href="<?= $telega; ?>">Telegram</a>
				</div>

				<div class="conact-line">
					<img alt="WhatsApp" src="<?= SITE_TEMPLATE_PATH.'/img/watsapp.svg'; ?>">
					<?php $wats_app = $all_contacts[0]['PROPERTY_WATSAPP_VALUE']; ?>
					<a target="_blank" href="<?= 'https://wa.me/'.$wats_app; ?>">WatsApp</a>
				</div>
			</div>
		</div>
	</div>

	<div class="last-line">
		<?php 
			$serv = Return_All(
				Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y"),
				Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_SERV_CAT", "DETAIL_PAGE_URL")
			);
		?>

		<div class="wrap site-map">
			<div class="dev-box">
				<div class="tab-butt">
					<h4 class="menu-title">Разработка</h4>
					<svg class="arrow-footer hide" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L11 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
				</div>

				<div class="tab-box">
				<?php foreach ($serv as $serv_item): ?>
				<?php if($serv_item['PROPERTY_SERV_CAT_ENUM_ID'] == 2): ?>
					<a target="_blank" class="serv-ref" href="<?= $serv_item['DETAIL_PAGE_URL']; ?>">
						<?= $serv_item['NAME']; ?>
					</a>
				<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</div>

			<div class="dev-box">
				<div class="tab-butt">
					<h4 class="menu-title">Интернет-продвижение</h4>
					<svg class="arrow-footer hide" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L11 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
				</div>

				<div class="tab-box">
					<?php foreach ($serv as $serv_item): ?>
					<?php if($serv_item['PROPERTY_SERV_CAT_ENUM_ID'] == 3): ?>
						<a target="_blank" class="serv-ref" href="<?= $serv_item['DETAIL_PAGE_URL']; ?>">
							<?= $serv_item['NAME']; ?>
						</a>
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="dev-box">
				<div class="tab-butt">
					<h4 class="menu-title">Поддержка сайта</h4>
					<svg class="arrow-footer hide" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L11 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
				</div>

				<div class="tab-box">
					<?php foreach ($serv as $serv_item): ?>
					<?php if($serv_item['PROPERTY_SERV_CAT_ENUM_ID'] == 4): ?>
						<a target="_blank" class="serv-ref" href="<?= $serv_item['DETAIL_PAGE_URL']; ?>">
							<?= $serv_item['NAME']; ?>
						</a>
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="dev-box">
				<div class="tab-butt">
					<h4 class="menu-title">Дизайн</h4>
					<svg class="arrow-footer hide" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L11 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
				</div>

				<div class="tab-box">
					<?php foreach ($serv as $serv_item): ?>
					<?php if($serv_item['PROPERTY_SERV_CAT_ENUM_ID'] == 5): ?>
						<a target="_blank" class="serv-ref" href="<?= $serv_item['DETAIL_PAGE_URL']; ?>">
							<?= $serv_item['NAME']; ?>
						</a>
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<div class="arrow-all">
			<a class="serv-ref" target="_blank" href="/services/">Все услуги</a>
			<svg class="arrow-footer" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 1L6 6L11 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
		</div>

		<div class="wrap">
			<div class="menu">
				<div class="row">
					<div class="footer-menu">
						<p class="menu-title">Компания</p>
						<ul>
							<?$APPLICATION->IncludeComponent(
								"bitrix:menu",
								"main_menu",
								Array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "left",
									"DELAY" => "N",
									"MAX_LEVEL" => "1",
									"MENU_CACHE_GET_VARS" => array(""),
									"MENU_CACHE_TIME" => "3600",
									"MENU_CACHE_TYPE" => "N",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "main",
									"USE_EXT" => "N"
								)
							);?>
						</ul>
					</div>

					<div class="write-us">
						<p class="menu-title">Написать нам</p>
						<ul>
							<li><a target="_blank" href="<?= $telega; ?>">Telegram</a></li>
							<li><a target="_blank" href="<?= 'https://wa.me/'.$wats_app; ?>">Whats App</a></li>
							<li><a href="<?= 'mailto:'.$mail ?>"><?= $mail ?></a></li>
						</ul>
					</div>
				</div>

				<div class="row two">
					<p class="small-text">
						<?= $all_contacts[0]['~PROPERTY_FOOTER_SMALL_TEXT_VALUE']['TEXT']; ?>
					</p>

					<div class="social-media">
						<p class="menu-title">Мы в интернете</p>
						<ul>
							<li><a target="_blank" href="<?= $all_contacts[0]['PROPERTY_VK_REF_VALUE']; ?>">Vkontakte</a></li>
							<li><a target="_blank" href="<?= $telega; ?>">Telegram</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="phone-logo">
				<div class="phone-button">
					<a class="footer-phone" href="<?= 'tel:'.$phone; ?>"><?= Phone_Converter($phone,' '); ?></a>
					<a class="footer-phone" href="<?= 'tel:'.$phone_two; ?>"><?= Phone_Converter($phone_two,' '); ?></a>
					<button id="phone-order-footer">Заказать звонок</button>
				</div>
				<a class="logo" href="/">
					<img title="logo" alt="logo" class="footer_logo" src="<?= SITE_TEMPLATE_PATH; ?>/img/logo.svg">
				</a>
				<a class="logo_arda" href="https://arda.digital/">
					<img src="/local/templates/new_agency/img/ARDA_logo.png" alt="Логотип ARDA">
				</a>
			</div>
		</div>

		<div class="wrap copyright">
			© 2024 ООО «Новое Агентство». Все права защищены. Использование материалов возможно только при наличии ссылки на первоисточник.
		</div>
	</div>

	


</footer>

<?php 
	require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/pop-up/html.php');
?>

<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/js/header_footer/main.js' ?>"></script>

</body>
</html> 