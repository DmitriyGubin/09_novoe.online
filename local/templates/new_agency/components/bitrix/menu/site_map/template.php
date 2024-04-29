<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 

$serv = Return_All(
	Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_SERV_CAT", "PROPERTY_SHOW_SUB_SERV", "DETAIL_PAGE_URL", "CODE")
);

//debug($serv);

$cat = Return_List_Variants(4, 'SERV_CAT');

$blog = Return_All(
	Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL")
);
//debug($sub_mob);

?>

<ul class="main-map">
<?if (!empty($arResult)):?>

<?foreach($arResult as $arItem): ?>

<?php if($arItem["LINK"] == '/services/'): ?>
	<li class="more_items">
		<div class="text_arrow">
			<a href="<?= $arItem["LINK"]; ?>"><?= $arItem["TEXT"]; ?></a>		
			<svg class="arrow_header" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 1L6 6L11 1" stroke="black" stroke-linecap="round" stroke-linejoin="round">
				</path>
			</svg>
		</div>
		<ul class="sub_menu" style="display: none;">
		<?php foreach ($cat as $cat_name): ?>
			<li class="more_items">
				<div class="text_arrow">
					<a><?= $cat_name ?></a>		
					<svg class="arrow_header" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L11 1" stroke="black" stroke-linecap="round" stroke-linejoin="round">
						</path>
					</svg>
				</div>

				<ul class="sub_menu" style="display: none;">
					<?php foreach ($serv as $serv_item): ?>
						<?php if($serv_item['PROPERTY_SERV_CAT_VALUE'] == $cat_name): ?>
							<?php 
								$name_serv = $serv_item['NAME']; 
								$url_serv = $serv_item['DETAIL_PAGE_URL'];
								$code_serv = $serv_item['CODE'];
							?>
							<?php if($serv_item['PROPERTY_SHOW_SUB_SERV_VALUE'] == 'YES'): ?>
							<?php 
								$sub_serv = Return_Sub_Items($code_serv);
							?>
								<li class="more_items">
									<div class="text_arrow">
										<a href="<?= $url_serv; ?>"><?= $name_serv; ?></a>		
										<svg class="arrow_header" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 1L6 6L11 1" stroke="black" stroke-linecap="round" stroke-linejoin="round">
											</path>
										</svg>
									</div>

									<ul class="sub_menu" style="display: none;">
										<?php foreach ($sub_serv as $sub_item): ?>
											<li>
												<a href="<?= $sub_item['DETAIL_PAGE_URL']; ?>">
													<?= $sub_item['NAME']; ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php else: ?>
								<li>
									<a href="<?= $url_serv; ?>">
										<?= $name_serv; ?>
									</a>
									<!-- здесь -->
								</li>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
		</ul>
	</li>
<?php elseif($arItem["LINK"] == '/blog/'): ?>
	<li class="more_items">
		<div class="text_arrow">
			<a href="<?= $arItem["LINK"]; ?>"><?= $arItem["TEXT"]; ?></a>		
			<svg class="arrow_header" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 1L6 6L11 1" stroke="black" stroke-linecap="round" stroke-linejoin="round">
				</path>
			</svg>
		</div>
		
		<ul class="sub_menu" style="display: none;">
			<?php foreach ($blog as $blog_item): ?>
				<li>
					<a href="<?= $blog_item['DETAIL_PAGE_URL']; ?>">
						<?= $blog_item['NAME']; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</li>
<?php else: ?>
	<li><a href="<?= $arItem["LINK"]; ?>"><?= $arItem["TEXT"]; ?></a></li>
<?php endif; ?>

<?endforeach?>

</ul>

<?endif?>

