<?php if($task->active): ?>
	

	<?php foreach ($task->Solutions[0]->Comments as $comment): ?>
	
		<div class=" alert alert-default comment">
				
				<p class="small">

					<?php if(isset($comment->Student)): ?><b><?php echo $comment->Student->fullname; ?>:</b><?php endif; ?>

				 <?php echo htmlspecialchars( $comment->comment); ?></p>
				 
		</div>

	<?php endforeach; ?>
 

	<?php $builder = new Controller(); ?>

	<?php $comment = new Comments(); ?>	

	<?php $form=$this->beginWidget('CActiveForm'); ?>

		<?php echo $form->textArea($comment,'comment',array('class'=>'form-control')); ?>

		<input type="hidden" name="Comments[model]" value="Solutions">
		<input type="hidden" name="Comments[student]" value=<?php echo Yii::app()->my->id; ?>>
		<input type="hidden" name="Comments[id]" value="<?php echo $task->Solutions[0]->id; ?>">

		<br>

		<button type="submit " class="btn btn-default btn-block">Добавить комментарий</button>

	<?php $this->endWidget(); ?>
	
<?php else: ?>

<p class="alert alert-default">Сохраните задание, чтобы добавлять комментарии</p>

<?php endif; ?>

