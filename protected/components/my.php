<?php

/**
 *  
 *  Класс для работы с текущим пользователем. 
 *  Используется модель студентов 
 *   
 * 
 **/

class my extends CComponent{

	public $id;
	public $shortname;
	public $fullname;
	public $vkid;

	public $role;

	public $mail;
	public $phone;

	public $avatar;
	public $status;	

	function init(){

		if(!isset($_SESSION)){session_start();}

			if(isset($_SESSION['id'])){

				$this->id = $_SESSION['id'];
				$this->fullname = $_SESSION['fullname'];
				$this->avatar = $_SESSION['avatar'];
				$this->role = $_SESSION['role'];
			}

	}

	/**
	*
	*  Магическое свойство logged создается тут
	*  @return boolean авторизован ли пользователь
	*
	**/	

	function getLogged(){

		if(isset($this->id)){return true;}

		return false;

	}



	/**
	*
	*  Проводит правильно ли пользователь залогинился
	*  @param mail почта пользователя
	*  @param pass пароль пользователя
	*  @return boolean прошла и аутентификация
	*
	**/

	function authentificate($mail,$pass){

		$student = Students::model()->findByAttributes(array("mail"=>$mail));

		if(!$student){ Yii::app()->notify->add("Пользователь не найден","warning"); return false; }

		if($student->pass == $pass) { 

			Yii::app()->notify->add("Пароль принят","success");  return $student->id; 

		}else{

			Yii::app()->notify->add("Пароль неверный","warning");  return false;

		}

	}


 	/**
	*
	*    Разлогинивает пользователя
	*
	**/	
 
 	function logout(){

 		session_destroy();
 		$this->id=null;


 	}


 	/**
	*
	*    Возвращает, имеет ли текущий пользователь право доступа к определенным дейстия
	*    @param action действие
	*    @return boolean есть ли доступ или нет
	*
	**/

	public function access($action){

		// Здесь вычисляются права пользователя на совершение определенных действий. 

		// Более умно я пока не придумал

		return $this->accessByRole($this->role,$action);

	}

	/**
	*
	*    Логинит текущего пользователя под указанным студентом
	*    @param id Номер студента
	*
	**/

	function turn($id){

		$profile = Students::model()->findByPk($id);

		$this->loadProfile($profile);

	}

	/**
	*
	*    Записывает в сессию загруженный профиль
	*
	**/

	function loadProfile($profile){

		$keys = array("id","shortname","fullname","avatar","vkid","role","phone","settings");

		foreach($keys as $key){

			$_SESSION[$key] = $profile->$key;

		}

		$_SESSION['user'] = $profile->id;

	}

 
	//                               
	//
	//                                           ВНУТРЕННИЕ МЕТОДЫ
	//
	//

	private function accessMatrix(){
		
		return [

		 	"students"=>[  /* управление студентами */
    
		 		"owner"=>true, 
		 		"curator"=>true     

		 	],

		 	"users"=>[  /* управление пользователями */
    
		 		"owner"=>true, 
		 		"curator"=>true     

		 	],		 	

		 	"edit"=>[  /* редактирование заданий  */
    
		 		"owner"=>true, 
		 		"author"=>true,
		 		"curator"=>true  

		 	],

		 	"stats"=>[  /* доступ к статистике  */
    
		 		"owner"=>true, 
		 		"author"=>true,
		 		"curator"=>true  
		 		   
		 	],

		 	"video"=>[  /* доступ к видео  */
    
		 		"owner"=>true, 
		 		"author"=>true,
		 		"curator"=>true,
		 		"student"=>true,		 		  
		 		   
		 	],
		 	"check"=>[

		 		"owner"=>true, 
		 		"author"=>true,
		 		"curator"=>true,
		 		"student"=>true,	

		 	]

		];

	}


	private function accessByRole($role,$action){
		
		if(isset($this->accessMatrix()[$action][$role])){

			return $this->accessMatrix()[$action][$role];

		}

		return false;

	}



}