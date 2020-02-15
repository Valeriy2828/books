<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<?php
require ("config/config.php");
require ("config/count.php");
include ("forma_reg/save_user.php");
?>
<head>
	<meta charset="utf-8" />
	<title><?php echo $config['title1']?></title>
	<meta name="description" content="Создание адаптивного сайта" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
</head>
<header class="top_header">
		<div class="header_topline">
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<h1 align="center" ><a href="index.php"><?php echo $config['title2']?></a></h1>						
					</div>
				</div>
			</div>
		</div>
		<div class="second_line">
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<div class="order_info">
							<ul>
								<li><a href="contacts.php">Контакты</a></li> 
								<li><a href="delivery.php">Оплата/доставка</a></li>
								<li><a href="zakaz.php">Как заказать</a></li>
								<li><a href="basket.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Корзина</a></li>
							</ul>	
						</div>																	
						<div class="registr">
						<?php
							if(session_id() == '') {
								session_start();
							} 
							if($_SESSION && $_SESSION['login']){
						?>
							<button><i class="fa fa-user-circle" aria-hidden="true"></i></button>
						<?php		
							echo $_SESSION['login']."/";
						?>																													
							<a href="out.php">Выход</a>																					
						<?php	
							}else{ 
						?>											
							<a href="forma_reg/new_form.php">Вход</a> /
							<a href="forma_reg/exit.html">Регистрация</a>
						<?php 
								} 
						?>	
						</div>
					</div>	
				</div>
			</div>
		</div>				
	</header>		