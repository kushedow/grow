<?php

/* @var $this AlgorithmsController */
?>
<a href="/algorithms/new" class="btn btn-primary pull-right">Добавить</a>
<h2>Алгоритмы</h2>
<h4> (временная страница, показываются все) </h4>

<hr>

<div class="row">

	<?php foreach ($algorithms as $algorithm): ?>

		<div class="col-md-4">

			<div class="alert alert-default">
					
				<a href="/algorithms/<?php echo $algorithm->id; ?>">	
					<div class="tile-header">
						 <?php echo $algorithm->title; ?>
						(<small><?php echo $algorithm->description; ?></small>)
					</div>
					
				</a> 

			</div>

		</div>

	<?php endforeach; ?>

</div>

</table>



