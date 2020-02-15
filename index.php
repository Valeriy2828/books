<body>
	<?php
		require ("includes/header.php");
	?>
	<div class="third_line">
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<h3 align="center" ><a href="catalog1.php" ><?php echo $config['title3']?></a></h3>						
					</div>
				</div>
			</div>
	</div>
	<div class="sider_container">
		<div class="next_button"><i class="fa fa-angle-right"></i></div>
		<div class="prev_button"><i class="fa fa-angle-left"></i></div>
		<div class="carousel">
			<div class="slide_item"><img src="images/book1.jpg" alt="book1"> </div>
			<div class="slide_item"><img src="images/book2.jpg" alt="book2"></div>
			<div class="slide_item"><img src="images/book3.jpg" alt="book3"></div>
			<div class="slide_item"><img src="images/book4.jpg" alt="book4"></div>
			<div class="slide_item"><img src="images/book5.jpg" alt="book5"></div>
		</div>
	</div>
	<?php		
		require ("includes/footer.php");
	?>		
</body>
</html>