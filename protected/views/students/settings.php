

<h2>Настройки профиля</h2>

<hr>

<h4>Подписаться на треки</h4>

<?php

	$settings = new Settings();

	$settings->findByPk(Yii::app()->my->id);

?>


	<?php $form=$this->beginWidget('CActiveForm'); ?>

		<?php $list = CHtml::listData(Courses::model()->findAll(), 'id', 'title'); ?>	

		<?php echo $form->checkboxList($settings,'courses',$list,array("multiple"=>true)); ?>

		<hr>	

		<button type="submit " class="btn btn-success ">Сохранить</button>

	<?php $this->endWidget(); ?>


<?php


?>