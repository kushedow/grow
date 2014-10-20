<?php

class EditorController extends Controller{


	public function actionIndex(){

		$this->render('index');

	}




	public function actionCreate_task($track=null){


		if(!Yii::app()->my->access("edit")){return false;}

		$task = new Tasks();

		$task->track = $track;

		
		// если значения переданы –выводим их

		if(isset($_REQUEST['Tasks'])){ 

			foreach($_REQUEST['Tasks'] as $key=>$value){	$task->$key = $value;	}

			if($task->save()){

				Yii::app()->notify->add("Новое задание успешно создано","success");

				$this->redirect( array('/task/'.$task->id.'/edit') );

			}else{

				Yii::app()->notify->addErrors($task->getErrors());
				Yii::app()->notify->add("Не удалось создать задание","danger");

			}

		}

		$this->render("task",array("task"=>$task));

	}



	/**
	*
	*  Показывает для редактирования и сохраняет задание
	* 
	*  @param id 
	*  @return true
	*
	**/


	public function actionEdit_task($id){


		if(!Yii::app()->my->access("edit")){return false;}

		$task = Tasks::model()->findByPk($id);	


		if(isset($_REQUEST['Tasks'])){ 

			foreach($_REQUEST['Tasks'] as $key=>$value){

				$task->$key = $value;

			}

			if($task->save()){

			 	Yii::app()->notify->add("Задание сохранено. <a href='/task/".$task->id."' target='blank'>Перейти к заданию</a>");

			}else{

				Yii::app()->notify->add("Не удалось сохранить","danger");
				print_r($task->getErrors());

			}

		}

		$this->render("task",array("task"=>$task));

	}



	/**
	*
	*  Показывает для создания и создает трек
	* 
	*  @param id 
	*  @return true
	*
	**/



	public function actionCreate_track($course=null){

		if(!Yii::app()->my->access("edit")){return false;}

		$track = new Tracks();

		$track->course = $course;

		if(isset($_REQUEST['Tracks'])){ 

			foreach($_REQUEST['Tracks'] as $key=>$value){	$track->$key = $value;	}

			if($track->save()){

				 
				Yii::app()->notify->addErrors($track->getErrors());

				Yii::app()->notify->add("Новый трек успешно создан","success");

				$this->redirect( array('/track/'.$track->id.'/edit') );

			}else{

				Yii::app()->notify->addErrors($track->getErrors());
				Yii::app()->notify->add("Не удалось создать трек","danger");

			}

		}

		$this->render("track",array("track"=>$track));

	}



	/**
	*
	*  Показывает для редактирования и сохраняет трек
	* 
	*  @param id 
	*  @return true
	*
	**/


	public function actionEdit_track($id){
		
		if(!Yii::app()->my->access("edit")){return false;}

		$track = Tracks::model()->findByPk($id);	

		if(isset($_REQUEST['Tracks'])){   

			foreach($_REQUEST['Tracks'] as $key=>$value){

				$track->$key = $value;

			}

			if($track->save()){

			 	Yii::app()->notify->add("Трек сохранен. <a href='/track/".$track->code."' target='blank'><u>Перейти к треку</u></a>");

			 	if(isset($_REQUEST['Tracks']["Docs"])){$track->setRelationRecords("Docs", $_REQUEST['Tracks']["Docs"]);}
			 	
			 	if(isset($_REQUEST['Tracks']["Algorithms"])){$track->setRelationRecords("Algorithms", $_REQUEST['Tracks']["Algorithms"]);} 		 	

			}else{

				Yii::app()->notify->add("Не удалось сохранить","danger");
				//print_r($task->getErrors());

			}

		}

		$this->render("track",array("track"=>$track));

	}


	/**
	*
	*  Показывает для редактирования и сохраняет курс
	* 
	*  @param id 
	*  @return true
	*
	**/


	public function actionEdit_course($id){

		if(!Yii::app()->my->access("edit")){return false;}

		$course = Courses::model()->findByPk($id);	

		if(isset($_REQUEST['Courses'])){ 

			foreach($_REQUEST['Courses'] as $key=>$value){ $course->$key = $value; }

			if($course->save()){

			 	Yii::app()->notify->add("Курс сохранен. <a href='/course/".$course->code."' target='blank'>Перейти к курсу</a>");

			}else{

				Yii::app()->notify->addErrors($course->getErrors());

				Yii::app()->notify->add("Не удалось сохранить","danger");
				 
			}

		}

		$this->render("course",array("course"=>$course));

	}



	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////


	//               Обрабатываем  Видео                    //



	public function actionCreatevideo(){

		if(isset($_REQUEST['Videos'])){

			// обрабатывем данные из формы

			$video = Videos::model()->updateFromRequest();

			$this->redirect( array('/video/'.$video->id.'/edit') );
 
		} 

		if(!isset($video)) { $video = new Videos();}

		$this->render('video',array("video"=>$video));

	}


	public function actionEditvideo($id){

		$video = Videos::model()->findByPk($id);
		
		if(isset($_REQUEST['Videos'])){

			// обрабатывем данные из формы

			$video = Videos::model()->updateFromRequest($id);

		}

		$this->render('video',array("video"=>$video));
		
	}



	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////



	//                   Обрабатываем  FAQ                  //




	public function actionCreatefaq(){

		if(isset($_REQUEST['Faqs'])){

			// обрабатывем данные из формы

			$faq = Faqs::model()->updateFromRequest();

			$this->redirect( array('/faqs/'.$faq->id.'/edit') );
 
		} 

		if(!isset($faq)) { $faq = new Faqs();}

		$this->render('faq',array("faq"=>$faq));

	}


	public function actionEditfaq($id){

		$faq = Faqs::model()->findByPk($id);
		
		if(isset($_REQUEST['Faqs'])){

			// обрабатывем данные из формы

			$faq = Faqs::model()->updateFromRequest($id);

		}

		$this->render('faq',array("faq"=>$faq));
		
	}



	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////


	//               Обрабатываем  Документы                    //



	public function actionCreatedoc(){

		if(isset($_REQUEST['Docs'])){

			// обрабатывем данные из формы

			if($doc = Docs::model()->updateFromRequest()){

				$this->redirect( array('/docs/'.$doc->id.'/edit') );

			}else{

				/* не создан, покажи ошибки и окошко создания нового */

			}
 
		} 

		if(!isset($doc)) { $doc = new Docs();}

		$this->render('docs',array("doc"=>$doc));

	}


	public function actionEditdoc($id){

		$doc = Docs::model()->findByPk($id);
		
		if(isset($_REQUEST['Docs'])){

			// обрабатывем данные из формы

			$doc = Docs::model()->updateFromRequest($id);

		}

		$this->render('doc',array("doc"=>$doc));
		
	}



	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////



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

	public function actions(){
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