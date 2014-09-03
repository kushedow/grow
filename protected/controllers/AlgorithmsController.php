<?php

class AlgorithmsController extends Controller
{
	public function actionIndex(){

		$algorithms = Algorithms::model()->findAll();

		$this->render('index',array("algorithms"=>$algorithms));
	}

	public function actionPreview($id){

		$algorithm = Algorithms::model()->with("Tracks.Docs")->findByPk($id);

		$this->render('preview',array("algorithm"=>$algorithm));

	}

	public function actionCreate($value=''){
		
		$algorithm = new Algorithms();

		$algorithm->steps = "[{}]";

		if(isset($_REQUEST['Algorithms'])){


			$algorithm->title = $_REQUEST['Algorithms']['title'];
			$algorithm->description = $_REQUEST['Algorithms']['description'];
			$algorithm->steps = $_REQUEST['Algorithms']['steps'];
			
			if($algorithm->save()){  


				Yii::app()->notify->add("Алгоритм создан"); 

				$this->redirect( array('/algorithms/'.$algorithm->id.'/edit') );

			}



		}

		$this->render('edit',array("algorithm"=>$algorithm));

	}

	public function actionBycourse($code){

		$course = Courses::model()->with("Tracks.Algorithms")->findByAttributes(array("code"=>$code));

		if(!$course){ 

			Yii::app()->notify->add("Курс не найден","warning"); 
			$this->render('/site/index'); 
			return false;

		}

		$this->render('bycourse', array('course'=>$course));

	}

	public function actionEdit($id){

		$algorithm = Algorithms::model()->findByPk($id);

		if(isset($_REQUEST['Algorithms'])){

			$algorithm->steps = $_REQUEST['Algorithms']['steps'];

			$algorithm->title = $_REQUEST['Algorithms']['title'];

			if(isset($_REQUEST['Algorithms']['Tracks'])){ $algorithm->setRelationRecords("Tracks", $_REQUEST['Algorithms']['Tracks']); };

			$algorithm->description = $_REQUEST['Algorithms']['description'];	

			if($algorithm->save()){Yii::app()->notify->add("Обновлено","success");}

		}

		$this->render('edit',array("algorithm"=>$algorithm));
		 
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}