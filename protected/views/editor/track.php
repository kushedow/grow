<?php if($track->id ): ?>

	<a href="/track/<?php echo $track->code; ?>" class="btn btn-sm pull-right">Назад к задаче</a>
	 
<?php endif; ?>

<h2><?php echo $track->title; ?>: </h2>

<h4>Редактирование темы (трека) </h2>

<?php $form=$this->beginWidget('CActiveForm'); ?>
 
<br>

<div class="row">
	
	<div class="col-md-4">
			
		<label for="">Название трека</label>
		<?php echo $form->textField($track,'title',array('class'=>'form-control') ); ?>

		<br>

		<label for="">Описание  трека</label>
		<?php echo $form->textArea($track,'description',array('class'=>'form-control') ); ?>

		<br>

		<label for="">Код трека</label>
		<?php echo $form->textField($track,'code',array('class'=>'form-control') ); ?>

		<br>
		
		<label for="">Порядок трека</label>
		<?php echo $form->textField($track,'order',array('class'=>'form-control') ); ?>

	</div>

	<div class="col-md-8">
		
		Задания
			
		<div id="list-1" class="nested-list dd with-margins"><!-- adding class "with-margins" will separate list items -->			
				
			<ul class="dd-list">
				
				<?php foreach ($track->Tasks as $item): ?>
				
					<li class="dd-item">
						<div class="dd-handle">
							<?php echo $item->title; ?>
						</div>
					</li>	

				<?php endforeach; ?>

			</ul>
				
		</div>


	</div>   <!-- /.col-md-8 -->



</div> <!-- /.row -->
 
	<br>Презентации <br>

	<?php echo $form->dropDownList($track,'Docs',CHtml::listData(Docs::model()->findAll(),'id','title'),array("multiple"=>true)); ?>
	
	<br>Алгоритмы<br>

	<?php echo $form->dropDownList($track,'Algorithms',CHtml::listData(Algorithms::model()->findAll(),'id','title'),array("multiple"=>true)); ?>
	

	<br><br>
	<button type="submit" class="btn btn-success btn-lg">Сохранить</button>

<?php $this->endWidget(); ?>

<hr>

<script>
	
jQuery(document).ready(function($){

	$('#list1').nestable({});

	alert(1774);
});

</script>
