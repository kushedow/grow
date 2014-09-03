<?php  ?>


<a href="/algorithms/new" class="btn btn-primary pull-right">Добавить </a>

<h2>Все алгоритмы курса "<?php echo $course->title; ?>" </h2>

<div class="row"> 

	<?php foreach ($course->Tracks as $track): ?>

		<?php if(count($track->Algorithms)<1): continue; endif; ?>

		<div class="col-md-6">
			
			<div class="tile-stats tile-white-cyan tile-algorithm">

				<div class="icon"><i class="entypo-clipboard"></i></div>

				<h3><?php echo $track->title; ?></h3>

				<?php foreach ($track->Algorithms as $algorithm): ?>
				
					<a href="/algorithms/<?php echo $algorithm->id; ?>" class="btn btn-small btn-default" target="blanc"><?php echo $algorithm->title; ?></a> 

				<?php endforeach; ?>
			 
			</div>

		</div>

	<?php endforeach; ?>

</div>