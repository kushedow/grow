<?php //Yii::app()->notify->add("111","success"); ?>

<?php // Yii::app()->notify->show(); ?>

<?php if($task->id): ?>

	<a href="/task/<?php echo $task->id; ?>" class="btn btn-sm pull-right">Назад к задаче</a>

<?php endif; ?>

<h2>Редактирование задачи</h2>

<hr>

    <?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="row">

		<div class="col-md-6">

			<!-- Название -->
			<label for="">Название</label>
			<?php echo $form->textField($task,'title',array('class'=>'form-control') ); ?>
			<br>
			<!-- Название -->
			<label for="">Описание</label>
			<?php echo $form->textArea($task,'description',array('class'=>'form-control') ); ?>

			
		</div>
		<div class="col-md-3">

			<!-- Трек -->
			<label for="">Тема</label>
			<?php $list = CHtml::listData(Tracks::model()->findAll(), 'id', 'title'); ?>

			<?php echo $form->dropDownList($task,'track',$list,array('class'=>'form-control')); ?>

			<br>

			<!-- Курс --> 
			<label for="">Курс</label>
			<?php $list = CHtml::listData(Courses::model()->findAll(), 'id', 'title'); ?>
			<?php echo $form->dropDownList($task,'course',$list,array('class'=>'form-control')); ?>

		</div>
		<div class="col-md-3">
			
			<!-- Поинты -->
			<label for="">Поинты</label>
			<?php echo $form->textField($task,'points',array('class'=>'form-control')); ?>
			<br>
			<!-- Поинты -->
			<label for="">Порядок в треке</label>
			<?php echo $form->textField($task,'order',array('class'=>'form-control')); ?>
			<br>

			<!-- Лайаут задания --> 
			<label for="">Курс</label>
			<?php $list = layouthelper::layouts(); ?>
			<?php echo $form->dropDownList($task,'layout',$list,array('class'=>'form-control')); ?>



		</div>

	</div>







 <div class="row">

     <div class="col-md-12">

     	<!-- Вкладки -->
		
		<ul class="nav nav-tabs bordered">
			
			<li ><a href="#example" data-toggle="tab">Образец</a></li>

			<li class="active"><a href="#html" data-toggle="tab">HTML</a></li>

			<li ><a href="#css" data-toggle="tab">CSS </a></li>

			<li><a href="#js" data-toggle="tab"> JS </a></li>

			<li><a href="#php" data-toggle="tab"> PHP </a></li>

			<li><a href="#check" data-toggle="tab">Автопроверка</a></li>

			<li><a href="#theory" data-toggle="tab">Теория</a></li>

		</ul>

		<!-- Содержимое вкладок  -->
		
		<div class="tab-content task-editor">
 
			<div class="tab-pane active" id="html">
					
					<?php echo $form->textArea($task,'html'); ?>			

			</div>
			
			<div class="tab-pane" id="css">
					
					<?php echo $form->textArea($task,'css'); ?>		
					 
			</div>

			<div class="tab-pane" id="js">
					
					<?php echo $form->textArea($task,'js'); ?>		
					 
			</div>
			
			<div class="tab-pane" id="php">
					
					<?php echo $form->textArea($task,'php'); ?>		
					 
			</div>
			
			<div class="tab-pane" id="check">
					
					<?php echo $form->textArea($task,'check'); ?>	

					<blockquote>

						<h5>Пример:</h5>
						<p>[{"title":"Добавьте три контейнера на страницу","code":"find('div').length"}]</p>

					</blockquote>	
					 
			</div>
			
			<div class="tab-pane" id="example">
					
					<?php echo $form->textArea($task,'example'); ?>		
					 
			</div>

			<div class="tab-pane" id="theory">
					
					<?php echo $form->textArea($task,'theory'); ?>		
					 
			</div>

		</div>
		
	</div>

</div>   

<!-- Выводим кнопку действия -->

<?php if($task->id): ?>
	<button type="submit " class="btn btn-success ">Сохранить</button>
<?php else: ?>
	<button type="submit " class="btn btn-success btn-block">Создать</button>
<?php endif; ?>

<!-- / Выводим кнопку действия -->

<?php $this->endWidget(); ?>

</form>



	<link rel="stylesheet" href="codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="codemirror/theme/monokai.css">

	<script src="codemirror/lib/codemirror.js"></script>
	<script src="codemirror/mode/xml/xml.js"></script>
	<script src="codemirror/mode/javascript/javascript.js"></script>
	<script src="codemirror/mode/css/css.js"></script>
	<script src="codemirror/mode/php/php.js"></script>	    
	<script src="codemirror/mode/htmlmixed/htmlmixed.js"></script>
	<script src="codemirror/addon/emmet/emmet.min.js"></script>

	<script>

	$(document).ready(function(){

		var editor_html = CodeMirror.fromTextArea(
		document.getElementById('Tasks_html'), {

		        mode: 'text/html', lineNumbers: true,  theme: "default ", profile: 'xhtml'

		});

		var editor_css = CodeMirror.fromTextArea(
		document.getElementById('Tasks_css'), {

		        mode: 'text/css',   lineNumbers: true,        theme: "default ",  profile: 'xhtml'
		});

		var editor_check = CodeMirror.fromTextArea(
		document.getElementById('Tasks_check'), {

		        mode: 'text/javascript', lineNumbers: true,  theme: "default ", profile: 'xhtml'
		});

		var editor_example = CodeMirror.fromTextArea(
		document.getElementById('Tasks_example'), {

		        mode: 'text/html', lineNumbers: true,  theme: "default ", profile: 'xhtml'
		});

		$(".nav-tabs a").on("click",function(){  

			setTimeout(function(){ editor_html.refresh(); },5);
			setTimeout(function(){ editor_css.refresh(); },5);
			setTimeout(function(){ editor_example.refresh(); },5);
			setTimeout(function(){ editor_check.refresh(); },5);			

		})

	});



	</script>

	<style> 

		.CodeMirror {margin: 10px 0px !important;}

	</style>
	
	