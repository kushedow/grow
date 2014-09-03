<?php

class StudentsController extends Controller{

	public function actionIndex(){

		/// if(!Yii::app()->my->access("students")){ return false;}

		$students = Students::model()->with("Groups")->findAll();

		$this->render('index', array('students'=>$students));

	}

	public function actionCreate(){

		if(!Yii::app()->my->access("users")){ return false;}

		$student = new Students();

		if(isset($_REQUEST['Students'])){

			 // добавляем вручную, какие поля будем перезаписывать

			$record = array("shortname","fullname","phone","vkid","pass","avatar","mail");

			foreach ($record as $key) {

				$student->$key = $_REQUEST['Students'][$key];

			}

			if ( $student->save()) { 

				Yii::app()->notify->add("Студент создан","success"); 

				$this->render("profile",array("student"=>$student));

			}

		} else {

			// просто делаем новую страничкуы

		}

		$this->render('edit', array('student'=>$student));
		
	}

	public function ActionProfile($id){
		//Yii::app()->notify->add("Это ваш профиль");
		
		$student = Students::model()->with("Solutions.Task")->findByPk($id);

		if(isset($_REQUEST['Students'])){

			// запрещаем редактирование, если это не мы

			//if(Yii::app()->my->id==$student->id OR !(Yii::app()->my->access("users")){ return false;	}  

			// добавляем вручную, какие поля будем перезаписывать

			$record = array("shortname","fullname","phone","vkid","pass","avatar","mail");


			foreach ($record as $key) {

				$student->$key = $_REQUEST['Students'][$key];

			}

			if ( $student->save()) { 

				Yii::app()->notify->add("Студент обновлен","success"); 

				$this->render("profile",array("student"=>$student));

			}

		}

		$this->render("profile",array("student"=>$student));


	}


	public function actionSettings(){
		
		if(isset($_REQUEST["Settings"])){

			$S = new Settings();

			$settings= $S->findByPk(Yii::app()->my->id); 

			foreach ($_REQUEST['Settings'] as $key => $value) {
				 
				$settings->$key = $value;

			}

			$settings->save();
;

		}else{

			$S = new Settings();

			$settings= $S->findByPk(Yii::app()->my->id);

		}

		$this->render('settings', array('settings'=>$settings));

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