<?php

/**
*
* Показываем редактирование или создание одного курсаа
*
*
**/

?>

<h2>Редактирование курса</h2>

<?php if($course->id): ?>

	<a href="/course/<?php echo $course->id; ?>" class="btn btn-sm pull-right">Назад к курсу</a>

<?php endif; ?>

<?php $form=$this->beginWidget('CActiveForm'); ?>


	
	<!-- Название -->

	<label for="">Название</label>

	<?php echo $form->textField($course,'title',array('class'=>'form-control') ); ?>
	
	<br>

	<label for="">Код курса</label>

	<?php echo $form->textField($course,'code',array('class'=>'form-control') ); ?>
	
	<br>

	<label for="">Описание курса</label>

	<?php echo $form->textField($course,'description',array('class'=>'form-control') ); ?>
	
	<br>

	<label for="">Картинка</label>

	<?php echo $form->textField($course,'image',array('class'=>'form-control') ); ?>
	
	<br>

	<label for="">Иконка</label>

	<?php echo $form->textField($course,'icon',array('class'=>'form-control') ); ?>
	
	<br>

	<!-- /Название -->


	<!-- Выводим кнопку действия -->

	<?php if($course->id): ?>
		<button type="submit " class="btn btn-success ">Сохранить</button>
	<?php else: ?>
		<button type="submit " class="btn btn-success btn-block">Создать</button>
	<?php endif; ?>

	<!-- / Выводим кнопку действия -->


<?php $this->endWidget(); ?>