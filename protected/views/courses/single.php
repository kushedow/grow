<?php 
	
	 if(!isset($student)){ $student =$_SESSION['user']; }
?>

<div class="jumbotron">

	<?php if(Yii::app()->my->access("edit") ): ?> <a href="/course/<?php echo $course->id; ?>/edit" style="position: relative; z-index: 10;" class="btn btn-info pull-right">Редактировать</a> <?php endif; ?>

	<p>Курсы</p>

	<h1><?php echo $course->title; ?></h1>

	<h4>Набрано <?php echo stathelper::earnedforcourse($student,$course->id); ?> из <?php echo stathelper::pointsforcourse($course->id); ?> поинтов</h4>
	<hr>
	<p><?php echo $course->description; ?></p>
	
	<p>
		<br>
		<!-- <a class="btn btn-primary btn-lg" href="#markup" role="button">See the Markup</a> -->
	</p>

</div>

<?php $i=0; ?>



<div class="row">

	<!-- выводим все треки -->
	
	<?php foreach ($tracks as $track): $i++; ?><div class="col-md-6">
		
		
		<div class="panel panel-primary  " data-collapsed="0" ><!-- setting the attribute data-collapsed="1" will collapse the panel -->
				
				<!-- panel head -->
				<div class="panel-heading" style="background-image: -webkit-linear-gradient(left,#dddddd ,#EAEAEA <?php echo $track->progress ?>%); border:none">
					<div class="panel-title">

						<a href="/track/<?php echo $track->id; ?>" class="btn-block">

							<?php echo $i.". ".$track->title; ?> <span class="text-muted">(<?php echo $track->progress; ?>% пройдено)</span>

						</a>

						<div class="progress-micro">
							<div class="progress-bar-micro" style="width: <?php echo $track->progress; ?>%"></div>
						</div>

					</div>

					
					<!-- <div class="panel-options">
						<a href="#" data-rel="collapse" ><i class="entypo-down-open"></i></a>
					</div> -->
				</div>
				
				<!-- panel body -->
				<div class="panel-body" style="display: none;">
					
					<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="scrollable" data-height="200" data-scroll-position="right" data-rail-color="#fff" data-rail-opacity=".9" data-rail-width="8" data-rail-radius="10" data-autohide="0" style="overflow: hidden; width: auto; height: 200px;">
						
						<?php echo $track->description; ?>

						<hr>

						<!-- Выводим все задания трека -->

						<?php foreach ($track->Tasks as $task): ?><p>

							<?php $this->renderPartial("task_item",array("task"=>$task));  ?>

						</p><?php endforeach; ?>

						<!-- /Выводим все задания трека -->

					</div>

					<div class="slimScrollBar" style="width: 8px; position: absolute; opacity: 0.9; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; z-index: 99; right: 1px; top: 0px; height: 30px; display: block; background: rgb(255, 255, 255);"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>		
				</div>
				
			</div>
		</div>
	
	<?php endforeach; ?>

	<!-- /выводим все треки -->

</div>

<?php 

if(Yii::app()->my->access("edit")):?>
	
	<a href="/new/track/<?php echo $course->id; ?>" class="btn btn-block btn-default">Добавить тему</a>	

<?php endif; ?>
 