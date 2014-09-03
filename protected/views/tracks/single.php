<?php  $this->layout = "track"; ?>

<!-- Здесь плашка -->

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

<div class="row">
	
	<div class="col-md-8">

		<!-- Задания  -->
		
		<div class="tile-stats tile-white-cyan">
		
			<h2>Задания</h2>
			
			<?php if($track->time>0):?> <h4>Время: <?php echo $track->time; ?> минут </h4> <?php endif; ?>
			 
			 <br>

			<div class="icon"><i class="entypo-paper-plane"></i></div>
			
			<table class="table responsive">
 
				<?php $i=0; foreach ($track->Tasks as $task): ?>

					<tr ><td>
						<a href="/task/<?php echo $task->id; ?>"><?php echo $i++.". ".$task->title; ?></a>
					</td><td>

						<!-- Показываем плашку с обозначением статуса -->

						<?php if($task->active): ?> <?php statushelper::label($task->Solutions[0]->status);?>  <?php else: ?> <?php statushelper::label(0);?>	<?php endif; ?>						

					</td></tr>

				<?php endforeach; ?>

			</table>

			<?php if(Yii::app()->my->access("edit") ): ?>
			
				<a href="/new/task/<?php echo $track->id; ?>" class="btn btn-block btn-default">Добавить новое</a>
			
			<?php endif; ?>
			

		</div>

	</div>

	<div class="col-md-4">

		<!-- Материалы, алгоритмы и видео -->

		<?php if($track->Docs): ?>

				<div class="tile-stats tile-white-cyan">
					 

					<h3>Материалы</h3>
				
					<hr>

					<?php foreach ($track->Docs as $i=>$doc): ?>

						<h5><a href="<?php echo $doc->link; ?>" target="blanc" class="btn btn-default btn-document" style=""><?php echo $i+1; ?>. <?php echo $doc->title; ?></a></h5>

					<?php endforeach; ?>
				
				</div>

		<?php endif; ?>


		<?php if($track->Algorithms): ?>

				<div class="tile-stats tile-white-cyan">
					 

					<h3>Алгоритмы</h3>
				
					<hr>

					<?php foreach ($track->Algorithms as $i=>$doc): ?>

						<h5><a href="/algorithms/<?php echo $doc->id; ?>" target="blanc" class="btn btn-default btn-document" style=""><?php echo $i+1; ?>. <?php echo $doc->title; ?></a></h5>

					<?php endforeach; ?>
				
				</div>

		<?php endif; ?>


		<?php if($track->Videos): ?>

				<div class="tile-stats tile-white-cyan">
					 

					<h3>Видео</h3>
				
					<hr>

					<?php foreach ($track->Videos as $i=>$doc): ?>

						<h5><a href="/video/<?php echo $doc->id; ?>" target="blanc" class="btn btn-default btn-document" style=""><?php echo $i+1; ?>. <?php echo $doc->title; ?></a></h5>

					<?php endforeach; ?>
				
				</div>

		<?php endif; ?>

		 

	</div>

</div>