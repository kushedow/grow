<?php

class TasksController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	*
	*  Показывет задание по id для залогинившегося персонажа
	*  Ничего не возвращает
	*
	**/
	
	public function actionRestart($id,$student = null){

		if(!isset($student)){ $student = Yii::app()->my->id; }

		if($solution = Solutions::model()->findByAttributes(array("task"=>$id,"student"=>$student))){

			if($solution->delete()){

				Yii::app()->notify->add("Задание начато с начала");

			}

		}

		$this->actionByid($id,$student);

	}




	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////





	public function actionByid($id,$student = null){

		// Если студент не задан, то сохраняем для залогинившегося пользователя

		if(!isset($student)){ $student = Yii::app()->my->id; }

		// Сохраним значение, если это требуется и изменим статус, если нужно

		if(isset($_REQUEST['action'])){

			if($_REQUEST['action']=="save"){ $this->actionSave($id);}

			if($_REQUEST['action']=="check"){ $this->actionSave($id,"check");}

		}

		$task = Tasks::model()->with(array('Solutions'=>array('on'=>'(Solutions.student='.$student." )")))->findByPk($id);

		// теперь, если задание уже выполнялось и было сохранено, заменим поля редактора!

		if($task->active){

			$fields=array("html","css","js","php");
			foreach($fields as $key){ 
				$task->$key = $task->Solutions[0]->$key;
		    }

		}

		// если в задании указано, с каким лайаутом его выводить – выводим с нужным. Если нет – выводим дефолтный вид

		if($task->layout){$layout = $task->layout;}else{$layout ="answer";}

		// рендерим нужный интерфейс

		$this->render("single",array("task"=>$task,"layout"=>$layout));
		 

	}



	/**
	*
	*  Показывает решение нужного задания для нужного пользователя
	*
	**/


	public function actionsomeonestask($student,$task){
		
		$solution = Solutions::model()->findByAttributes(array("student"=>$student,"task"=>$task));

		if($solution){

			//if(isset($_REQUEST['Comments'])){ $this->addComment($solution,$_REQUEST['Comments']); }

			if($solution->student != Yii::app()->my->id ){

				// Случай, если мы просматриваем чужую запись

				$actions[] = '<a href="/task/'.$solution->task.'/'.$solution->student.'/set/complete" class="btn btn-success btn-xs pull-right ">Выполнено</a>';
				$actions[] = '<a href="/task/'.$solution->task.'/'.$solution->student.'/set/finishhim" class="btn btn-orange btn-xs pull-right">Доделать</a>';

				Yii::app()->notify->add("Вы просматриваете задание студента <a href='/student".$solution->Student->id."'><u>".$solution->Student->fullname."</u></a> ".implode($actions," ") ,"default");

			}	 

			 $this->actionByid($task,$student );

		}else{

			$this->render("/404");

		}

	}





	/**
	*
	*  Обновляет статус решения для данного студента
	*  Ничего не возвращает
	*
	**/
	 
	public function actionSetstatus($task,$student,$status){

		//сперва ищем запись
		
		if( $solution = Solutions::model()->findByAttributes(array("student"=>$student,"task"=>$task))){

			// менчем ей статус и сохраняем

			$solution->status = $status;

			$solution->checked = Yii::app()->my->id;

			if($solution->save()){

				Yii::app()->notify->add("Статус успешно изменен","success");

			}else{

				Yii::app()->notify->add("Не удалось изменить статус");
			}

		}else{

			//todo: добавить страницу ошибки

			Yii::app()->notify->add("Запись не найдена","danger");

		}

		// показываем запись с помощью основного метода 

		$this->actionsomeonestask($student,$task);

	}



	/**
	*
	*  Сохраняет код решения для нужного задания
	*  Если студент не задан, то сохраняем для залогинившегося пользователя
	*
	**/

	public function actionSave($id,$status=null,$student=null){

		// Если студент не задан, то сохраняет для залогинившегося 
	
		if(!isset($student)) {$student = $_SESSION['user'];  }

		$task = Tasks::model()->findByPk($id);

		if($solution = Solutions::model()->findByAttributes(array("task"=>$id,"student"=>$student))){

		}else{

			$solution = new Solutions();
			$solution->student = $student;
			$solution->status = "check";
			$solution->task = $id;

		}

		// обновляем количество полученных поинтов

		$solution->earned = $task->points;
		$solution->course = $task->course;
		$solution->status = "check";


		// запоминаем каждое добавленное значение в решении

		foreach($_REQUEST['Solutions'] as $key=>$value){

			$solution->$key = $value;

		}



		// если был задан статус – добавляем статус

		if(isset($status)){ $solution->status=$status; }

		if($solution->save()){ 

			Yii::app()->notify->add(" Изменения сохранены","success");

		}else{

			Yii::app()->notify->add(" Не удалось сохранить изменения","danger"); print_r($solution->getErrors());

		}
		 
	}




	public function actionRemove($id){

		if(!Yii::app()->my->access("edit")){ return false;}

		if($task = Tasks::model()->findByPk($id)){

			if($task->delete()){ Yii::app()->notify->add("Задание удалено");}

			$this->render('/site');

		}else{

			  Yii::app()->notify->add("Задание не существует"); 


		}
		
	}




	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////



	private function removeComment($id){

		 
 		$comment = Comments::model()->findByPk($id);

		if($comment->delete()){

			Yii::app()->notify->add("Комментарий удален","default");

		}

	}




	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////



	public function actionCheckall($course=null){

		$solutions = Solutions::model()->with("Task")->FindAllByAttributes(array("status"=>"check"));

		$this->render('check', array('solutions'=>$solutions));
		
	}



	// private function addComment($solution,$comment){

	// 	$comment = new Comments();

	// 	$comment->student = Yii::app()->my->id;

	// 	//$comment->solution = $solution->id;

	// 	$comment->comment = htmlspecialchars($_POST['Comments']['comment']);

	// 	//if($comment->save()){

	// 	//	Yii::app()->notify->add("Комментарий добавлен","success");

	// 	//}

	// }
	 
	  
}