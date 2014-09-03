<div class="sidebar-menu">
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="/">
					EPIC SKILLS 
				</a>
			</div>
			
			<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
									
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<!-- Search Bar -->
		<!-- 	<li id="search">
				<form method="get" action="">
					<input type="text" name="q" class="search-input" placeholder="Search something..."/>
					<button type="submit">
						<i class="entypo-search"></i>
					</button>
				</form>
			</li> -->

			<li style = "background-color: rgba(0,0,0,0.2) " class="clearfix">
				
				<div class="user-info ">
								<!-- Profile Info -->
					<div class="  profile-info dropdown clearfix " ><!-- add class "pull-right" if you want to place this from right -->
						
						<a href="/auth/logout" class="profile-logout " style="line-height: 43px; position:absolute; right:0"><small>выйти</small></a>

						<a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">
							<img src="<?php echo $_SESSION['avatar'] ?>" alt="" class="img-circle " width="44" height="44">
							<span class="fullname"><?php echo $_SESSION['fullname']; ?></span><br>
							
						</a>

					</div>
				 
				</div>

			</li>
			<li >
				<a href="/student<?php echo Yii::app()->my->id; ?>">
					<i class="entypo-gauge"></i>
					<span>Профиль</span>
				</a>
			</li>
			<li>
				<a href="/courses">
					<i class="entypo-layout"></i>
					<span>Курсы</span>
				</a>
				<ul>

				<?php $settings =  json_decode($_SESSION['settings'],true); ?>

				<?php 

					if(isset($settings['courses'])) {

					$courses =  Courses::model()->findAll("id IN (".implode(",",$settings['courses']).")"); 

					}else{

						$courses =  array(); 

					}
				?>

				<?php foreach ( $courses as $course): ?>
				
						<li>
							<a href="/course/<?php echo $course->code; ?>">
								<span><?php echo $course->title; ?></span>
							</a>
						</li>					

				<?php endforeach; ?>
				</ul>

			</li>
			<!-- <li>
				<a href="/docs" target="_blank">
					<i class="entypo-monitor"></i>
					<span>Файлы и презентации</span>
				</a>
			</li> -->
			<!-- <li>
				<a href="ui-panels.html">
					<i class="entypo-newspaper"></i>
					<span>Инструменты</span>
				</a>
			</li>

			<li>
				<a href="mailbox.html">
					<i class="entypo-mail"></i>
					<span>Оповещения</span>
					<span class="badge badge-secondary">
					<?php echo Solutions::model()->countByAttributes(array("student"=>Yii::app()->my->id,"status"=>"finishhim")); ?> 
					</span>
				</a>
			</li> -->

			<!-- <li>
				<a href="/groups">
					<i class="entypo-doc-text"></i>
					<span>Группы</span>
				</a>
			</li>
 -->

			<li>
				<a href="/students">
					<i class="entypo-doc-text"></i>
					<span>Студенты</span>
				</a>
			</li>

			<li class="">
				<a href="/algorithms">
					<i class="entypo-bag"></i>
					<span>Алгоритмы</span>
					<span class="badge badge-info badge-roundless">2 новых</span>
				</a>

				<ul>
					
					<?php foreach ($courses as $course): ?>
					
						<li><a href="/course/<?php echo $course->code ?>/algorithms"><span><?php echo $course->title ?></span></a></li>
					
					<?php endforeach; ?>

					<li><a href="/algorithms"><span>Все алгоритмы</span></a></li>
					
				<?php if(Yii::app()->my->access("edit")): ?><li><a href="/algorithms/new">Добавить</a></li><?php endif; ?>

					
					
				</ul>

			</li>

			<li>
				<a href="/videos">
					<i class="entypo-doc-text"></i>
					<span>Видео</span>
				</a>
			</li>

			<li  >
				<a href="/sandbox">
					<i class="entypo-bag"></i>
					<span>Песочница</span>
					 
				</a>
				
			</li>

			<?php if(Yii::app()->my->access("users")): ?>
			
			<li>
				<a href="/students/create">
					<i class="entypo-window"></i>
					<span>Создать пользователя</span>
				</a>
				
			</li>
			
			<?php endif; ?>


			

						
			<li>
				<a href="https://docs.google.com/document/d/14RsZBMNybQcbGG7YgUmMuW-OpRw08D5HyIa3A-TmWd0/edit" target="blank">
					<i class="entypo-window"></i>
					<span>Глоссарий</span>
				</a>
				
			</li>

			<li>
				<a href="/settings" target="blank">
					<i class="entypo-cog"></i>
					<span>Настройки</span>
				</a>
				
			</li>

			
		</ul>
				
	</div>	