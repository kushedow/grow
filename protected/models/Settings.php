<?php


 

class Settings extends  CFormModel {
	 

	private $_attributes=array();	// attribute name => attribute value


	/**
	*
    *  Declares attribute labels.
    *
    **/

    function __construct($scenario='insert'){

    	// инициализируем поля

		foreach ($this->attributeLabels() as $key => $value) {

			 $this->_attributes[$key]="";

		}

		parent::__construct($scenario);

	}

    public function attributeLabels() {

            return array(
                    'student'=>'Пользователь',
                    'courses'=>'Курсы',
                    'sms'=>'Оповещать по смс',
            );
    }


    public function rules(){

    	return array();

    }

    public function __get($name) {
    	
    	return $this->_attributes[$name];

    }

    public function __set($name,$value) {
    	
    	$this->_attributes[$name]=$value;

    }


    public function findByPk($pk){

    	$student = Students::model()->findByPk($pk);

    	$settings = json_decode($student->settings,true);

    	foreach ($this->attributeLabels() as $key => $value) {

    		if($key=="student"){continue;}
    		
    		if(isset($settings[$key])){

    			$this->_attributes[$key] = $settings[$key];

    		}else {

    			$this->_attributes[$key] = null;

    		}

    	}

    	return $this;

    }


	/**
	*
    *  Переобъявляем сохранение
    *
    **/    


    public function save(){
    	
    	$student = Students::model()->findByPk(Yii::app()->my->id);

    	$student->settings = json_encode($this->_attributes);

    	$student->save();

    	$_SESSION["settings"]=$student->settings;

    }


}


?>