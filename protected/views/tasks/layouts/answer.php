
<br><br>	
<div class="row">
	
<div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
		
	<div class="panel panel-dark" data-collapsed="0">
			
		<!-- panel head -->
		<div class="panel-heading">
			<div class="panel-title"><?php echo $task->title; ?></div>
		</div>
		
		<!-- panel body -->
		<div class="panel-body task-description">

			<p><?php echo $task->description; ?></p>
			
			<p><?php echo $task->example; ?></p>

		</div>
		<!-- panel body -->
		<div class="panel-footer">

			 <p>Ваш ответ: </p>

			<form action="" method="POST" class="row">
				<div class="col-md-9"><input type="text" value="<?php if($task->active){echo $task->Solutions[0]->answer;} ?>" name="Solutions[answer]" class="form-control">  </div>
				<div class="col-md-3">

				<button class="btn btn-success  btn-block" name="action" value="save"  type="submit">

					<?php if($task->active): if($task->Solutions[0]->status=="check"): ?>Обновить<?php else: ?> На проверку <?php  endif; else: ?> На проверку <?php endif; ?>
					
				</button>  

				</div>
				
			</form>

			</form>

		</div>

	</div>

<div class="panel-group" id="accordion-test">
		
	<div class="panel panel-default ">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
					
					Комментарии

					<?php if($task->discussed): ?>
					
						<span class="label label-default pull-right" style="position:relative; top: -2px;"><?php echo $task->discussed; ?> комментарий</span>	 
					
					<?php endif; ?>
					
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse <?php if($task->discussed){echo "in";} ?>" >
			<div class="panel-body">

					<?php 	$this->renderPartial('parts/comments', array('task'=>$task)); ?>
				 
			</div>
		</div>
	</div>
	
</div>

	

</div>

</div>