<?php if(isset($video->id)): ?>

	<a href="/docs/<?php echo $video->id; ?>" class="btn default pull-right">Перейти к документу</a>

<?php endif; ?>

<a href="/docs/create" class="btn btn-primary pull-right">Добавить новый</a>

<h2>Редактирование Документа</h2>

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<div class="row">

		<div class="col-sm-12">

			<label for="">Название документа</label>

			<?php echo $form->textField($doc,'title',array('class'=>'form-control') ); ?>

			<label for="">Описание документа</label>

			<?php echo $form->textArea($doc,'description',array('class'=>'form-control') ); ?>

			<!--  -->

			<label for="">Обложка документа</label>

			<?php echo $form->textField($doc,'picture',array('class'=>'form-control') ); ?>

			<!--  -->
 

			<label for="">Ссылка на документ</label>

			<?php echo $form->textField($doc,'link',array('class'=>'form-control') ); ?>


	 
			
			<button type="submit" class="btn btn-success">Сохранить</button>

		</div>

	</div>

<?php $this->endWidget(); ?>

