<?php

/**
* @var $this StudentsController 
* @var $students Спиоок студентов, полный
*
**/


?>


<h2>Все пользователи системы</h2>
<!-- <h4> Список студентов </h4> -->
<hr>

 <div class="row students-index">
	
	<?php foreach ($students as $student): ?>
	
		<div class="col-md-4 student-index-item">

			<?php if(strlen($student['avatar'])>5 ): ?>

				<img   width="30" height="30" src="<?php echo $student['avatar'] ?>" alt="" class="pull-left"> 
			
			<?php else: ?>
			
				 <img src="http://placehold.it/30x30"  width="30" height="30"  alt="">
			
			<?php endif; ?>
			 
			<strong><a href="/student<?php echo $student->id; ?>"><?php echo $student['fullname'] ?></a> </strong>
			<!-- <span class="label label-default"><?php echo $student->role; ?></span> -->
			<br>
			<?php foreach( $student->Groups as $group ){ echo $group->title." ";} ?>	

 

			 

		</div>
	
	<?php endforeach; ?>

</div>


