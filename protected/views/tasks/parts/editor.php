
	<!-- Здесь находится редактор -->

	<div class="panel-body">
		
		<div class="tab-content">

			<div class="tab-pane" id="editor-theory">

				<article class="theory"><?php echo $task["theory"]; ?></article>	

			</div>	


			<?php if($task->layout=="php"): ?>

				<div class="tab-pane active" id="editor-example">

					<iframe src="" frameborder="0" id="example" width="100%" height="210"></iframe>

					<code style="display: none" id="example-code"><?php echo $task->example; ?></code> 
 
				</div>	

			<?php endif; ?>


			<div class="tab-pane <?php if($task->layout=="html-css" OR $task->layout=="html-full" OR $task->layout=="html-site" ):?> active <?php endif; ?>" id="editor-html">

				<textarea id="code-html" name="Solutions[html]" class="checkme_editor"><?php echo $task['html'] ?></textarea>	

			</div>
			

			<div class="tab-pane" id="editor-css">

				<textarea id="code-css" name="Solutions[css]" class="checkme_editor"><?php echo $task['css'] ?></textarea>	

			</div>

			<div class="tab-pane" id="editor-php">

				<textarea id="code-php" name="Solutions[php]" class="checkme_editor"><?php echo $task['php'] ?></textarea>	

			</div>

			<div class="tab-pane <?php if($task->layout=="js"):?> active <?php endif; ?>" id="editor-js">

				<textarea id="code-js" name="Solutions[js]" class="checkme_editor"><?php echo $task['js'] ?></textarea>	

			</div>

			<?php if($task->layout=="html-full" OR $task->layout=="html-site"): ?>

				
				<div class="tab-pane" id="editor-comments">  
					 
					<?php $this->renderPartial("parts/comments",array("task"=>$task)); ?>

		     	</div>

		     <?php endif; ?>
			
			
		</div>
		
	</div>