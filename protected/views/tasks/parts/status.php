
<?php

	$options = statushelper::options();

	if($task->active){ 

		$solution = $task->Solutions[0]; $status = $solution->status; 

		$student = $task->Solutions[0]->student;

	}else {$status = "undefined";}

	$student = $_SESSION['user'];
	
?>

<div class="btn-group pull-right">

	<button type="button" class="btn btn-<?php echo $options[$status]['bgcolor'] ?> dropdown-toggle" data-toggle="dropdown">
		<i class="entypo-<?php echo $options[$status]['icon'] ?>"></i> <?php echo $options[$status]["full"] ?><span class="caret"></span>
	</button>

	<ul class="dropdown-menu " role="menu">

		<?php if($task->active): ?>
		
			<?php foreach ($options as $key=>$option): ?>

				<li><a href="/task/<?php echo $task->id; ?>/<?php echo $student;?>/set/<?php echo $key; ?>" class="text-success"><?php echo $option['full']; ?></a></li>
			
			<?php endforeach; ?>
		
		<?php endif; ?>
		

		<li class="divider"></li>

		<li><a href="/task/<?php echo $task->id; ?>/restart">Начать с начала</a> </li>

		<?php if(Yii::app()->my->access("edit")): ?>

			<li><a href="/task/<?php echo $task->id; ?>/edit" class="">Редактировать</a></li>
 	
		<?php endif; ?>

		<!-- <li><a href="#">Показать в портфолио</a> -->

		
	</ul>
</div>