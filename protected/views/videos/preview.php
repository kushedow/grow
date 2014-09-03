<?php


?>

<div class="row">

	<div class="col-md-12 text-center">

		<?php if(Yii::app()->my->access("edit") ): ?>
		
			<a href="/video/<?php echo $video->id; ?>/edit" class="btn pull-right">Редактировать</a>
		
		<?php endif; ?>
		

		<h2 class="text-center"><?php echo $video->title; ?></h2>
		<br>
		
		 <div class="screen"> 

			<?php echo $video->embed; ?> 

		</div>	

	</div>

	<div class="col-md-12 text-center">

		<h3 class="text-center">Все видео трека <?php echo $video->Track->title; ?></h3>

		<?php foreach ($video->Track->Videos as $sibling): ?>
		
			<a href="/video/<?php echo $sibling->id ?>" class="btn  <?php if($sibling->id==$video->id){echo "btn-primary";}?>"><?php echo $sibling->title; ?></a>
		
		<?php endforeach; ?>


		

	</div>

</div>



