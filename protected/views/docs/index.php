<?php $this->layout="track"; ?>

<h2>Библиотека: пробный режим</h2>
<br>

<div class="row"> 

<div class="col-md-3">

<div id="toc" class="tocify" style="width: 220px;">
 
</div>
</div>

<div class="col-md-9">

	<?php $this->renderPartial("parts/list",array("docs"=>$docs)); ?>
				
</div>


</div>