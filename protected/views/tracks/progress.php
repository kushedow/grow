 <h3><?php echo $group->title; ?>:<?php echo $track->title; ?></h3> <br>

<table class="table">

	<tr>

	
	 </tr> 

	 <?php foreach ($progress as $student_id=>$student): ?>
	 
	 	<tr>

	 		<th><?php echo $students[$student_id]->fullname; ?></th>
	 		
			<?php foreach ($student as $task_id => $status): ?>
						
						<td> <a href="/student<?php echo $student_id; ?>/task<?php echo $task_id; ?>"><?php statushelper::microlabel($status) ?></a></td>

			<?php endforeach; ?>
									

	 	</tr>
	 
	 <?php endforeach; ?>
	 

</table>
  
