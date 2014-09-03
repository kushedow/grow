<?php

class AuthController extends CController
{

	public function actionRegister(){

		$this->redirect(array('site/index'));

	}

	

	public function Actionindex(){

		if(isset($_POST['Auth'])){

			$auth = $_POST['Auth'];

			if($id = Yii::app()->my->authentificate($auth['mail'],$auth['pass'])){

				Yii::app()->my->turn($id);

				$this->redirect(array('site/index'));

			}

			// Yii::app()->notify->add("Тест пройден");

		}

		$this->render("index");

	}

 


	public function actionAuth($user_id=1){

		foreach (Users::model()->findByPk($user_id) as $key=>$value) {

			if($key=="password" OR $key=="pass"){continue;}
		
			$_SESSION[$key]=$value;

		}

	}

	public function actionLogout($value=''){
		
		Yii::app()->my->logout();

		$this->redirect(array('site/index'));

	}

	/**
	*
	* Позволяем логиниться под нужным пользователем без пароля
	* Опаснейшая дыра, если не закрыть и светить код
	*
	**/

	private function actionTurn($id=1){

		if(!isset($_REQUEST['pass'])){

			echo "Пароль неверный"; return false;

		}

	 	Yii::app()->my->turn($id);

	 	echo "success"; return false;


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