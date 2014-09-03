<?php
	 

?>

<div class="row">

	<a href="/algorithms/<?php echo $algorithm->id ?>/edit" class="btn btn-primary pull-right">Редактировать</a>
	
	<div class="col-md-12" style="padding: 0px 40px">

		<h3> 

			<?php if(isset($algorithm->Tracks[0])): ?>
			
			      <a href="/course/<?php  $algorithm->Tracks[0]->Course->code; ?>/algorithms" class="muted"><?php echo $algorithm->Tracks[0]->Course->title; ?> </a>: 
			
			<?php endif; ?>
			
			<?php echo $algorithm->title; ?> </h3>
		
		<p><?php echo $algorithm->description; ?></p>
		 
		<hr>

		<div class=" tile-algorithm">

			<div class="algorithm-layout">

				<h2 class="num"></h2>

				<?php  $steps = json_decode($algorithm->steps);  ?>

				<ul class="cbp_tmtimeline">

					<?php  foreach ($steps as $key => $step): ?>
						
						<li>
							 
							<div class="cbp_tmicon bg-cyan">
								<?php echo $key+1; ?>
							</div>
							
							<div class="cbp_tmlabel empty">

								<div class="row">
									
									<div class="col-md-6">
										
											<h3><?php if(isset($step->title)){echo htmlspecialchars($step->title); }?></h3>
											<?php if(isset($step->description)): ?><p class="compact"><?php echo $step->description; ?></p><?php endif; ?>
											
											<?php if(isset($step->code) AND (strlen($step->code))>3): ?>
										
												<code class=""><?php echo htmlspecialchars( $step->code); ?></code>
											
											<?php endif; ?>

											<?php if(isset($step->image) AND (strlen($step->image))>3): ?>

												<a href=""><img src="<?php echo $step->image ?>" class="algorithm-image"alt=""></a>

											<?php endif; ?>


									</div>
									<div class="col-md-6">

										<?php if(isset($step->preview) AND (strlen($step->preview))>3): ?>
											
											<div class="algorithm-preview">

											 <?php echo $step->preview; ?> 

											</div>
												
										<?php endif; ?>

									</div>

								</div>

							</div>
						</li>
						
					<?php endforeach; ?>
				 
				</ul>

			</div>

			<hr>

		</div>

	</div><!-- /.col-md-8 -->

	<div class="col-md-5 ">
 		
	</div>

</div><!-- /.row -->

<script>
	
	$(document).ready(function(){

		$(".algorithm-layout a").each(function(){ $(this).attr("target","blank"); });

	});

</script>


<link rel="stylesheet" href="assets/js/vertical-timeline/css/component.css">
