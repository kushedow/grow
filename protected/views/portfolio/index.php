<?php  $this->layout = "portfolio"; ?>

<?php include("parts/header.php"); ?>

<section class="portfolio-item-details portfolio-title">

	<div class="container">

		 <div class="row">
		 	
			<div class="col-sm-4">
				
				<h4><strong>Я умею:</strong> </h4>

			</div>
			<div class="col-sm-4">
				
				<h4><strong>Я изучаю:</strong> </h4>

			</div>
			<div class="col-sm-4">
				
				<h4><strong>Я хочу изучить:<strong> </h4>

			</div>

		 </div>

	</div>

</section>
 	 

<section class="portfolio-container" style="background-color: white; padding: 30px 0 50px 0">
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<h3>Все проекты</h3>
			</div>
		</div>
		
		<?php include("parts/list.php"); ?>


		
	</div>


	
</section>	



<section class="portfolio-container portfolio-mail" style="background-color: white; padding: 30px 0 20px 0" id="mail">

	<div class="container">

		<hr>
		<br>

		<div class="row">
			
			<div class="col-md-6">

			<h3>Связаться с выпускником</h3>
			<p>Вы можете отпрваить одобрительное сообщение, вопрос или другое интересное предложение этому выпускнику. </p>
			<p>Хантинг выпускников, с пометкой "уже работаю в IT запрещен"</p>	
			<p>Все отправляемые письма дублируются модераторам проекта, таковы правила.</p>
			<p>Всегда ваши, Epic Skills</p>
			</div>
			<div class="col-md-6">
				
				<form class="contact-form" role="form" method="post" action="" enctype="application/x-www-form-urlencoded">
							
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Имя:">
					</div>
					
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Электропочта">
					</div>
					
					<div class="form-group">
						<textarea class="form-control" name="message" placeholder="Сообщение:" rows="6"></textarea>
					</div>
					
					<div class="form-group text-right">
						<button class="btn btn-primary" name="send">Отправить</button>
					</div>
				
				</form>

			</div>


		</div>



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

	$(".glyphicon-collapse-up").on("click",function(){

		$(".site-header-container").slideToggle();

	});

	

});


</script>

