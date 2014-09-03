<?php  $this->layout = "task"; ?>


<?php $this->renderPartial("parts/header",array("task"=>$task)); ?>


<?php // здесь должно идти разделение ?>


<?php $this->renderPartial("/tasks/layouts/".$layout,array("task"=>$task,"layout"=>$layout)); ?>