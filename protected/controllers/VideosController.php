<?php

class VideosController extends Controller
{
	public function actionIndex(){

		$tracks = Tracks::model()->with("Videos")->findAll();

		$this->render('index',array("tracks"=>$tracks));

	}

	/**
	*
	*  Показвает скучную странику с видео, единственное украшение которой – дополнительные видео из трека
	*
	**/

	public function actionByid($id){

		if($video = Videos::model()->with("Track.Videos")->findByPk($id)){

			$this->render('preview',array("video"=>$video));

		}else{

			Yii::app()->notify->add("Не удалось найти видео","danger");
			$this->render('site/error');

		}
		
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