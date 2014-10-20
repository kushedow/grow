 

		<div class="panel-heading">		
							 
			<div class="panel-options pull-right">
								
				<ul class="nav nav-tabs">
					<li class="active"><a href="#editor-example" data-toggle="tab">Образец</a></li>
					<li class=""><a href="#editor-preview" data-toggle="tab">Браузер</a></li>
				</ul>
			</div>

			<h3 class="task-title pull-left"><?php echo $task->title; ?> <small class='text-muted'><?php echo $task->points; ?>пт.</small>

			<span class="btn btn-default responsive-phone">телефон</span>
			<span class="btn btn-default responsive-tablet">планшет</span>
			<span class="btn btn-default responsive-notebook">ноутбук</span>
			<span class="btn btn-default responsive-desktop">десктоп</span>
			

			</h3>
			


		</div>

		<div class="panel-body">
		
			<div class="tab-content browser-tabs">

				<div class="tab-pane preview-tab active" id="editor-example">

					<div class="example-box" >

						<iframe src="" frameborder="0" id="example" width="100%" height="295"></iframe>

						 <code style="display: none" id="example-code"><?php echo $task->example; ?></code>  

						<script>

							var exampleFrame = document.getElementById('example');
						    var example =  exampleFrame.contentDocument ||  exampleFrame.contentWindow.document;

						    var examplecode = document.getElementById('example-code');

						    
						    //todo добавить песочницу JS

						    example.open();
						    example.write("<style> body {margin:0px; padding: 0px;} </style>"+examplecode.innerHTML);
						    example.close();

						     examplecode.parentNode.removeChild(examplecode)
						    

						</script>

					</div>

				</div>

				<!-- Результат -->

				<div class="tab-pane preview-tab " id="editor-preview">
						
						<?php $this->renderPartial("parts/preview"); ?>	
						
				</div>

			</div>

		</div>

 

		<!-- <p class="task-description"><?php echo $task->description ?></p> -->

		<form action="" method="post"  full-width>

			<div class="panel minimal minimal-gray">
						
					<div class="panel-heading">
						
						<div class="panel-options pull-left">
							
							<ul class="nav nav-tabs">
								<li class=""><a href="#editor-theory" data-toggle="tab">Теория</a></li>
								<li class="active"><a href="#editor-html" data-toggle="tab">HTML</a></li>
								<li class=""><a href="#editor-css" data-toggle="tab">CSS</a></li>
								
								<li class=""><a href="#editor-comments" data-toggle="tab">Комментарии</a></li>

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
	 

		<?php $this->renderPartial("parts/actionbuttons"); ?>


 


	<style>

		.example-box{

			height: 295px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;

		}

		.panel-heading > .panel-options {
	 
			z-index: 5;
			position: relative;
			top: 2px;
			}

		#preview {height: 290px !important; padding: 10px;}

		.panel-body{ padding: 0;}

		.CodeMirror{padding-top: 15px;}

		.bordered.example-box:before,.preview-tab:before {display: none;}

		.browser-tabs {
			
			border: 1px solid  #dddddd;
			overflow: hidden;
			margin-bottom: 20px;
		}

	</style>

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

		//options = <?php /* echo json_encode(statushelper::options()); echo $task->check;*/ ?>

		// todo заменить на правильный вывод

		<?php 

			if(strlen($task->check)>10){ echo "var check = ".str_replace("'",'\"',$task->check); }

		?>


		$(".nav-tabs>*").on("click",function(){  

			setTimeout(function(){ editor_html.refresh(); },5);
			setTimeout(function(){ editor_css.refresh(); },5);

		})

		// автопроверка здесь

		$("#autocheck").on("click",function(event){

			if(typeof(check)!=="undefined"){  

				checkOnClick();
				
			}

		})

		$(".browser-tabs").css("transition","400ms all");

		// адаптивность тут

		$(".responsive-phone").on("click",function(event){

			$(".browser-tabs").css("width","320px");

		});

		$(".responsive-tablet").on("click",function(event){

			$(".browser-tabs").css("width","640px");

		});

		$(".responsive-notebook").on("click",function(event){

			$(".browser-tabs").css("width","1024px");

		});

		$(".responsive-desktop").on("click",function(event){

			$(".browser-tabs").css("width","1920px");

		});

		

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

		function updatePreview() {

		    var previewFrame = document.getElementById('preview');
		    var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;

		    //todo добавить песочницу JS

		    preview.open();
		    preview.write(editor_html.getValue()+"<style> body {margin:0px; padding: 0px;} "+editor_css.getValue()+"</style>");
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

		editor_css.on('change',function(){ updatePreview();  });
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