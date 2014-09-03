<h2>Создание пользователя</h2>

<hr>

 <?php $form=$this->beginWidget('CActiveForm'); ?>

 <div class="row">
 	
	<div class="col-md-4">

		<label for="">Имя</label>

		<?php echo $form->textField($student,'shortname',array('class'=>'form-control')); ?>

	 	<label for="">Полное имя</label>

		<?php echo $form->textField($student,'fullname',array('class'=>'form-control')); ?>

	 	<label for="">Ссылка на юзерпик</label>
		<?php echo $form->textField($student,'avatar',array('class'=>'form-control')); ?>
			

	</div> <!-- /.col-md-4 -->

	<div class="col-md-4">

	 	<label for="">Почта</label>
		<?php echo $form->textField($student,'mail',array('class'=>'form-control')); ?>

	 	<label for="">id Вконтакте</label>
		<?php echo $form->textField($student,'vkid',array('class'=>'form-control')); ?>

	 	<label for="">Телефон</label>
		<?php echo $form->textField($student,'phone',array('class'=>'form-control')); ?>

	</div> <!-- /.col-md-4 -->

	<div class="col-md-4">

	 	<label for="">Роль</label>
		<?php echo $form->textField($student,'role',array('class'=>'form-control')); ?>
 
	 	<label for="">Пароль</label>
		<?php echo $form->passwordField($student,'pass',array('class'=>'form-control')); ?>

	</div> <!-- /.col-md-4 -->	


 </div> <!-- /.row -->

 	

 	<label for="">Группы</label>
	<?php echo $form->dropDownList($student,'Groups',CHtml::listData(Groups::model()->findAll(),'id','title'),array("multiple"=>true,"class"=>"form-control")); ?>

				


	<br>
	<br>
	<button type="submit" class="btn btn-success btn-block">Сохранить</button>

 <?php $this->endWidget(); ?>


