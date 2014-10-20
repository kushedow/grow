<div class="wrap portfolio-wrap">
	
	<!-- Logo and Navigation --><div class="site-header-container container">

	<div class="row">
	
		<div class="col-md-12">
			
			<header class="site-header">
			
				<section class="site-logo">

					<a href="/student<?php echo $student->id; ?>" class="epic-logo" >
						<img src="http://epixx.ru/wp-content/uploads/svg/epiclogo.svg" alt="epic_skills_logo">
					</a>
					
					<img src="<?php echo $student->avatar; ?>" class="pull-left img-circle " style="margin-top: 5px; margin-right: 15px; width: 80px;" alt="">
				
					<h1 class="title fullname" style="display: block;  font-size: 27px;">
						<a href="/student<?php echo $student->id; ?>/portfolio" style="color: #ff4e50;"><?php echo $student->fullname; ?></a>
					</h1>
					<h5 class="subtitle" style="color: #bbb;">Портфолио в рамках Epic Skills</h5>
					
				</section>
				
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						 
						<li>
							<a href="#portfolio">
								<span>Мои работы</span>
							</a>
							
							 
						</li>
						<li class="active">
							<a href="#skills">
								<span>Мои навыки</span>
							</a>
						</li>
						 
						<li>
							<a href="#mail">
								<span>Написать мне</span>
							</a>
						</li>
					 
					</ul>
					
				
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>
				
			</header>
			
		</div>
		
	</div>
	
</div>	