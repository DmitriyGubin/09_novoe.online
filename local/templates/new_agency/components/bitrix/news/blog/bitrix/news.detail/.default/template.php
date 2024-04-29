<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>

<ul class="nav_chain wrap">
	<li> 
		<a href="/">Главная</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>

	<li> 
		<a href="<?= 'https://'.$_SERVER['HTTP_HOST'].'/blog/' ?>">Блог</a>
		<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
	</li>
	
	<li> 
		<a href="#"><?= Сut_Text($arResult['NAME'], 12); ?></a>
	</li>
</ul>

<section class="article wrap no-section">
	<div class="wiew-date">
		<div class="only-view">
			<!-- <img class="wiew" src="/blog/img/view.png"> -->
			<svg class="wiew" class="view" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="2.5" x2="61.5" y1="32" y2="32"><stop offset="0" stop-color="#1b70b7"></stop><stop offset=".3" stop-color="#3383c3"></stop><stop offset=".92" stop-color="#70b3e2"></stop><stop offset="1" stop-color="#79bae6"></stop></linearGradient><g id="Layer_58" data-name="Layer 58"><path d="m60.87 30.78-14.69-10.49a24.39 24.39 0 0 0 -28.36 0l-14.69 10.49a1.5 1.5 0 0 0 0 2.44l14.69 10.49a24.37 24.37 0 0 0 28.36 0l14.69-10.49a1.5 1.5 0 0 0 0-2.44zm-16.43 10.49a21.4 21.4 0 0 1 -24.88 0l-12.98-9.27 13-9.27a21.4 21.4 0 0 1 24.88 0l13 9.27zm-12.44-19.34a10.07 10.07 0 1 0 10.07 10.07 10.08 10.08 0 0 0 -10.07-10.07zm0 17.14a7.07 7.07 0 1 1 7.07-7.07 7.08 7.08 0 0 1 -7.07 7.07z" fill="url(#linear-gradient)" style="fill: #536bb7;"></path></g></svg>
			<span class="numbers"><?= $arResult['SHOW_COUNTER']; ?></span>
		</div>

		<div class="date"><?= $arResult['ACTIVE_FROM']; ?></div>
	</div>

	<h1 class="main-title">
		<?= $arResult['NAME']; ?>
		<span style="display: none;">.</span>
	</h1>

	<div class="preview-text">
		<?= $arResult['~PREVIEW_TEXT']; ?>
	</div>

	<div class="menu_box hide">
		<h2 class="sub_title menu_title">Содержание</h2>
		<ol class="artic_menu">
			 <!-- <li><a href="#">первый</a></li> -->
		</ol>
	</div>
	
	<div class="main-text">
		  <?= $arResult['~DETAIL_TEXT']; ?>
	</div>

	<div class="sosial_box">
		<p class="sosial_title">Поделиться записью или сохранить:</p>
		<script src="https://yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,odnoklassniki,telegram,viber,whatsapp,moimir,pinterest"></div>
	</div>

	<?php 
		/*Похожие статьи по тегам*/
		$tags = $arResult['PROPERTIES']['TAGS']['VALUE'];
		$id = $arResult['ID'];

		$similar = Return_All(
			Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y", "PROPERTY_TAGS" => $tags, "!ID" => $id),
			Array('ID','NAME','DETAIL_PAGE_URL')
		);

		//debug($arResult['PROPERTIES']);
	?>
	<?php if(($arResult['PROPERTIES']['TAGS']['VALUE'] != '') and (count($similar) != 0)): ?>
		<h2 class="sub_title">Также будет интересно</h2>
		<?php $j=0; ?>
		<ul class="similar main-text">
		<?php foreach ($similar as $item): ?>
		<?php 
			$j++;
			if($j==8) break;
		?>
			<li><a href="<?= $item['DETAIL_PAGE_URL']; ?>"><?= $item['NAME']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>

<?php 
	$next_news_url = Next_News_Check(3,$arResult['ACTIVE_FROM']);
?>
	<div class="rules-line">
		<a id="go-back" href="<?= 'https://'.$_SERVER['HTTP_HOST'].'/blog/' ?>">
			<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
			<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
			Вернуться в блог
		</a>
<?php if($next_news_url != 'no'): ?>
		<div class="delimeter"></div>
		<a id="next-article" href="<?= $next_news_url; ?>">
			Следующая статья
			<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
			<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
		</a>
<?php endif; ?>
	</div>
</section>





<script type="text/javascript">

	var counter_two = 0;
	var delta;

	BX.addCustomEvent('onAjaxSuccess', function() 
	{
		var pos_y = document.querySelector('.delimeter-header').getBoundingClientRect().top;
		counter_two++;

		if((counter_two % 2) == 1)
		{
			delta = 1;
		}
		else
		{
			delta = -1;
		}
		
		window.scrollBy({
			top: pos_y + delta,
			left: 0,
			behavior: 'smooth'
		});
	});


	/************оглавление************/

	function Scroll_to_elements(selector)
	{
		var smoothLinks = document.querySelectorAll(selector);

		for (let item of smoothLinks)
		{
			item.addEventListener('click', function (e) 
		    {
		        e.preventDefault();
		        var id = item.getAttribute('href');
		        var pos_y = document.querySelector(id).getBoundingClientRect().top;
		        window.scrollBy({
					top: pos_y - 110,
					left: 0,
					behavior: 'smooth'
				});
		    });
		}
	}

	var menu_refs = document.querySelectorAll('.article .menu_ref');
	if(menu_refs.length != 0)
	{
		document.querySelector('.menu_box').classList.remove('hide');
		var list_box = document.querySelector('.artic_menu');
		var j = 0;
		for(let item of menu_refs)
		{
			j++;
			let id = 'title_' + j;
			item.id = id;

			let li = document.createElement('li');
			let a_ref = document.createElement('a');
			a_ref.href = '#' + id;
			a_ref.innerHTML = item.innerHTML;
			li.appendChild(a_ref);
			list_box.appendChild(li);
		}
	}

	Scroll_to_elements('.article .artic_menu li a');
	
	/************оглавление************/
</script>




