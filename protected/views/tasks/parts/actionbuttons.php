<?php

/*
* 	 Здесь хранятся кнопки, которые сохраняют, отправляют на проверку и показывают теорию
*
*/

?>

<div class="actions">

	<?php if(isset($solution)): ?>

		<input type="hidden" name="Taskss[id]" value="<?php echo $solution->id; ?>">

	<?php endif; ?>



</div>