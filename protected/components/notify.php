<?php


class notify extends CComponent{


	private $notifications = Array();


	function init(){


	}


	function add($message,$type="default"){


		$this->notifications[]=array("message"=>$message,"type"=>$type);

	}

	function addErrors($errors){

		if(count($errors)==0){return true;}

		foreach($errors as $error){  

			$message[]=$error[0];

		}

		$this->notifications[]=array("message"=>implode($message," "),"type"=>"danger");

	}



	function show(){

		if(count($this->notifications)==0){return true;}
	
	 

		$list="";

		foreach($this->notifications as $no){

			$list.=' <div class="alert alert-'.$no['type'].'" ><button type="button" class="close" data-dismiss="alert"><i class="entypo entypo-cancel"></i></button>'. $no['message'] .'</div>' ;

		}

		echo $list;

	}

	

}

?>