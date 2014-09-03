<?php
/* @var $this AuthController */

$this->layout = 'lockscreen';
 
?> 

<div class="row text-center">


	<div class="col-md-4 text-left" style="float:none; display: inline-block; margin-top: 150px;">

		<form class="tile-stats tile-white tile-white-primary" method="POST">
			<div class="icon"><i class="entypo-lock"></i></div>
			<div class="num" > Точка входа </div>
			
			<h5>Чтобы войти в систему, придется вспомнить почту и пароль. Чуть позже появится авторизация через социальные сети</h3>
			 
			<br>

			<?php Yii::app()->notify->show(); ?>
			<div class="input-group">
				<span class="input-group-btn">
					<span class="btn btn-primary" style="width: 70px" type="button">Почта &nbsp;</span>
				</span>
				
				<input type="text" name = "Auth[mail]" class="form-control" style="font-size: 18px">
			</div>

			<br>

			<div class="input-group">
				<span class="input-group-btn">
					<span class="btn btn-primary" style="width: 70px"  type="button">Пароль</span>
				</span>
				
				<input type="password" name = "Auth[pass]" class="form-control" style="font-size: 18px">
			</div>

			<br>

			<button type="submit" class="btn btn-block btn-success btn-lg">Постучаться</button>

		</form>

	</div>


</div>