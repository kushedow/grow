<?php include("header.php");?>

<body class="page-body" >

	<div class="page-container">

	<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
		
		<!-- Боковая колонка -->

		<?php include("sidebar.php");?>
		
		<div class="main-content">

			<!-- Профиль пользователя -->

			<!-- Основной контент -->

			<?php echo $content; ?>

			<!-- Подвальчик  -->

			<?php include("footer.php");?>				

		</div>
			
	</div>

		<!-- Bottom Scripts -->
		
		<script src="assets/js/gsap/main-gsap.js"></script>
		<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/joinable.js"></script>
		<script src="assets/js/resizeable.js"></script>
		<script src="assets/js/neon-api.js"></script>
		<script src="assets/js/neon-custom.js"></script>
		<script src="assets/js/neon-demo.js"></script>

</body>
</html>