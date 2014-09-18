<?php

/**
* 
*/
class Statushelper {

	//public $options;
	
	function __construct(){

		// echo "Конструируюсь";

		$this->options = $this->options();
		 
	}

	static function getOptionz(){

		return static::options();

	}

	static function options(){

		return array(


			/* Кто-то добавил задание */	
			"inbox"=>array("short"=>"Входящее","full"=>"Задание добавлено","icon"=>"","color"=>"","bgcolor"=>"gold"), 
			
			/* Задание выполняется */	
			"inprogress"=>array("short"=>"Выполняется","full"=>"Задание выполняется","icon"=>"","color"=>"","bgcolor"=>"info"), 

			/* Студент поставил задание на проверку, но его еще не проверили */	
			"check"=>array("short"=>"На проверке","full"=>"Задание поставлено на проверку","icon"=>"eye","color"=>"","bgcolor"=>"blue"), 

			/* Студент сдал задание на проверку, но проверяющий не принял его */	
			"finishhim"=>array("short"=>"Есть правки","full"=>"Задание нужно доделать","icon"=>"cancel","color"=>"","bgcolor"=>"orange"), 

			/* Студент начал делать задание, но у него что-то не получается */	
			"help"=>array("short"=>"Не получается","full"=>"Нужна помощь по заданию","icon"=>"lifebuoy","color"=>"","bgcolor"=>"blue"), 

			/* Задание завершено */	
			"complete"=>array("short"=>"Выполнено","full"=>"Задание уже выполнено","icon"=>"plus","color"=>"","bgcolor"=>"green","access"=>"task_status"), 

			/* Статус неизвестен */	
			"undefined"=>array("short"=>"Не выполнялось","full"=>"Задание не выполнялось","icon"=>"minus","color"=>"","bgcolor"=>"default"), 
						 
		) ;

	}

	 //TODO ест лишние вызовы, переписать

	static function label($status){

		$options = static::options();	
			
		if($status){$option = $options[$status];}else{$option = $options["undefined"];}

		echo "<span class='label btn-".$option["bgcolor"]." pull-right'>".$option["short"]."</span>";

	}

	static function microlabel($status=null){
	
		$options = static::options();	
			
		if($status AND isset($options[$status])){$option = $options[$status];}else{$option = $options["undefined"];}

		echo "<span class='label btn-".$option["bgcolor"]." '><i class='entypo-".$option['icon']."'></i></span>";

	}

}


?>