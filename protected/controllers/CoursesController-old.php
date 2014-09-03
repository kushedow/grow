<?php

class CoursesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionByid($id){

		$this->render('single',$data);
		 
	}

	public function actionBycode($code,$student=null){

		$course = Courses::model()->findByAttributes(array("code"=>$code));

		$tracks = Tracks::model()->with(array('Tasks.Solutions'=>array('on'=>'solutions.student='.$_SESSION['user']))->findAllByAttributes(array("course"=>$course->id));

		$this->render('single',array("course"=>$course,"tracks"=>$tracks));
		 

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