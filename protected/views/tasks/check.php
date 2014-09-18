<span class=" btn btn-primary pull-right">Всего проверено: <?php echo Solutions::model()->countByAttributes(array("status"=>"complete")); ?></span>

<h2>Все <?php echo count($solutions) ?> заданий на проверку</h2>

<br>
<table class="table">
	
	<?php foreach ($solutions as $solution): ?>

		<?php if(!isset($solution->Task)){continue;} ?>
	
		<tr>
			<td> 

				<?php if(isset($solution->Task->title)): ?>

					<?php statushelper::microlabel($solution->status) ?>

					<a href="student<?php echo $solution->student; ?>/task<?php echo $solution->task; ?>" target="blanc">

						<strong class="track-title"><?php echo $solution->Task->Tracks->title; ?></strong> → <?php echo $solution->Task->title; ?>

					</a>

				<?php endif; ?>
					

				<?php if(isset($solution->Student)): ?>
					
					<a href="" class=" pull-right"><?php echo $solution->Student->fullname; ?></a>
					
				<?php endif; ?>
						
				
			</td>
		</tr>
	
	<?php endforeach; ?>
	

</table>