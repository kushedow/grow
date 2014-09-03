<div class="col-md-6"> 
	<div class="member-entry ">
			
		<a href="/student/<?php echo $data->id; ?>" class="member-img">
			<img src="<?php echo $data->avatar ?>" class="img-rounded">
			<i class="entypo-forward"></i>
		</a>
		
		<div class="member-details">

			<a href="/reward/<?php echo $data->id; ?>/<?php echo $course->id; ?>/1" class="pull-right btn btn-xs btn-info xs-muted"> + Стикер </a>

			<h4>
				<a href="#"><?php echo $data->fullname;?></a>
			</h4>
				
				<div class="row info-list">

				<div class="col-xs-12">
				
					<p><?php echo $data->getStat($course->id); ?></p>

				</div>
				
				<div class="col-sm-6">
					<i class="entypo-twitter"></i>
					<a href="#">@johnnie</a>
				</div>
				
				<div class="col-sm-6">
					<a href="http://vk.com/im?sel=<?php echo $data->vkid; ?>" target="blank"><span class="glyphicon glyphicon-envelope"></span></a>
					<a href="http://vk.com/id<?php echo $data->vkid; ?>" target="blank">vk.com/id<?php echo $data->vkid; ?></a>
				</div>
				
			</div>
		</div>
		
	</div>
</div>
