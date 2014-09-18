<div class="tile-stats tile-cyan tracks-single ">

    <div class="icon"><i class="entypo-paper-plane"></i></div>

    	<p style="margin-bottom:7px">Курсы → <a href="/course/<?php echo $track->Course->code;?>" style="color:#fff;"> <?php echo $track->Course->title; ?></a> </p>

		<?php if(Yii::app()->my->access("edit") ): ?> <a href="/track/<?php echo $track->id; ?>/edit" style="position: relative; z-index: 10;" class="btn btn-info pull-right">Редактировать</a> <?php endif; ?>
			
		<h1 class="num"><?php echo $track->title ?></h1>
		<h4 class="text-inverse"><?php echo $track->description ?></h4>
		
	 <br>

	 <div class="tile-footer clearfix">

	 	<!-- Прогресс  -->
	
		<div class="progress progress active pull-left" style="width: 80%">

			<div class="progress-bar progress-bar-complete" role="progressbar"  style="width: <?php echo $track->progress+1; ?>%">
				<span class="sr-only pull-right"><?php echo $track->progress ?> Complete (success)</span>
			</div>

			<?php if($track->check>0): ?>
				<div class="progress-bar progress-bar-check " role="progressbar"  style="width: <?php echo $track->check; ?>%"></div>
			<?php endif; ?>
								 

		</div>

	
		<span class=" text-inverse pull-right">

			<?php echo $track->progress ?>% пройдено
		</span>
		
		 
	</div>
</div>