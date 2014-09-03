<?php $this->layout="track"; ?>
<h2>Моя библиотека</h2>
<p>Здесь будет бла бла </p>


<?php $this->renderPartial("parts/list",array("docs"=>$docs)); ?>