<?php if(!(Yii::app()->my->access("check"))): ?>

 	У вас нет доступа к этой странице 

<?php exit(); endif; ?>


<h2>Добавление бонуса для студента</h2>
<hr>

 	<?php $form=$this->beginWidget('CActiveForm'); ?>

	<div class="row">
		 
	    <span class="col-sm-2">	<span class="btn">Бонус для <strong><?php echo $student->fullname; ?></strong></span></span>
	    <span class="col-sm-1">	<?php echo $form->textField($point,'earned',array('class'=>'form-control',"value"=>"1")); ?> </span>
	    <span class="col-sm-7">	<?php echo $form->textField($point,'comment',array('class'=>'form-control',"value"=>"","placeholder"=>"За что добавлены бонусы")); ?> </span>
	    <span class="col-sm-2">	<button class="btn btn-success">Добавить</button> </span>
	
	</div>

		<input type="hidden" name="Points[student]" value="<?php echo $student->id;?>">
		<input type="hidden" name="Points[by]" value="<?php echo Yii::app()->my->id;?>">

	<?php $this->endWidget(); ?>


<hr>

<h4>Все поинты студента</h4>

<?php

	$points = Points::model()->findAllByAttributes(array("student"=>$student->id));

?>

<!-- Выведем ранее полученные поинты и бонусы -->

<table class="table">

	<?php foreach ($points as $point): ?>

		<tr>
			<td><span class="label <?php if($point->earned > 0): ?>label-success<?php else: ?> label-secondary<?php endif; ?>">+ <?php echo $point->earned; ?> поинт</span> <?php echo $point->comment; ?></td>
		</tr>

	<?php endforeach; ?>

</table>
