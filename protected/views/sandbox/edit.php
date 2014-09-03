<?php  $this->layout = "task"; ?>

<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="crumbtainer sandbox-navbar">

	<div class="row">

		<div class="col-md-6">
			
			<?php echo $form->textField($bucket,'title',array("class"=>"form-control","placeholder"=>"Введите название проекта")); ?>	

		</div>

		<div class="col-md-5 col-md-offset-1">
			
			<button id ="sandbox-landscape" class="btn btn-default btn-lg" type="button">ll</button> 
			<button id ="sandbox-portrait" class="btn  btn-default btn-lg" type="button">=</button>
			<button type="submit" class="btn btn-default  btn-lg pull-right">Сохранить</button>

		</div>
		
	</div>


</div>

<style>
	

.page-container .main-content{padding-top: 70px !important;}

</style>

<div class="sandbox-ide">

	<div class="sandbox-preview">
		
		<iframe src="" frameborder="0" id="preview" style=" width: 100%; height: 250px;">
			
		</iframe>

	</div>



	 <div class="row lower-50 sandbox-tabs" style=" width: 100%;">

	     <div class="col-md-12">

	     	<!-- Вкладки -->
			
			<ul class="nav nav-tabs bordered">
				
				<li class="active"><a href="#html" data-toggle="tab">HTML</a></li>
				<li ><a href="#css" data-toggle="tab">CSS </a></li>
				<li><a href="#js" data-toggle="tab"> JS </a></li>
				<li><a href="#php" data-toggle="tab"> PHP </a></li>

			</ul>

			<!-- Содержимое вкладок  -->
			
			<div class="tab-content sandbox-editor">
	 
				<div class="tab-pane active" id="html">	<?php echo $form->textArea($bucket,'html'); ?>	</div>
				
				<div class="tab-pane" id="css">	<?php echo $form->textArea($bucket,'css'); ?>	</div>

				<div class="tab-pane" id="js"> <?php echo $form->textArea($bucket,'js'); ?>	</div>
				
				<div class="tab-pane" id="php">	<?php echo $form->textArea($bucket,'php'); ?>	</div>
				
			</div>
			
		</div>

	</div>  <!-- /.sandbox-ide -->

</div>



<?php $this->endWidget(); ?>

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

	var editor_html = CodeMirror.fromTextArea(
	document.getElementById('Buckets_html'), {
			lineNumbers: true,
	        mode: 'text/html',

	});

	var editor_css = CodeMirror.fromTextArea(
	document.getElementById('Buckets_css'), {
			lineNumbers: true,
	        mode: 'text/css',

	});

	var editor_js = CodeMirror.fromTextArea(
	document.getElementById('Buckets_js'), {
			lineNumbers: true,
	        mode: 'text/javascript',

	});




// Функции


	function updatePreview() {

	    var previewFrame = document.getElementById('preview');
	    var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;

	    preview.open();

	    preview.write("\<style\> body {margin:0px; padding: 0px;} "+editor_css.getValue()+" \<\/style\> \<\/style\>  \<script src='/assets/js/jquery-1.11.0.min.js'\>\<\/script\>\<script\>"+editor_js.getValue()+"\<\/script\>" + editor_html.getValue());
	    
	    preview.close();
	        
	}

	function sandboxLandscape(){

		$(".sandbox-preview").css({"width":"50%","position":"absolute","top":"0","right":0}).find("iframe").css({"height":"600px"});
		$(".sandbox-tabs").css({"width":"50%","position":"absolute","top":"0","left":0});

	}

	function sandboxPortrait(){

		$(".sandbox-preview").css({"width":"100%","position":"static"}).find("iframe").css({"height":"250px"});
		$(".sandbox-tabs").css({"width":"100%","position":"static"});

	}


// Вызов функций

	updatePreview(); 

// Обработчики

	editor_css.on('change',function(){ updatePreview();  });
	editor_html.on('change',function(){ updatePreview();  });
	editor_js.on('change',function(){ updatePreview();  });

	$(".nav-tabs a").on("click",function(){  

		setTimeout(function(){ editor_html.refresh(); },5);
		setTimeout(function(){ editor_css.refresh(); },5);
		setTimeout(function(){ editor_js.refresh(); },5);			

	})

	$("#sandbox-landscape").on("click",sandboxLandscape);
	$("#sandbox-portrait").on("click",sandboxPortrait);


</script>

