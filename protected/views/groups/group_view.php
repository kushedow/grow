<tr><td>

	 <a href="/groups/<?php echo $data->code; ?>">

		<span class="group-square" style="width: 40px; display:inline-block; float:left; line-height: 40px; height: 40px; background-color: #444; color:#fff; text-align: center; margin-right: 15px;">

			<?php echo $data->code; ?>

		</span>

	
			<!-- Название и курс группы -->

			<h4 >

				<?php echo $data->title ?>: <span class="text-muted"><?php if($data->Course){echo $data->Course->title;}else{echo "Курс не выбран";} ?></span>

				<small>(<strong><?php echo count($data->Students); ?></strong> студентов)</small>
			</h4>

			

	</a>

</td><td>


		<h5 class="pull-right">Куратор: <?php if(isset($data->Curator)){ echo $data->Curator->fullname;} ?></h5>
	 
		
		<!-- Быстрый переход к прогрессу -->

</td><td>

		<div class="btn-group pull-right ">

			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				Выберите тему<span class="caret"></span>
			</button>

			<ul class="dropdown-menu " role="menu">


				<?php foreach (Tracks::model()->findAllByAttributes(array("course"=>$data->course)) as $item): ?>
				
						<li>

							<a href="/groups/<?php echo $data->id; ?>/progress/<?php echo $item->id; ?>">
								<?php echo $item->title; ?>
							</a> 

						</li>
				
				<?php endforeach; ?>

			</ul>
		</div>

</td></tr>


<div class="row">

	<?php foreach ($data->Students as $student): ?>

		<?php // $this->renderPartial("student_view",array("data"=>$student,"course"=>$data->Course));
		 ?>  

	<?php endforeach; ?>

</div>