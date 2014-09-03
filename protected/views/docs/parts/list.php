<?php

/**
*
*  
*
**/

?>
<div class="search-results-pane tocify-content" id="" style="display: block;">
			
	<table class="table table-bordered table-hover table-striped table-docs">
		<!-- <thead>
			<tr>
				<th width="4%" class="text-center">Pic</th>
				<th>Full Name</th>
				<th width="40%">Occupation</th>
				<th class="text-center" width="25%">Items Purchased</th>
			</tr>
		</thead> -->
		<tbody>

		<?php foreach ($docs as $doc): ?>

				<tr>
					<td class="text-center middle-align">
						<a href="<?php echo $doc->link; ?>" target="blank">
							<img src="<?php echo $doc->picture; ?>" alt="" width="40" class="img-rounded" />
						</a>
					</td>
					<td class="middle-align">
						<a href="<?php echo $doc->link ?>" target="blank">
							 <?php echo $doc->title ?> 
						</a>
						<p class="small"><small class="text-muted"><?php echo $doc->description; ?></small></p>
					</td>
					 
					<td class="text-center middle-align " style="width: 60px"><a href="/docs/<?php echo $doc->id; ?>/add" class="btn btn-primary btn-save">На полку</a></td>
				</tr>

		<?php endforeach; ?>

		</tbody>

	</table>
	
</div>


