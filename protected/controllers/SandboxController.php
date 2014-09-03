<?php

/**
*
*
*  
*
*
**/

class SandboxController extends Controller{


	public function actionIndex(){

		$buckets = Buckets::model()->findAllByAttributes(array("student"=>Yii::app()->my->id));

		$this->render('index',array("buckets"=>$buckets));

	}

	public function actionFork($id){

		$bucket = Buckets::model()->findByPk($id);

		$data = $bucket->attributes;

		$new = new Buckets();

		$new->setAttributes($data, false);

		$new->id = null;

		$new->student = Yii::app()->my->id;

		$new->save();

		// $this->render("preview",array("bucket"=>$bucket));

		Yii::app()->notify->add("Что-то пошло не так");

		$this->redirect(array('/sandbox/'.$new->id.'/edit') );
		
	}

	public function ActionCreate(){

		if(isset($_REQUEST['Buckets'])){

			// Yii::app()->notify->add("Данные получены");

			$bucket = new Buckets();

			$bucket->student = Yii::app()->my->id;

			$bucket->title = $_REQUEST['Buckets']['title'];
			$bucket->html = $_REQUEST['Buckets']['html'];
			$bucket->css = $_REQUEST['Buckets']['css'];
			$bucket->js = $_REQUEST['Buckets']['js'];

			if($bucket->save()){ 

				Yii::app()->notify->add("Данные сохранены");

				$this->redirect( array('/sandbox/'.$bucket->id.'/edit') );


			}else{

				Yii::app()->notify->add("Не удалось сохранить песочницу");
				Yii::app()->notify->addErrors($bucket->getErrors());

			}

		}
		
		$bucket = new Buckets();

		$this->render("edit",array("bucket"=>$bucket));

	}

	public function ActionEdit($id){
		
		$bucket = Buckets::model()->findByPk($id);

		if(!$bucket){Yii:app()->notify->add("Файл не найден в песочнице"); $this->render("/site/index");return false; }

		if($bucket->student != Yii::app()->my->id){ii:app()->notify->add("У вас нет прав для редактирования этого файла"); $this->render("/site/index");return false; }

		if(isset($_REQUEST['Buckets'])){

			$bucket->html = $_REQUEST['Buckets']['html'];
			$bucket->css = $_REQUEST['Buckets']['css'];
			$bucket->js = $_REQUEST['Buckets']['js'];

			$bucket->title = $_REQUEST['Buckets']['title'];

		}

		if($bucket->save()){

			Yii::app()->notify->add("Песочница обновлена","success"); 

		}

		$this->render("edit",array("bucket"=>$bucket));

	}

	public function ActionPreview($id){
		
		$bucket = Buckets::model()->findByPk($id);

		if(!$bucket){Yii::app()->notify->add("Файл не найден в песочнице"); $this->render("/site/index"); return false;}

		$this->render("preview",array("bucket"=>$bucket));

	}


	/**
	*
	*  
	*
	**/

	public function actionForm(){
		

		echo " <h2>На сервер были переданы данные:</h2>";
		echo " <h4>GET-запрос:</h4>";		

		foreach ($_GET as $key=>$value): 
			echo "<p> ".$key." = ".$value."</p>";		
		endforeach;
		
		echo " <h4>POST-запрос:</h4>";		

		foreach ($_POST as $key=>$value): 
			echo "<p> ".$key." = ".$value."</p>";		
		endforeach;

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