<?php   
    session_start();
?>
    <html>
		<head>
			<title>Главная страница</title>
			<link rel="stylesheet" href="my_styles1.css">
			<link rel="stylesheet" href="../css/fonts.css" />
			<style>
			 body {
				background-image: url(../images/0000.jpg);
				background-size: 100%;
			}
		   .my_button {
				width: 140px;
				height: 30px;
			}
			.my_button1 {			
				height: 25px;
			}
			</style>
		</head>
    <body>
		<div class="header_page">
			<div class="new_page">
				<h2>Вход</h2>
			</div>
				<form action="testreg.php" method="post">
			<div class="new_log">
				<p>
					<label>Ваш логин:<br></label>
					<input name="login" type="text" placeholder="Логин" size="20" maxlength="20" class="my_button1">
				</p>
			</div>
			<div class="new_pass">
				<p>
					<label>Ваш пароль:<br></label>
					<input name="password" type="password" placeholder="Пароль" size="20" maxlength="20" class="my_button1">
				</p>
			</div>
			<div class="new_sub">
				<p>
				<input type="submit" name="submit" value=" Войти " class="my_button">
					<br>
			</div>
				<div class="new_or">
					или<br>
				</div>
				<div class="new_reg">
					<a href="exit.html">Зарегистрироваться</a> 
				</div>	
				</p>
			</div>	
				</form>
			<br>
		</div>
	<div class="new_str">	
<?php
		if (empty($_SESSION['login']) or empty($_SESSION['id'])){    
			echo "Вы вошли на сайт, как гость<br>";
		}
		else{  
			echo "Вы вошли на сайт, как ".$_SESSION['login']."<br>";
		}
?>
	</div>	
    </body>
</html>