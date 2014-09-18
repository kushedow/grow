<?php

class GroupsController extends Controller
{
	public function actionIndex(){
	
		$this->render('index');


	}

	public function actionbycode($code){

		$group = Groups::model()->with(array("Students","Course.Tracks"))->findByAttributes(array("code"=>$code));
	
		$this->render('single',array("group"=>$group));

	}

	/**
	*
	*
	*
	**/

	public function actionTracks($code){

		

		//$this->render('tracks', array('key'=>value));
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