<h4 class="pull-right">Куратор: <?php echo $data->Curator->fullname; ?></h4>

<h2><?php echo $data->title ?>: <span class="text-muted"><?php if($data->Course){echo $data->Course->title;}else{echo "Курс не выбран";} ?></span></h2>

<div class="row">

	<?php foreach ($data->Students as $student): ?>

		<?php $this->renderPartial("student_view",array("data"=>$student,"course"=>$data->Course)); ?>  

	<?php endforeach; ?>

</div>