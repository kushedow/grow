<h2>Группа <?php echo $group->title; ?></h2>
<?php echo $group->Course->title ?>, <?php echo count($group->Students); ?> человек в группе

<hr>

<div class="row">
	<div class="col-sm-7">

	<h4>Состав группы</h4><br>
		
		<table class="table">
			
			<?php foreach ($group->Students as $index=>$student): ?>

				<tr> 

					<td> <?php echo $index+1; ?>. <a href="/student<?php echo $student->id ?>"><?php echo $student->fullname; ?></a></td>

					<td> <span class="label label-default pull-right">поинтов <?php echo stathelper::earnedforcourse($student->id,$group->Course->id); ?></span> </td>

	
				</tr>
			
			
			<?php endforeach; ?>
			


		</table>

	</div>
	<div class="col-sm-4 col-sm-offset-1">

	<h4>Темы</h4><br>
		
		<?php if(isset($group->Course )): ?>

			<table class="table">
		
				<?php foreach ($group->Course->Tracks as $track): ?>
				
					<tr>

						<td><a href="/groups/<?php echo $group->id ?>/progress/<?php echo $track->id; ?>"><?php echo $track->title; ?></a></td>

						
					</tr>
				
				<?php endforeach; ?>

			</table>
			
		
		<?php endif; ?>
		

	</div>
</div>