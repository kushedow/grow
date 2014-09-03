<?php

class DocsController extends Controller{

	public function actionIndex(){
	
		$docs = Docs::model()->with("Students")->findAll();

		$this->render("index",array("docs"=>$docs));

	}

	public function actionAdd($doc){
		
		$id =  Yii::app()->my->id;

		$me = Students::model()->findByPk($id);

		//$me->addRelationRecords("Docs",array($doc));

		$me->addRelationRecords('Docs',array($doc));

		$this->actionMy();

	}


	/**
	*
	* Добавить книги в мою коллекция 
	* @return true 
	*
	**/

	public function actionMy(){

		$profile = Students::model()->with("Docs")->findByPk(Yii::app()->my->id);

		$docs = $profile->Docs;

		$this->render("my",array("docs"=>$docs));

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