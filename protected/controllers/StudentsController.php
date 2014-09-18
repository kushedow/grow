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

			$record = array("shortname","fullname","phone","vkid","pass","avatar","mail","yes_office","yes_freelance","yes_internship","yes_projects");


			foreach ($record as $key) {

				if(isset($_REQUEST['Students'][$key])){

					$student->$key = $_REQUEST['Students'][$key];

				}	

			}


			if ( $student->save()) { 


				if(isset($_REQUEST["Students"]["Groups"])){

					$student->setRelationRecords("Groups", $_REQUEST['Students']["Groups"]);

				}

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


	public function actionAddpoint($id){

		$student = Students::model()->findByPk($id);

		$bonus = new Points();

		if(isset($_REQUEST['Points'])){

			$data = $_REQUEST['Points'];

			$bonus->student = $data['student'];
			$bonus->earned = $data['earned'];
			$bonus->comment = $data['comment'];
			$bonus->by = $data['by'];

			if($bonus->save()){ Yii::app()->notify->add("Бонус добавлен");}else{Yii::app()->notify->addErrors($bonus->getErrors());}

		}

		$this->render('addpoint', array('student'=>$student,"point"=>$bonus));
		
	}

	 
}