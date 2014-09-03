<?php

class TracksController extends Controller{


	public function actionIndex(){

		$this->render('index');

	}

	

	public function actionByid($id,$student=null){

		// если студент не задан специально, значит это мы

		if(!isset($student)){ $student =$_SESSION['user']; }

		// получим трек, задания, решения и студентов

		$track = Tracks::model()->with(

			array('Tasks.Solutions'=>array('on'=>'Solutions.student='.$_SESSION['user']))

		)->findByPk($id,array('order' => 'Tasks.order'));

		// посчитаем прогресс по треку
	
		// $track->stat = stathelper::trackstat($track->Tasks);

		// Проверим случай деления на ноль сперва
			 
		// отобразим наш трек 

		$this->render("single",array("track"=>$track));

	}


	public function actionBycode($code=null,$student=null){

		$this->actionByid(Tracks::model()->findByAttributes(array("code"=>$code))->id,$student);

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