<div class="profile-env">
		
	<section class="profile-info-tabs">
		
		<div class="row">

		    <div class="col-md-3">
		    	
				<img src="<?php echo  $student->avatar; ?>" class="img-circle" width="150" height="150"  alt="">

		    </div>
			
			<div class="col-md-9">

				<h2><?php echo $student->fullname; ?><?php if($student->id==Yii::app()->my->id): ?> (это вас так зовут)<?php endif; ?>
				</h2><br>
				
				<ul class="user-details">
					 
					<li>
						<i class="entypo-suitcase"></i>
						<?php foreach ( $student->Groups as $group): ?>
							
							<a href="/groups/<?php echo $group->code; ?>"><?php echo $group->title; ?></a>

						<?php endforeach;?>
						
					</li>
					
					<li>
						<a href="#">
							<i class="entypo-calendar"></i>
							Студент
						</a>
					</li>
				</ul>
				
				
				<!-- tabs for the profile links -->
				

				<ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
					<li class="active">
						<a href="#home" data-toggle="tab">
							<span class="visible-xs"><i class="entypo-home"></i></span>
							<span class="hidden-xs">Задания</span>
						</a>
					</li>
					<!-- <li class="">
						<a href="#profile" data-toggle="tab">
							<span class="visible-xs"><i class="entypo-user"></i></span>
							<span class="hidden-xs">Бейджи</span>
						</a>
					</li> -->
				<!-- 	<li >
						<a href="#messages" data-toggle="tab">
							<span class="visible-xs"><i class="entypo-mail"></i></span>
							<span class="hidden-xs">Комментарии</span>
						</a>
					</li> -->
					<li>
						<a href="#sandbox" data-toggle="tab">
							<span class="visible-xs"><i class="entypo-cog"></i></span>
							<span class="hidden-xs">Песочница</span>
						</a>
					</li>

					<?php if(Yii::app()->my->id==$student->id OR Yii::app()->my->access("users")): ?>
					
						<li>
							<a href="#edit" data-toggle="tab">	 
								<span ><i class="icon entypo-pencil"></i></span>
							</a>
						</li>						 
					
					<?php endif; ?>

						<li>
							<a href="#portfolio" data-toggle="tab">
								<span >Портфолио</i></span>
							</a>
						</li>	
					


				</ul>
				
			</div>
			
		</div>
		
	</section>
	
</div>



<div class="tab-content profile-tab-content">

	<div class="tab-pane active " id="home">
		
		<h3>Задания</h3>

		<?php $solutions = $student->Solutions; ?>

		<table class="table">

		<?php foreach ($solutions as $solution): ?>
		 
			<tr><td><a href="/student<?php echo $solution->student ?>/task<?php echo $solution->task; ?>"><?php echo $solution->Task->title; ?></a></td><td><?php echo statushelper::label($solution->status); ?></td></tr>

		<?php endforeach; ?>

		</table>

	</div>

	<div class="tab-pane " id="sandbox">

		<?php $buckets = Buckets::model()->findAllByAttributes(array("student"=>$student->id)); ?>

		<?php $this->renderPartial('/sandbox/index', array("buckets"=>$buckets)); ?>

 	</div>

 	<?php if(Yii::app()->my->id==$student->id OR Yii::app()->my->access("users")): ?>
				
		<div class="tab-pane " id="edit">	

			 <?php $form=$this->beginWidget('CActiveForm'); ?>	

			 	<div class="row">
			 		
					<div class="col-md-4">

						<label for="">Имя</label>

						<?php echo $form->textField($student,'shortname',array('class'=>'form-control')); ?>

					 	<label for="">Полное имя</label>

						<?php echo $form->textField($student,'fullname',array('class'=>'form-control')); ?>

					 	<label for="">Ссылка на юзерпик</label>
						<?php echo $form->textField($student,'avatar',array('class'=>'form-control')); ?>
							

					</div> <!-- /.col-md-4 -->

					<div class="col-md-4">

					 	<label for="">Почта</label>
						<?php echo $form->textField($student,'mail',array('class'=>'form-control')); ?>

					 	<label for="">id Вконтакте</label>
						<?php echo $form->textField($student,'vkid',array('class'=>'form-control')); ?>

					 	<label for="">Телефон</label>
						<?php echo $form->textField($student,'phone',array('class'=>'form-control')); ?>

					</div> <!-- /.col-md-4 -->

					<div class="col-md-4">

					 	<label for="">Пароль</label>
						<?php echo $form->passwordField($student,'pass',array('class'=>'form-control')); ?>


						<button type="submit" class="btn btn-success"> Сохранить</button>

					</div> <!-- /.col-md-4 -->	


			 	</div>

			 	

		 	<?php $this->endWidget(); ?>

		</div>

		<div class="tab-pane" id="portfolio">
			
			<p>В разделе "мое портфолио" могут выводиться выполненые задания.</p>

			<p>В настоящий момент отображаются только задания типа html+css</p>

			<?php if($student->hasPortfolio): ?>	


			<?php else:  ?>

				 Сейчас в портфолио ничего нет.

			<?php endif; ?>
			

		</div>

	<?php endif; ?>

	

</div>