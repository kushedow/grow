<div class="row">

	<div class="col-md-6 task-left">

		<h3 class="task-title"><?php echo $task->title; ?> <small class='text-muted'><?php echo $task->points; ?>пт.</small></h3>
		

		<div class="bordered example-box" >

			<iframe src="" frameborder="0" id="example" width="100%" height="210"></iframe>

			 <code style="display: none" id="example-code"><?php echo $task->example; ?></code>  

			<script>

				var exampleFrame = document.getElementById('example');
			    var example =  exampleFrame.contentDocument ||  exampleFrame.contentWindow.document;

			    var examplecode = document.getElementById('example-code');

			    
			    //todo добавить песочницу JS

			    example.open();
			    example.write("<style> body {margin:0px; padding: 0px; font-family: arial;} </style>"+examplecode.innerHTML);
			    example.close();

			     examplecode.parentNode.removeChild(examplecode)

			</script>


			 
		</div>

		<!-- <p class="task-description"><?php echo $task->description ?></p> -->

		<form action="" method="post" >

			<div class="panel minimal minimal-gray">
						
					<div class="panel-heading">
						
						<div class="panel-options pull-left">
							
							<ul class="nav nav-tabs">
								<li class=""><a href="#editor-theory" data-toggle="tab">Теория</a></li>
								<li class=""><a href="#editor-html" data-toggle="tab">HTML</a></li>
								<li class=""><a href="#editor-css" title="Оппа Таня стайл!" data-toggle="tab">CSS</a></li>
								<li class="active"><a href="#editor-js" data-toggle="tab">JS</a></li>

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
				
			<!-- panel head -->
			<div class="panel-heading">
				
				
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

				<!-- Навигация по предыдущему/следующему заданию -->

				<button name="action" value="save" id="run" class="btn btn-sm btn-primary btn-icon icon-left pull-right">
					Выполнить JS
					<i class="entypo-play"></i>
				</button>


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


		<div class="tile-stats tile-gray task-single-tile">

				<?php $this->renderPartial("parts/check"); ?>

		</div>



		<?php $this->renderPartial("parts/actionbuttons"); ?>


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

	<script>

    
	$(document).ready(function(){

		 


		<?php 

			if(strlen($task->check)>10){ echo "var check = ".str_replace("'",'\"',$task->check); }

		?>


		$(".nav-tabs>*").on("click",function(){  

			setTimeout(function(){ editor_html.refresh(); },5);
			setTimeout(function(){ editor_css.refresh(); },5);

		})

		// выполнение js тут

		$("#run").on("click",function(){ updatePreview(true); });

		// автопроверка здесь

		$("#autocheck").on("click",function(event){

			if(typeof(check)!=="undefined"){  

				checkOnClick();
				
			}

		})

		function checkOnClick(){

			// запрещаем отправку на сервер

			event.preventDefault();

			checkme();

		}


		function checkme(){

				updatePreview();

				// обнуляем окошко с сообщениями о проверке
				
				$("#checklog tbody tr").remove();

				var failed = 0;

				check.forEach(function(item){

					var code = item.code;

					var preview = $("#preview").contents();

					console.log(code);

					if(eval(code)){   

						var label = "<span class='label btn-green'>Выполнено</span>"; 

					}else{

						var label = "<span class='label label-default'>Не выполнено</span>";

						failed++;

					}

					$("#checklog tbody").append("<tr><td>"+item.title+"</td><td class='text-right'>"+label+"</td></tr>");

				}); 

				if(failed==0){alert("Задание выполнено, переходите к следующему!");}

		}

		function updatePreview(withjs) {

		    var previewFrame = document.getElementById('preview');
		    var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;

		    if(withjs==true) { var myjs = editor_js.getValue(); }else { var myjs=""; }

		    //todo добавить песочницу JS

		    preview.open();
		    preview.write("<"+"script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'"+">"+myjs+"</"+"script"+">");
		    preview.write("<"+"script"+">"+myjs+"</"+"script"+">"+editor_html.getValue()+"<style> body {margin:0px; padding: 0px; font-family: arial;} "+editor_css.getValue()+"</style>" );
		    preview.close();
		        
		}




		/*    Активируемся редакторы  при загрузке страницы    */

 

		var editor_html = CodeMirror.fromTextArea(
			document.getElementById('code-html'), {
		        mode: 'text/html',
		        lineNumbers: false,
		        theme: "default ",
		        profile: 'xhtml'
		});

		var editor_css = CodeMirror.fromTextArea(
			document.getElementById('code-css'), {
		        mode: 'text/css',
		        lineNumbers: false,
		        theme: "default ",
		        profile: 'xhtml'
		});

		var editor_js = CodeMirror.fromTextArea(
			document.getElementById('code-js'), {
		        mode: 'text/javascript',
		        lineNumbers: true,
		        theme: "default ",
		        profile: 'xhtml'
		});		

		editor_js.on('change',function(){ updatePreview();  });
		editor_html.on('change',function(){ updatePreview();  });

		// setInterval(function(){updatePreview(); }, 700);

		<?php if(strlen($task->check)>10): ?> 

			checkme(); 

		<?php endif; ?>
 
		updatePreview();
		 
	});

	
        /*    Инициализируем секундомер   */


         $('#stopwatch').stopwatch().click(function(){ 

                $(this).stopwatch('toggle');

         });




</script>