<?php  $this->layout = "track"; ?>

<!-- Здесь плашка -->

<?php include("parts/header"); ?>


<h2>Все теория </h2>

<hr>

<div class="row">


	<div class="col-md-4">
		
			<div id="toc" class="tocify" >
				<ul id="tocify-header0" class="tocify-header nav nav-list">
					<li class="tocify-item active" data-unique="MainIcons"><a>Основные темы</a></li>
				</ul>
				<ul id="tocify-header1" class="tocify-header nav nav-list">

					<?php foreach ($tasks as $i=>$task): ?>
						<li class="tocify-item" data-unique="SocialIcons" style="cursor: pointer;"><a href="/track/<?php echo $track->id; ?>/theory#task<?php echo $task->id ?>"><?php echo $task->title; ?></a></li>
					<?php endforeach; ?>

				</ul>
			</div>

	</div>

	<div class="col-md-8">
		
		<?php foreach ($tasks as $i=>$task): ?>
		
			<article class="theory fulltheory">

				<a href="/task/<?php echo $task->id; ?>" class="title" id="task<?php echo $task->id ?>"><h3 class="muted">  <?php echo $i+1; ?>. <?php echo $task->title; ?></h3></a>

				<?php echo $task->theory; ?>

			</article>

			<hr>

		<?php endforeach; ?>

	</div>



</div>

