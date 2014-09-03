<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController{

	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();



	public function __construct($id=null,$module=null){

		if(!Yii::app()->my->logged){$this->redirect(array('auth/index'));};

		parent::__construct($id,$module=null);

	}	


	protected function beforeAction($action){
		 
		

		if(isset($_REQUEST['Comments'])){

			$comment = $_REQUEST['Comments'];

			//Yii::app()->notify->add("Добавлен комментарий");

			print_r($comment);

			if(isset($comment)){

				if(isset($comment['id']) AND isset($comment['model']) ){}

					$entry = new Comments();

					$entry->entryid = $comment['id'];
					$entry->comment = $comment['comment'];
					$entry->model = "Solutions";
					$entry->student = Yii::app()->my->id;

					if($entry->save()){

						Yii::app()->notify->add("Добавлен комментарий ");

					}else{

						Yii::app()->notify->addErrors($entry->getErrors());

					}

			}

		}

		return true;
	}
	


}