<h2>Редактирование вопрос-ответов</h2>

<!-- 


	'id' => 'ID',
			'title' => 'Title',
			'answer' => 'Answer',
			'course' => 'Course',
			'track' => 'Track',
			'order' => 'Order',


 -->


<?php $form=$this->beginWidget('CActiveForm'); ?>

	<div class="row">

		<div class="col-md-12">

			<label for="">Вопрос</label>

			<?php echo $form->textField($faq,'title',array('class'=>'form-control') ); ?>


			<!--  -->


			<label for="">Ответ</label>

			<?php echo $form->textArea($faq,'answer',array('class'=>'form-control wysihtml5','data-stylesheet-url'=>'assets/css/wysihtml5-color.css')); ?>	

		</div>

	</div>

	<br>
	<div class="row">


		<div class="col-md-4">

			<label for="">Порядок</label>

			<?php echo $form->textField($faq,'order',array('class'=>'form-control') ); ?>
			
		</div><!-- /.col-md-4 -->
 

		<div class="col-md-4">
			
			<label for="">Трек, которому принадлежит видео</label>

			<?php echo $form->dropDownList($faq,'track',CHtml::listData(Tracks::model()->findAll(),'id','title'),array('class'=>'form-control') ); ?>
			
		</div><!-- /.col-md-4 -->

		

		<div class="col-md-4">

			<label for="">&nbsp;</label>	

			<button type="submit" class="btn btn-success form-control">Сохранить</button>
			
		</div><!-- /.col-md-4 -->

 

	</div>

<?php $this->endWidget(); ?>

<!-- Подключим стили и скрипты визуального редактора  -->

<link rel="stylesheet" href="assets/js/wysihtml5/bootstrap-wysihtml5.css">

<script src="assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
<script src="assets/js/wysihtml5/bootstrap-wysihtml5.js"></script>






