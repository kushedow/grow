<?php  $this->layout = "track"; ?>

<!-- Здесь плашка -->

<?php include("parts/header"); ?>

<div class="row">
	
	<div class="col-md-8">

		<!-- Задания  -->
		
		<div class="tile-stats tile-white-cyan">

			<a href="/track/<?php echo $track->id; ?>/theory" class="btn pull-right text-muted" style="position: relative; z-index: 15;">Показать теорию</a>
		
			<h2>Задания</h2>
			
			<?php if($track->time>0):?> <h4>Время: <?php echo $track->time; ?> минут </h4> <?php endif; ?>
			 
			 <br>

			<div class="icon"><i class="entypo-paper-plane"></i></div>
			
			<table class="table responsive">
 
				<?php $i=0; foreach ($track->Tasks as $task): ?>

					<tr ><td>
						<a href="/task/<?php echo $task->id; ?>"><?php echo $i++.". ".$task->title; ?></a>
					
						
					

					</td>


						<?php 

						if(Yii::app()->my->access("check")): ?>	<td>

							<?php $strlen = strlen($task->theory); ?>

							<?php if($strlen>5 AND $strlen<=300): ?>
								<span class="label label-primary pull-right">немножко теории</span>
							<?php endif; ?>

							 

							<?php if($strlen<5): ?>
								<span class="label label-secondary pull-right">Нет теории</span>
							<?php endif; ?>

						
						</td><?php endif; ?>


					<td>



						<!-- Показываем плашку с обозначением статуса -->

						<?php if($task->active): ?> <?php statushelper::label($task->Solutions[0]->status);?>  <?php else: ?> <?php statushelper::label(0);?>	<?php endif; ?>						

					</td></tr>

				<?php endforeach; ?>

			</table>

			<?php if(Yii::app()->my->access("edit") ): ?>
			
				<a href="/new/task/<?php echo $track->id; ?>" class="btn btn-block btn-default">Добавить новое</a>
			
			<?php endif; ?>

			<br>

			<h3>Частые вопросы</h3>

			<br>

			<table class="table">

				<?php foreach ($track->Faqs as $faq): ?>
				
					<tr>
						<td>

							 
							<details>
								<summary class="expand" ><span><?php echo $faq->title; ?></span></summary>
								<p><?php echo $faq->answer; ?></p>
								<?php if(Yii::app()->my->access("edit") ): ?><a href="/faqs/<?php echo $faq->id; ?>/edit" class="edit">править</a><?php endif; ?>
							
							</details>

						</td>
					</tr>

				<?php endforeach; ?>

			</table>
			
			<?php if(Yii::app()->my->access("edit") ): ?>
			
				<br><a href="/faqs/create/<?php echo $track->id; ?>" class="btn btn-block btn-default">Добавить вопрос-ответ</a>
			
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


<script>
	
 

</script>