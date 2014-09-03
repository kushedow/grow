

<h2>Редактирование Видео</h2>


<?php $form=$this->beginWidget('CActiveForm'); ?>

	<div class="row">

		<label for="">Название видео</label>

		<?php echo $form->textField($video,'title',array('class'=>'form-control') ); ?>



		<!--  -->

		<label for="">Автор</label>

		<?php echo $form->textField($video,'author',array('class'=>'form-control') ); ?>



		<!--  -->

		<label for="">Длительность</label>

		<?php echo $form->textField($video,'time',array('class'=>'form-control') ); ?>



		<!--  -->

		<label for="">Ссылка на видео</label>

		<?php echo $form->textField($video,'link',array('class'=>'form-control') ); ?>


		<!--  -->

		<label for="">Код для встраивания</label>

		<?php echo $form->textArea($video,'embed',array('class'=>'form-control') ); ?>


		<!--  -->

		<label for="">Трек, которому принадлежит видео</label>

		<?php echo $form->dropDownList($video,'track',CHtml::listData(Tracks::model()->findAll(),'id','title')); ?>
		
		<button type="submit" class="btn btn-success">Сохранить</button>

	</div>

<?php $this->endWidget(); ?>

