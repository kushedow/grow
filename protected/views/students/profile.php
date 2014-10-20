<div class="profile-env">
		
	<section class="profile-info-tabs">
		
		<div class="row">

		    <div class="col-md-3">

		    	<figure class="student-avatar">
		    	
					<a href="/student<?php echo $student->id; ?>/portfolio" target="blank"><img src="<?php echo  $student->avatar; ?>" class="img-circle" width="150" height="150"  alt=""></a>

					<div class="points"><strong><?php echo stathelper::pointstotal($student->id); ?></strong> поинт</div>

				</figure>

		    </div>
			
			<div class="col-md-9">

				<h2><?php echo $student->fullname; ?><?php if($student->id==Yii::app()->my->id): ?> (это вас так зовут)<?php endif; ?>
				
					<?php if(Yii::app()->my->access("check") ): ?>
					
						<a href="student<?php echo $student->id; ?>/addpoint" class="btn btn-primary">+ Поинт</a>
					
					<?php endif; ?>

				</h2> 
				
				<ul class="user-details">
					 
				
					
					<li>

						<a href="#">
							<i class="entypo-user"></i>

							<?php switch ($student->role) {

								case 'curator': echo "Группенфюрер";  break;

								case 'author': echo "Автор курсов";  break;

								case 'owner': echo "Агент системы";  break;
								
								default:
									 
									 echo "Студент";
								
								break;

							} ?>
							
							 
							
						</a>

					</li>

					<li>
						<i class="entypo-suitcase"></i>
						<?php foreach ( $student->Groups as $group): ?>
							
							<a href="/groups/<?php echo $group->code; ?>"><u><?php echo $group->title; ?></u></a>

						<?php endforeach;?>
						
					</li>

						<?php if(Yii::app()->my->access("check") ): ?>
						
							<li>
								<b>Выполнено заданий: <span class="badge badge-success"><?php echo Solutions::model()->countByAttributes(array("status"=>"complete","student"=>$student->id)); ?></span></b>
								&nbsp; 
								<b>Проверено заданий: <span class="badge badge-info"><?php echo Solutions::model()->countByAttributes(array("status"=>"complete","checked"=>$student->id)); ?></span></b> 
							
	&nbsp; 
								<b>Комментариев: <span class="badge badge-primary"><?php echo Comments::model()->countByAttributes(array("student"=>$student->id)); ?></span></b> 

							</li>
						
						<?php endif; ?>
						

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
								<span >Карьера</i></span>
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
		 
			<tr>
				<td><a href="/student<?php echo $solution->student ?>/task<?php echo $solution->task; ?>">
				<?php if(isset($solution->Task)) { echo $solution->Task->title; }else{echo "Задание удалено </td></tr>"; continue;}?>
				</a></td>

				<td><?php echo statushelper::label($solution->status); ?>  </td> 

			</tr>

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

						<?php if(Yii::app()->my->access("users") ): ?>
						
								<?php echo $form->dropDownList($student,'Groups',CHtml::listData(Groups::model()->findAll(),'id','title'),array("multiple"=>true,'class'=>'form-control')); ?>
						
						<?php endif; ?>
						

						<button type="submit" class="btn btn-success"> Сохранить</button>

					</div> <!-- /.col-md-4 -->	


			 	</div>

			 	

		 	<?php $this->endWidget(); ?>

		</div>

		<div class="tab-pane" id="portfolio">

	
		<div class="row">

			<div class="col-md-3">
				
			<!-- Добавим возможность ставить флажки -->

				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							<h4>
								Настройка карьеры<br><small>Заполните, чтобы получать предложения</small>
							</h4>
						</div>
					</div>
				
					<div class="panel-body ">

						<?php $form=$this->beginWidget('CActiveForm'); ?>	

							<p><?php echo $form->checkBox($student,'yes_office',array('class'=>'')); ?> <label for="Students_yes_office">Хочу в офис</label></p>

							<?php echo $form->checkBox($student,'yes_internship',array('class'=>'')); ?> <label for="Students_yes_internship">Хочу на стажировку</label></p>

							<?php echo $form->checkBox($student,'yes_freelance',array('class'=>'')); ?> <label for="Students_yes_freelance">Хочу на фриланс</label></p>
							
							<?php echo $form->checkBox($student,'yes_projects',array('class'=>'')); ?> <label for="Students_yes_projects">Хочу делать проекты</label></p>

							<button type="submit" class="btn btn-success"> Обновить настройки</button>

					 	<?php $this->endWidget(); ?>

					</div>
				</div>

			</div><!--/.col-md-4 -->
			
			<div class="col-md-9">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4>
									Мое портфолио<br><small><a href="/sandbox"><u>Отметьте несколько работ для портфолио</u></a></small>
								</h4>
							</div>
						</div>
					
						<div class="panel-body ">


							<p>В настоящий момент отображаются только задания типа html+css</p>

							<?php if($student->hasPortfolio): ?>	

								<?php $portfolio = Buckets::model()->findAllByAttributes(array("student"=>$student->id,"portfolio"=>true));?>

								<?php foreach ($portfolio as $i=>$item): ?>
								
									<p><?php echo $i; ?>. <a href="/sandbox/<?php echo $item->id; ?>/preview"><u><?php echo $item->title; ?></u></a></p>

								<?php endforeach; ?>
								


							<?php else:  ?>

								<p class="alert alert-default"> <small>Сейчас в портфолио ничего нет.</small></p>

							<?php endif; ?>

						</div>
					</div>
				
			</div> <!-- .col-md-8-->

			 


		</div>

			



			

		</div>

	<?php endif; ?>

	

</div>