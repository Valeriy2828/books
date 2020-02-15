<?php

session_start();
require ("includes/header.php");

	$name = strip_tags(addslashes(trim($_POST["name"])));
	$email = strip_tags(addslashes(trim($_POST["email"])));
	$phone = strip_tags(addslashes(trim($_POST["phone"])));
	$address = strip_tags(addslashes(trim($_POST["address"])));
	$customer = session_id();
	$datetime = time();
	
		$put = "$name|$email|$phone|$address|$customer|$datetime\n";
	
	$order_file = "order/orders.log";
	
		file_put_contents($order_file, $put, FILE_APPEND);
			
	$result = mysqli_query($db ,"SELECT * FROM catalog, basket WHERE customer='".session_id()."' and catalog.id = basket.goodsid");
		foreach($result as $goods){
			
			$sql = mysqli_query($db, "INSERT INTO orders(
														author,code,title,pubyear,price,
														customer,quantity,datetime)
												VALUES('{$goods["author"]}',
														{$goods["code"]},
														'{$goods["title"]}',
														{$goods["pubyear"]},	
														{$goods["price"]},
														'{$goods["customer"]}',
														'{$goods["quantity"]}',
														 $datetime
														)");
														 
														 
			$del_et = mysqli_query($db, "DELETE FROM basket WHERE customer = '".session_id()."'");											 
		}
?>		

<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<div class="take">
		<font color = #DC143C><h3 align="center">Ваш заказ принят!!!</h3></font>
	</div>
	<div class="cat">
		<p align="center"><a href="catalog1.php">Перейти в каталог товаров</a></p>
	</div>	
</body>
</html>		