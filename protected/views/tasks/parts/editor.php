
	<!-- Здесь находится редактор -->

	<div class="panel-body">
		
		<div class="tab-content">

			<div class="tab-pane" id="editor-theory">

				<article class="theory"><?php echo htmlspecialchars($task["theory"]); ?></article>	

			</div>		

			<div class="tab-pane active" id="editor-html">

				<textarea id="code-html" name="Solutions[html]" class="checkme_editor"><?php echo $task['html'] ?></textarea>	

			</div>

			<div class="tab-pane" id="editor-css">

				<textarea id="code-css" name="Solutions[css]" class="checkme_editor"><?php echo $task['css'] ?></textarea>	

			</div>
			
			
		</div>
		
	</div>