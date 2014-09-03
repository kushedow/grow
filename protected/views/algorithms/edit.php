<?php

?>

<a href="/algorithms/<?php echo $algorithm->id; ?>" class="btn btn-primary pull-right">Смотреть </a>

<h2>Редактирование</h2>

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<div class="row">

		<div class="col-md-3"> 
			<label for="">Заголовок</label>
			<?php echo $form->textField($algorithm,'title',array("class"=>"form-control")); ?>	

		</div>

		<div class="col-md-6"> 
			<label for="">Подзаголовок</label>
			<?php echo $form->textField($algorithm,'description',array("class"=>"form-control")); ?>	

		</div>

		<div class="col-md-3"> 
			<label for="">Трек</label>

			<?php echo $form->dropDownList($algorithm,'Tracks',CHtml::listData(Tracks::model()->findAll(),'id','title'),array('class'=>'form-control',"multiple"=>true)); ?>

	 		</div>

	</div>
 

	<hr>

	<?php $steps = json_decode($algorithm->steps,true); ?>



	<?php if(count($steps)<1){$steps = array(array("title"=>"Шаг первый"));} ?>

	<div>

	<?php foreach ($steps as $key=>$step): ?>

		 

		<div class="step panel panel-gray panel-collapse panel-algorithm" data-collapsed="0">
			
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
					 	
				</div>

				<div class="panel-title"><?php if(isset($step['title'])): echo htmlspecialchars($step['title']); endif; ?></div>
				
		
			</div>
			
			<!-- panel body -->
			<div class="panel-body" style="display: none;">

				<div class=" row">

					<div class="col-md-6">
						<label for="">Заголовок</label>
						<input class="form-control step_title" value="<?php if(isset($step['title'])): echo $step['title']; endif; ?>" />
						
						<label for="">Подзаголовок</label>
						<textarea class="form-control step_description" ><?php if(isset($step['description'])): echo $step['description']; endif; ?></textarea>
						
						<label for="">Картинка</label>
						<input class="form-control step_image" value="<?php if(isset($step['image'])): echo $step['image']; endif; ?>" />

					</div>	
					
					<div class="col-md-6">
						
						<label for="">Код</label>			
						<textarea name="" id=""   rows="3" class=" form-control step_code"><?php if(isset($step['code'])): echo $step['code']; endif; ?></textarea>
						<label for="">Превью</label>
						<textarea name="" id="" rows="3"    class="form-control step_preview"><?php if(isset($step['preview'])): echo $step['preview']; endif; ?></textarea>
					
					</div>

				</div>

			</div>
			
		</div>
		

	<?php endforeach; ?>

	</div>

	<div class="row">

		<div class="col-md-12">

			<button class="btn pull-left btn-lg btn-primary" id="addStep" type="button">Добавить шаг</button>

			<button class="btn pull-right btn-lg btn-success" id = "saveSteps" type="submit">Сохранить</button>

		</div>
		
	</div>

	<?php echo $form->textArea($algorithm,'steps',array("class"=>"form-control","style"=>"display: none ")); ?>

<?php $this->endWidget(); ?>

<script>


	$(document).ready(function() {
		 
		$("#updateSteps").on("click",updateSteps);

		$("#saveSteps").on("click",updateSteps);		
		 
		$("#addStep").on("click",addStep);

		$(".removeStep").on("click",removeStep);

		$(".step_title").on("keyup",function(){   $(this).parent().parent().parent().parent(".step").find(".panel-title").text($(this).val()); });

	})


	function removeStep() {

		if( $(".step").length ==1){ alert("Только постигший Дзен может пройти путь за 0 шагов"); return false; }

		$(this).parent(".step").remove();

	}

	/**
	*
	*  Добавляет один шаг
	*
	**/

	function addStep(){

		// клонируем первое поле

		var step = $(".step:first-child").clone();

		// обнуляем значения всех ячеек

		step.find("input,textarea").each(function(){

			$(this).val("");

		});

		step.find(".panel-title").text("Шаг добавлен");

		step.find(".removeStep").on("click",removeStep);

		// добавляем первое поле в конец

		var newone = $(".step").parent().append(step);

		//alert(newone);



	}

	function updateSteps(){

		i=0;

		steps = {};

		$(".step").each(function(){

			steps[i] = {};

			steps[i].title = $(this).find(".step_title").val();
			steps[i].description = $(this).find(".step_description").val();
			steps[i].image = $(this).find(".step_image").val();	
			steps[i].code = $(this).find(".step_code").val();
			steps[i].preview = $(this).find(".step_preview").val();

			i++;

		})

		console.log(steps);

		var resultBox = $("#Algorithms_steps");

		resultBox.val(JSON.stringify(steps,true));  

	}



</script>