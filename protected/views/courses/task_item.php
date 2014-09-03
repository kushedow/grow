<?php if(count($task->Solutions)>0): ?>

	<?php if($task->Solutions[0]->status=="complete"): ?>

		<a href="/task/<?php echo $task->id; ?>" class="text-success bold"><i class="entypo-check"></i><?php echo $task->title; ?></a>

	<?php else: ?>

		<a href="/task/<?php echo $task->id; ?>" class=" bold"><i class="entypo-clock"></i><?php echo $task->title; ?></a>

	<?php endif; ?>

<?php else:?>
	
	<a href="/task/<?php echo $task->id; ?>" class="text-muted bold"><i class="entypo-cancel"></i><?php echo $task->title; ?></a>

<?php endif; ?>