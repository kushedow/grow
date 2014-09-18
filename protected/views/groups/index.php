<?php
/* @var $this GroupsController */
?>

<?

	$criteria = new CDbCriteria;
	$criteria->order ="id DESC";   

	$dataProvider=new CActiveDataProvider('Groups', array(

	  'criteria'=>$criteria,
	  'countCriteria'=>$criteria,
	  'pagination'=>array('pageSize'=>25), 

	));

?>

<ol class="breadcrumb bc-3">
	<li>
		<a href="/"><i class="entypo-home"></i>Консоль</a>
	</li>
	<li>
		<a href="/groups">Группы</a>
	</li>
</ol>

<table class="table">

<?php
// $dataProvider->getData() will return a list of Post objects

// print_r($dataProvider);

$this->widget('zii.widgets.CListView', array(

    'dataProvider'=>$dataProvider,
    'itemView'=>'group_view', 
    
    'template' => '<table class="table">{items}</table>'

));

?>

</table>
