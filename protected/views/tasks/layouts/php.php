<div class="row">

	<div class="col-md-6 task-left">

		<h3 class="task-title"><?php echo $task->title; ?> <small class='text-muted'><?php echo $task->points; ?>пт.</small></h3>
		
		<!-- <p class="task-description"><?php echo $task->description ?></p> -->

		<form action="" method="post" >

			<div class="panel minimal minimal-gray">
						
					<div class="panel-heading">
						
						<div class="panel-options pull-left">
							
							<ul class="nav nav-tabs">
								<li class=""><a href="#editor-theory" data-toggle="tab">Теория</a></li>
								<li class="active"><a href="#editor-example" data-toggle="tab">Образец</a></li>
								<li class=""><a href="#editor-php" data-toggle="tab">PHP</a></li>
							</ul>

						</div>
						<div class="panel-title pull-right action-save">

		
							<?php if(strlen($task->check)>10): ?>
							
								<button type="submit" id="autocheck" name="action" value="check" class="btn btn-sm btn-primary btn-icon icon-left pull-right">
									Проверить
									<i class="entypo-flash"></i>
								</button>
								
							<?php endif; ?>
							
								<button type="submit" name="action" value="save"  class="btn btn-sm btn-default btn-icon icon-left pull-right">
									Сохранить
									<i class="entypo-floppy"></i>
								</button>
		
						</div>

					</div>
					

				<?php $this->renderPartial("parts/editor",array("task"=>$task)); ?>	


				</div>

		</form>
	</div> <!-- /.col-md-6 -->

	<div class="col-md-6 task-right">

		<div class="panel minimal">
				
			<!-- показываем вкладки -->

			<div class="panel-heading">

				<button name="action" value="save" id="run" class="btn btn-sm btn-primary btn-icon icon-left pull-right">
					Выполнить
					<i class="entypo-play"></i>
				</button>
					
				<div class="panel-options pull-left">

					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Ваш результат</i></a></li>
						<li><a href="#tab2" data-toggle="tab">Комментарии 

							<?php if($task->discussed): ?>
						
							<span class="badge badge-secondary"><?php if($task->active): echo count($task->Solutions[0]->Comments); endif; ?></span>

							<?php  endif ?>


						</a></li>
					</ul>

					
				</div>

			</div>


			</div>
			
			<!-- panel body -->
			<div class="panel-body bordered">
				
				<div class="tab-content">
					<div class="tab-pane preview-tab active" id="tab1">
						
						<?php $this->renderPartial("parts/preview"); ?>	
						
					</div>
					
					<div class="tab-pane" id="tab2">
						 
						<?php $this->renderPartial("parts/comments",array("task"=>$task)); ?>

			     	</div>
				</div>
				
			</div>
			
		</div>

		 


	</div> <!-- /.col-md-6 -->

</div>

 


	<link rel="stylesheet" href="codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="codemirror/theme/monokai.css">

	<script src="codemirror/lib/codemirror.js"></script>
	<script src="codemirror/mode/xml/xml.js"></script>
	<script src="codemirror/mode/javascript/javascript.js"></script>
	<script src="codemirror/mode/css/css.js"></script>
	<script src="codemirror/mode/php/php.js"></script>	    
	<script src="codemirror/mode/htmlmixed/htmlmixed.js"></script>
	<script src="codemirror/addon/emmet/emmet.min.js"></script>

	<!-- подключаем секундомер -->

	<script src="/assets/js/jquery.stopwatch.js"></script>
	<script src="/assets/js/jquery.jsonp.js"></script>

	<style>

		.task-left .CodeMirror {
			
			height: 580px;

		}

		.task-right .panel.minimal{

			margin-bottom: -1px;
			margin-top: 30px;

		}


	</style>

	<script>


	// Оживляем теорию
		 

	var exampleFrame = document.getElementById('example');
    var example =  exampleFrame.contentDocument ||  exampleFrame.contentWindow.document;

    var examplecode = document.getElementById('example-code');

    
    //todo добавить песочницу JS

    example.open();
    example.write("<style> body {margin:0px; padding: 0px;} </style>"+examplecode.innerHTML);
    example.close();

    examplecode.parentNode.removeChild(examplecode)




    
	$(document).ready(function(){

		// Оживим кнопку "Запустить/Выполнить"

		$("#run").on("click",function(){ phpeval(); });

		// Фиксим подглючивание редактора при переключении вкладок

		$(".nav-tabs>*").on("click",function(){  setTimeout(function(){ editor_php.refresh(); },5); })
 

		function checkOnClick(){

			// // запрещаем отправку на сервер

			// event.preventDefault();

			// checkme();

		}

		function phpeval() {

			var phpcode = editor_php.getValue();

			updatePreview("<div class='text-center'> <img src='/img/preloader.gif' valign='middle' alt='' /> Скрипт выполняется на сервере</div>"," .text-center { text-align: center; width: 60%; margin: 120px auto 0px auto; border: 1px dashed grey; padding: 20px 30px; border-radius: 4px; vertical-align: middle;}");

			//alert(phpcode);

				$.ajax({
					  url: "http://178.62.133.237/",
					  data: {code: phpcode}
					})

					.done(function(data) {

						console.log(data);
					 	updatePreview(data,"") ;

					})

					.error(function(data) {
						console.log(data);
						updatePreview(data.statusText +" "+ data.responseText,"") ;

					});

		};

		function updatePreview(html,css) {

		    var previewFrame = document.getElementById('preview');
		    var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;

		    //todo добавить песочницу JS

		    preview.open();
		    preview.write(html+"<style> body {margin:0px; padding: 0px; font-family: arial;} "+css+"</style>");
		    preview.close();
		        
		}


		function checkme(){

 
		}



		/*    Активируемся редакторы  при загрузке страницы    */

 

		var editor_php = CodeMirror.fromTextArea(
			document.getElementById('code-php'), {
		        
		        lineNumbers: true,
		        matchBrackets: true,
		        mode: "application/x-httpd-php",
		        indentUnit: 4,
		        indentWithTabs: true
		       
		});

		 
		//editor_php.on('change',function(){ updatePreview();  });

		// setInterval(function(){updatePreview(); }, 700);

		<?php if(strlen($task->check)>10): ?> 

			checkme(); 

		<?php endif; ?>
 
		updatePreview("","");
		 
	});

	
        /*    Инициализируем секундомер   */


         $('#stopwatch').stopwatch().click(function(){ 

                $(this).stopwatch('toggle');

         });




</script>