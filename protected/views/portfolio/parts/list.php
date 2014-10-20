<div class="row">

	<?php if($student->hasPortfolio): ?>	

		<?php $portfolio = Buckets::model()->findAllByAttributes(array("student"=>$student->id,"portfolio"=>true));?>

		<?php foreach ($portfolio as $i=>$item): ?>
		
			<a href="/sandbox/<?php echo $item->id; ?>/preview">

				<div class="col-sm-4 col-xs-6">
					
					<div class="portfolio-item">
						<span href="portfolio-single.html" class="image" style="background-image: url(http://www.pro-s.co.jp/wp-content/uploads/15-icon-patterns.jpg); -webkit-background-size: auto 100%;
						background-size: auto 100%;">
							<img src="/frontend/images/portfolio-thumb.png" class="img-rounded" />
							<span class="hover-zoom"></span>
						</span>
						
						<h5>
							 
							<span class="name"><u><?php echo $item->title; ?></u></span>
						</h5>
						
						<div class="categories">
							<span >Выполнено за время обучения</span>
						</div>
					</div>
					
				</div>

			</a>

		<?php endforeach; ?>

	<?php endif; ?>			
