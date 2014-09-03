<?php if(Yii::app()->my->access("edit") ): ?>
		
			<a href="/videos/create" class="btn pull-right">Добавить</a>
		
		<?php endif; ?>

<h2>Все видео по трекам</h2>

<div class="row">

	<?php foreach ($tracks as $track): ?>

		<?php if(count($track->Videos)<1): continue; endif; ?>

		<div class="col-md-6">
			
			<div class="tile-stats tile-white-cyan tile-algorithm">

				<div class="icon"><i class="entypo-clipboard"></i></div>

				<h3><?php echo $track->title; ?></h3>

				<?php foreach ($track->Videos as $video): ?>
				
					<a href="/video/<?php echo $video->id; ?>" class="btn btn-small btn-default" target="blanc"><?php echo $video->title; ?></a> 

				<?php endforeach; ?>
			 
			</div>

		</div>

	<?php endforeach; ?>

</div>