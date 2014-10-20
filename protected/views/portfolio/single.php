<?php  $this->layout = "portfolio"; ?>

<?php include("parts/header.php"); ?>

<section class="portfolio-item-details portfolio-title">

	<div class="container">
		
		<!-- Title and Item Details -->		<div class="row item-title">
			
			<div class="col-sm-9">
				<h1>
					<a href="#"><?php echo $work->title; ?></a>
					<a href="#" class="" style="color:#bbb; font-size: 14px;"><i class="glyphicon glyphicon-chevron-up"></i></a>
				</h1>
				
			</div>
			
			<div class="col-sm-3">
				
				<div class="text-right">
					 <a href="" class="btn btn-primary">Показать все работы</a>
				</div>
				
			</div>
			
		</div>

</section>

<section class="portfolio-item-details text-center portfolio-item-preview">
		
		<!-- Portfolio Images Gallery -->		
		<div class="row">

			<div class="col-md-12">
				 
				<div class="sandbox-preview" style=" width: 100%; height: 800px">
	
					<iframe src="" frameborder="0" id="preview" style=" width: 100%; height: 100%"></iframe>

				</div>

				<div class="sandbox-data" style="display: none;">

					<?php $form=$this->beginWidget('CActiveForm'); ?>


					<?php echo $form->textArea($work,'html'); ?>			

					
					<?php echo $form->textArea($work,'css'); ?>		
					 
					
					<?php echo $form->textArea($work,'js'); ?>		

					
					<?php echo $form->textArea($work,'php'); ?>	


					<?php $form=$this->endWidget(); ?>

				</div>
				
			</div>
		</div>
		
	</section>

	 
<section class="portfolio-container" style="background-color: white; padding: 30px 0 50px 0">
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<h3>Другие проекты</h3>
			</div>
		</div>
		
		<?php include("parts/list.php"); ?>
		
	</div>
	
</section>	
	 
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

	// Добавим скрипты для сворачивания верхней полосочки и изменения значка сворачивания

	$(".glyphicon-chevron-up").on("click",function(){

		$(".site-header-container").slideToggle();

		$(this).css("transition","500ms all");

		if($(this).css("transform")=="none"){
			$(this).css("transform","rotate(180deg)");
		}else{
			$(this).css("transform","none");
		}

	});

	

});


</script>

