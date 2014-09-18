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


	public function actionProgress($id,$trackid){

		$progress = array();

		// получаем список пользователей

		// получаем задания по пользователю, сразу же с решениями

		$track = Tracks::model()->findByPk($trackid);

		$group = Groups::model()->with("Students")->findByPk($id);


		// пройдемся по всем студентам в группе

		foreach ($group->Students as $student) {

			// получим теперь таски и солюшны этого студента

			$students[$student->id] = $student;

			$tasks = Tasks::model()->with(

		 		array('Solutions'=>array('on'=>'Solutions.student='.$student->id))

		   		 )->findAllByAttributes(array("track"=>$trackid), array('order' => 't.order') );

			 // продемся по всем задачам

			 foreach ($tasks as $task): 

	
				if(isset($task->Solutions[0])){

			 		// если у таска есть солюшн – возьмем 

					$progress[$student->id][$task->id] = $task->Solutions[0]->status; ;

				}else{

					// если нет – запишем нейтральный статус

					$progress[$student->id][$task->id] = "undefined" ;

				}
			
			 endforeach;  
			 
		}


		$this->render('progress', array("group"=>$group,"track"=>$track,"students"=>$students,"progress"=>$progress));
		
	}

	


	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////




	public function actionTheory($id){
		
		$track = Tracks::model()->with("Tasks")->findByPk($id);

		$tasks = Tasks::model()->findAllByAttributes(array("track"=>$id),array("order"=>"t.order"));

		$this->render('theory', array('track'=>$track,'tasks'=>$tasks));

	}




	 
}