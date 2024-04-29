<?php 
$quests = Return_All(
	Array("IBLOCK_ID"=>$iblock_idd, "ACTIVE"=>"Y"),
	Array("ID", "IBLOCK_ID", "NAME","PREVIEW_TEXT")
);
?>

<section class="questions wrap no-section">
	<h2 class="main-title">Часто задаваемые вопросы</h2>
	<?php foreach ($quests as $quest_item): ?>
		<div class="quest-tab">
			<div class="quest-item">
				<h2 class="quest-title"><?= $quest_item['NAME']; ?></h2>

				<svg class="arrow rotate-out" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.44 12.44a1 1 0 001.41 1.41l5.3-5.29a1 1 0 000-1.41l-5.3-5.3a1 1 0 00-1.41 1.42L9.67 7.5c.2.2.2.51 0 .7l-4.23 4.24z"></path></svg>
			</div>

			<div class="tab-item no-height">
				<div>
					<?= $quest_item['~PREVIEW_TEXT']; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</section>

<script type="text/javascript">
	var elements = document.querySelectorAll('.questions .quest-tab');
	for (let item of elements)
	{
	    item.addEventListener("click", function(){
	        item.querySelector('.arrow').classList.toggle('rotate-in');
	        item.querySelector('.arrow').classList.toggle('rotate-out');
	        item.querySelector('.tab-item').classList.toggle('no-height');
	    });
	}
</script>