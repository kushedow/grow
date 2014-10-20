<?php

class PortfolioController extends Controller
{
	public function actionIndex($id){
	
		$student = Students::model()->findByPk($id);
	
		$this->render('index',array("student"=>$student));

	}

	public function actionSingle($id,$item){

		$student = Students::model()->findByPk($id);
		$work = Buckets::model()->findByPk($item);// вот тут неясно, будем искать в 2 шага, я думаю
		$this->render('single',array("student"=>$student,"work"=>$work));
		
	}


}

?>