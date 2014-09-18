<?php  $this->layout = "task"; ?>


<?php $this->renderPartial("parts/header",array("task"=>$task)); ?>


<?php // здесь должно идти разделение ?>


<?php $this->renderPartial("/tasks/layouts/".$layout,array("task"=>$task,"layout"=>$layout)); ?>

<?php if(Yii::app()->my->access("check") ): ?>

	<hr>

	<strong>Всего решений</strong?: <?php echo Solutions::model()->countByAttributes(array("task"=>$task->id)); ?>, принято <?php echo Solutions::model()->countByAttributes(array("task"=>$task->id,"status"=>"complete")); ?>

	<hr>

<?php endif; ?>
