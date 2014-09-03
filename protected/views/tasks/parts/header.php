<div class="crumbtainer">

	<ol class="breadcrumb bc-3">
		<li>
			<strong><a href="/course/<?php echo $task->Tracks->Course->code; ?>"><?php print_r($task->Tracks->Course->title); ?></a></strong>
		</li>
		<li>
			<a href="/track/<?php echo $task->Tracks->id; ?>"><strong><?php echo $task->Tracks->title; ?></strong></a>
		</li>
		
		<li class="active">
			<strong><?php print_r($task->title); ?></strong>
		</li>



	</ol>



<?php  $this->renderPartial("parts/status",array("task"=>$task));  ?>

<div class="btn pull-right" id="stopwatch">Засечь время</div>

</div>

<style>
	

.page-container .main-content{padding-top: 70px !important;}

</style>