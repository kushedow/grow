<?php $this->layout="track"; ?>

<a href="/docs/create" class="btn btn-primary pull-right">Добавить</a>

<h2>Библиотека: пробный режим</h2>
<br>

<div class="row"> 



<div class="col-md-12">

	<?php $this->renderPartial("parts/list",array("docs"=>$docs)); ?>
				
</div>


</div>