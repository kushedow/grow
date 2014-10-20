<span class=" btn btn-primary pull-right">Всего проверено: <?php echo Solutions::model()->countByAttributes(array("status"=>"complete")); ?></span>

<h2>Все <?php echo count($solutions) ?> заданий на проверку</h2>

<hr>

<?php


// Сперва поделим задания по групам

	$coursed = [];
 
	foreach ($solutions as $solution){

		$coursed[$solution->Task->Tracks->Course->id][] = $solution;

	}  

?>

<div class="row">
	<div class="col-md-3">
		
					<ul class="nav  ">

						<?php foreach (Courses::model()->findAll() as $course): ?>

							<?php if(!isset($coursed[$course->id])){continue;}?>
							
							<li class=""><a href="#course-<?php echo $course->id; ?>" data-toggle="tab"><?php echo $course->title; ?>  

								

									<?php if(isset($coursed[$course->id])):?> 
										<span class="badge badge-primary pull-right"> 
											<?php echo count($coursed[$course->id]); ?>
										</span> 
									<?php endif; ?>

							</a></li>
					
						<?php endforeach; ?>
						
					</ul>
			 
			

	</div>
	<div class="col-md-9">
		

			<div class="panel-body">

				<div class="tab-content">

					<?php foreach ($coursed as $key=>$list): ?>
					
						<div class="tab-pane active" id="course-<?php echo $key; ?>">
							
									<table class="table">
			
										<?php foreach ($list as $solution): ?>

											<?php if(!isset($solution->Task)){continue;} ?>
										
											<tr>
												<td> 

													<?php if(isset($solution->Task->title)): ?>

														<?php statushelper::microlabel($solution->status) ?>

														<a href="student<?php echo $solution->student; ?>/task<?php echo $solution->task; ?>" target="blanc">

															<strong class="track-title"><?php echo $solution->Task->Tracks->title; ?></strong> → <?php echo $solution->Task->title; ?>

														</a>

													<?php endif; ?>
														

													<?php if(isset($solution->Student)): ?>
														
														<a href="" class=" pull-right"><?php echo $solution->Student->fullname; ?></a>
														
													<?php endif; ?>
															
													
												</td>
											</tr>
										
										<?php endforeach; ?>
										

									</table>


						</div>
						
					<?php endforeach; ?>
			
				
				</div>
				
			</div>
			
		


<br>


	</div>
</div>



<style>
	
 
table.table tr:first-child td {

	border-top: none;

}



</style>