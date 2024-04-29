<?php 
	$stack = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>19, "ACTIVE"=>"Y"),
		Array()
	);
	//debug($stack);
	$max_elems = 4; //максимальное количество элементов в левой колонке
	$all_elems = count($stack);
	$flag = true;
	if($all_elems <= $max_elems)
	{
		$max_elems = $all_elems;
		$flag = false;
	}
?>

<section class="stack no-section">
	<div class="wrap">
		<h2 class="main-title">Стек технологий</h2>
		<p class="sub_title">
			Наше агентство использует широкий стек разработки, что позволяет подбирать индивидуальные решения в зависимости от технологических потребностей
		</p>

		<div class="stack_basket">
			<div class="left column">
				<?php for ($i = 0; $i <= $max_elems-1; $i++): ?>
					<div class="stack_box">
						<div class="number"><?= Number_Converter($i+1); ?></div>
						<div>
							<h2 class="stack_title">
								<?= $stack[$i]['fields']['NAME']; ?>
							</h2>
							<div class="stack_items">
								<?php foreach ($stack[$i]['props']['SECT_STACK']['VALUE'] as $name_stack): ?>
									<div class="stack_it"><?= $name_stack; ?></div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>

			<?php if($flag): ?>
				<div class="right column">
					<?php for ($i = $max_elems; $i <= $all_elems-1; $i++): ?>
						<div class="stack_box">
							<div class="number"><?= Number_Converter($i+1); ?></div>
							<div>
								<h2 class="stack_title">
									<?= $stack[$i]['fields']['NAME']; ?>
								</h2>
								<div class="stack_items">
									<?php foreach ($stack[$i]['props']['SECT_STACK']['VALUE'] as $name_stack): ?>
										<div class="stack_it"><?= $name_stack; ?></div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>