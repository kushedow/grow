<?php  $this->layout = "task"; ?>


<div class="crumbtainer sandbox-navbar">

	<div class="row">

		<div class="col-md-10">
			
			<big><a href="/student<?php echo $bucket->Student->id; ?>"><?php echo $bucket->Student->fullname; ?></a> ➞	<?php echo $bucket->title; ?></big>	

		</div>

		<div class="col-md-2">

			<?php if(Yii::app()->my->id == $bucket->student): ?>	

				<a href="/sandbox/<?php echo $bucket->id; ?>/edit" class="btn btn-info pull-right">Редактировать</a>
			
			<?php else: ?>

				<a href="/sandbox/<?php echo $bucket->id; ?>/fork" class="btn btn-success pull-right">Вилкнуть себе</a>

			<?php endif; ?>


			
		</div>


	</div>


</div>

<style>
	

.page-container .main-content{padding-top: 70px !important;}

</style>



<div class="sandbox-preview" style=" width: 100%; height: 800px">
	
	<iframe src="" frameborder="0" id="preview" style=" width: 100%; height: 100%">
	

	</iframe>

</div>

<div class="sandbox-data">

<?php $form=$this->beginWidget('CActiveForm'); ?>


	<?php echo $form->textArea($bucket,'html'); ?>			

	
	<?php echo $form->textArea($bucket,'css'); ?>		
	 
	
	<?php echo $form->textArea($bucket,'js'); ?>		

	
	<?php echo $form->textArea($bucket,'php'); ?>	


<?php $form=$this->endWidget(); ?>

</div>

<script>  

$(document).ready(function(){

	function updatePreview() {

	    var previewFrame = document.getElementById('preview');
	    var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;

	    var html = $("#Buckets_html").val();
	    var css = $("#Buckets_css").val();
	    var js = $("#Buckets_js").val();	  

	    console.log(html);  

	    preview.open();

	    preview.write("\<\/style\> \<\/style\>  \<script src='/assets/js/jquery-1.11.0.min.js'\>\<\/script\>\<script\>"+js+"\<\/script\>" + html + "<style> body {margin:0px; padding: 0px;} " + css + "</style>");
	    
	    preview.close();
	        
	}

	updatePreview(); 

});


</script>

