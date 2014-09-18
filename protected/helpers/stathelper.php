<?php

/**
		* 
		*/
		class stathelper {

			/**
			*
			*  Считает статистику выполненных, проверяемых и всех заданий
			*  return array с ключами, которые задаются в options
			*
			**/
			
			static function trackstat($tasks){

				// сперва посчитаем список заданий

			
				// получаем список статусов, которые вообще есть

				$options = (statushelper::options());

				// сперва прописыаем нули по всем статусам

				foreach($options as $key=>$value){$stat[$key]=0;}

				// теперь, если нам прислали что-то неправильное, возвращаем массив с нулями
			
				if(count($tasks)<1){ $stat['count']=0; return $stat;}

				// теперь пора начинать обход заданий

				foreach ($tasks as $task) {

					// если какой-то статус есть, считаем его

					if( $task->Solutions){ 

						$status = $task->Solutions[0]->status;
						if(isset($stat[$status])){$stat[$status]++;}

					}

					// и считаем общее количество

				}

				$stat['count']=count($tasks);

				return $stat;

			}


			/**
			*
			*  Считает все очки за конкретный курс
			*  return int количество поинтов
			*
			**/

			static function earnedforcourse($student,$course){

				 
				
				$sql = "SELECT SUM(earned) as points FROM Solutions WHERE student = ".$student." AND course = ".$course." AND status = 'complete' ";
				$command = Yii::app()->db->createCommand($sql);
				$results = $command->queryAll();

				if($results[0]['points']==null){ 

					return 0;

				}else{

					return $results[0]['points'];

				}
			}

			/**
			*
			*  Считает очки студента за все курсы
			*  return int количество поинтов
			*
			**/			

			static function pointsforcourse($course){
				
				$sql = "SELECT SUM(points) as points FROM Tasks WHERE course = ".$course."  ";
				$command = Yii::app()->db->createCommand($sql);
				$results = $command->queryAll();

				return $results[0]['points'];

			}	

			static function pointstotal($student){

				// теперь добавим сюда дикие поинты

				$sql = "SELECT SUM(earned) as points FROM Solutions WHERE student = ".$student." AND status = 'complete' ";
				$command = Yii::app()->db->createCommand($sql);
				$results = $command->queryAll();

				$from_tasks = $results[0]['points'];

				$sql = "SELECT SUM(earned) as points FROM Points WHERE student = ".$student." ";
				$command = Yii::app()->db->createCommand($sql);
				$results = $command->queryAll();

				$from_bonus = $results[0]['points'];

				return $from_tasks + $from_bonus;
				 
			}


			// public function pointsfortrack($track){

			// 	$sql = "SELECT SUM(points) as points FROM tasks WHERE track = ".$track."  ";
			// 	$command = Yii::app()->db->createCommand($sql);
			// 	$results = $command->queryAll();

			// 	return $results[0]['points'];

			// }

			// public function earnedfortrack($track,$stude){

			// 	$sql = "SELECT SUM(earned) as points FROM tasks WHERE track = ".$track."  ";
			// 	$command = Yii::app()->db->createCommand($sql);
			// 	$results = $command->queryAll();

			// 	return $results[0]['points'];

			// }

			static function myToFinish(){
				
				return Solutions::model()->CountByAttributes(array("status"=>"finishhim","student"=>Yii::app()->my->id));

			}

			static function checkTotal(){
			
				return Solutions::model()->CountByAttributes(array("status"=>"check"));

			}



}	

?>