<?php
/* @var $this SandboxController */

?>

<a href="/sandbox/new" class="btn btn-primary pull-right">Добавить</a>			

<h2>Песочница</h2>

<table class="table">

	<?php foreach ($buckets as $bucket): ?>

		<tr>
			<td>
				<a href="/sandbox/<?php echo $bucket->id ?>/preview">
				
					<?php echo $bucket->title ?>
					<?php if(strlen($bucket->title)<1): ?>
					
						Без названия
					
					<?php endif; ?>
					
				</a>
			</td>
		</tr>

	<?php endforeach; ?>

</table>
