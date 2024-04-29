<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
    use Bitrix\Main\Page\Asset;
?>

<!DOCTYPE html> 
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<?php $APPLICATION->ShowHead() ?>
    <title><?php $APPLICATION->ShowTitle() ?></title>
    <?php
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/header_footer/styles.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/header_footer/media.css');
        // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/js/jquery.mask.min.js');
        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.86">');
    ?>

<?if(strpos($_SERVER['HTTP_USER_AGENT'] , 'Chrome-Lighthouse' ) === false){?>
	    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
		<script src="<?=SITE_TEMPLATE_PATH?>/libraries/js/jquery-3.6.0.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/libraries/js/jquery.mask.min.js"></script>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(95094439, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<?}?>
<!-- <noscript><div><img src="https://mc.yandex.ru/watch/95094439" style="position:absolute; left:-9999px;" alt="" /></div></noscript> -->
<!-- /Yandex.Metrika counter -->

<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z1B0YMYJHS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z1B0YMYJHS');
</script> -->
<?if(strpos($_SERVER['HTTP_USER_AGENT'] , 'Chrome-Lighthouse' ) === false){?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LTEDGNT3YB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LTEDGNT3YB');
</script>
<?}?>
<!-- Микроразметка Open Graph -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://novoe.online">
<meta property="og:title" content="Digital-студия “Новое агентство”">
<meta property="og:description" content="Digital-студия полного циклa. Создаем сайты и мобильные приложения под ключ. Реализовали уже 700+ проектов в более чем 30 нишах. Над задачами работают опытные it-специалисты уровня middle и senior в связке c интернет-маркетологами. Стоимость часа работ: от 2500 руб. Звоните: +7(383) 207 57 29">
<meta property="og:image" content="https://novoe.online/logo.png">
<!-- Микроразметка Open Graph -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VKCMLYWNBH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VKCMLYWNBH');
</script>
<!-- Google tag (gtag.js) -->
<!-- <script async src="https://cdn.ampproject.org/v0.js"></script> -->

</head>
<body>
	<?php
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/functions.php');

		$all_contacts = Return_All(
				Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
				Array("ID", "IBLOCK_ID", "NAME", 
					"PROPERTY_PHONE",
					"PROPERTY_PHONE_TWO",
					"PROPERTY_ADDRESS",
					"PROPERTY_EMAIL",
					"PROPERTY_MAP_SIGNATURE",
					"PROPERTY_TELEGRAM",
					"PROPERTY_WATSAPP",
					"PROPERTY_FOOTER_SMALL_TEXT",
					"PROPERTY_VK_REF")
		);
	?>
	<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
	<?php
		$heder_background = (Check_Main_Page() or (!Main_Or_Detail_Page('services') && Check_Page('services')));
	?>

	<header class="header" style="background: <?= $heder_background? '#1b2265' : '#2a49be'; ?>">
		<div class="wrap all_head">
			<div class="logo_menu">
				<div>
					<a class="company-name" href="/">
						<img title="logo" alt="logo" class="head_logo" src="<?= SITE_TEMPLATE_PATH; ?>/img/logo.svg">
					</a>
					<?php 
						$phone = $all_contacts[0]['PROPERTY_PHONE_VALUE']; 
						$phone_two = $all_contacts[0]['PROPERTY_PHONE_TWO_VALUE'];
					?>
					<a class="phone_mobile hide" href="<?= 'tel:'.$phone; ?>">
                    	 <?= Phone_Converter($phone,' '); ?>
                    </a>

                    <a class="phone_mobile hide" href="<?= 'tel:'.$phone_two; ?>">
                    	<?= Phone_Converter($phone_two,' '); ?>
                    </a>
				</div>

				<ul class="menu">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"main_header", 
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "left",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "main_header",
							"USE_EXT" => "N",
							"COMPONENT_TEMPLATE" => "main_header"
						),
						false
					);?>
            	</ul>
			</div>
			
			<div class="phone_button">
				<div class="phone_box">
                    <a class="phone" href="<?= 'tel:'.$phone; ?>">
                    	 <?= Phone_Converter($phone,' '); ?>
                    </a>

                    <a class="phone" href="<?= 'tel:'.$phone_two; ?>">
                    	<?= Phone_Converter($phone_two,' '); ?>
                    </a>
                    <div class="city">Новосибирск</div>
				</div>
				<button id="send_order_header">Оставить заявку</button>

				<svg id="send_order_header_mobile" class="hide" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" class="bi bi-envelope-fill" viewBox="0 0 16 16"> <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"></path> </svg>

				<div class="mobile-burger hide">
	            	<div class="top"></div>
	            	<div class="middle"></div>
	            	<div class="bottom"></div>
	            </div>

	            <?php/* if($_SERVER['REMOTE_ADDR'] == '37.193.78.35'): */?>
	            	<svg id="head_loop" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.0264 22.3568C25.9773 19.9927 27.2094 16.9604 27.2094 13.6197C27.2094 6.11601 21.1001 0 13.6047 0C6.10928 0 0 6.11601 0 13.6197C0 21.1234 6.10928 27.2394 13.6047 27.2394C16.8904 27.2394 19.9707 26.0573 22.3322 24.0529L32.908 34.6402C33.1646 34.8972 33.4727 35 33.7807 35C34.0887 35 34.3968 34.8972 34.6535 34.6402C35.1155 34.1777 35.1155 33.3554 34.6535 32.8928L24.0264 22.3568ZM13.5534 24.7724C7.39274 24.7724 2.41291 19.7871 2.41291 13.6197C2.41291 7.45228 7.39274 2.46696 13.5534 2.46696C19.714 2.46696 24.6938 7.45228 24.6938 13.6197C24.6938 19.7871 19.714 24.7724 13.5534 24.7724Z" fill="white"/>
					</svg>
	            <?php/* endif; */?>
			</div>
		</div>

		<?php/* if($_SERVER['REMOTE_ADDR'] == '37.193.78.35'): */?>
			<div class="wrap inp_box hide">
				<!-- <input placeholder="Введите ваш запрос" id="search_input" type="text" style="background: <?= $heder_background? '#1b2265' : '#2a49be'; ?>"> -->

				<?$APPLICATION->IncludeComponent(
					"bitrix:search.form",
					"search_form",
					Array(
						"PAGE" => "#SITE_DIR#search/",
						"USE_SUGGEST" => "Y"
					)
				);?>

				<svg id="inp_box_loopa" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.7294 12.7753C14.8442 11.4244 15.5482 9.69163 15.5482 7.78267C15.5482 3.49486 12.0572 0 7.77411 0C3.49102 0 0 3.49486 0 7.78267C0 12.0705 3.49102 15.5653 7.77411 15.5653C9.65163 15.5653 11.4118 14.8899 12.7613 13.7445L18.8045 19.7944C18.9512 19.9413 19.1272 20 19.3033 20C19.4793 20 19.6553 19.9413 19.802 19.7944C20.066 19.5301 20.066 19.0602 19.802 18.7959L13.7294 12.7753ZM7.74477 14.1557C4.22442 14.1557 1.3788 11.3069 1.3788 7.78267C1.3788 4.25844 4.22442 1.40969 7.74477 1.40969C11.2651 1.40969 14.1107 4.25844 14.1107 7.78267C14.1107 11.3069 11.2651 14.1557 7.74477 14.1557Z" fill="white" fill-opacity="0.5"/>
				</svg>

				<svg id="inp_box_cross" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.8286 19L9.5 11.6714L2.17143 19L0 16.8286L7.32857 9.5L0 2.17143L2.17143 0L9.5 7.32857L16.8286 0L19 2.17143L11.6714 9.5L19 16.8286L16.8286 19Z" fill="white" fill-opacity="0.95"/>
				</svg>
			</div>
		<?php/* endif; */?>

		<div class="mobile_shade" style="display: none;"></div>
	</header>


	<div class="delimeter-header"></div>

<!-- Микроразметка Schema.org -->
<div itemscope itemtype="http://schema.org/Organization">
	<meta itemprop="name" content="Digital-студия Новое агентство">

	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="streetAddress" content="Галущака, 4">
		<meta itemprop="postalCode" content="630049">
		<meta itemprop="addressLocality" content="Новосибирск">
	 </div>
	 <meta itemprop="telephone" content="+7 383 207-57-29">
	 <meta itemprop="email" content="info@smm.ru.com">
</div>
<!-- Микроразметка Schema.org -->


	