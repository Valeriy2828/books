<?php

session_start();

require ("includes/header.php");
?>

<head>
	<title>Поступившие заказы</title>
</head>
<body>
<div class="third_line">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<h3 align="center" ><a href="catalog1.php" ><?php echo $config['title3']?></a></h3>						
			</div>
		</div>
	</div>
</div>
<div class="go_in">
	<h2 align="center">Поступившие заказы:</h2>
</div>	
<?php
$order_file = "order/orders.log";

	if(!file_exists($order_file))
		false;
	$all = array();
		$orders = file($order_file);
			foreach($orders as $order){
				list($n, $e, $p, $a, $c, $dt) = explode("|", $order);
					$info = array();
						$info["name"] = $n;
						$info["email"] = $e;
						$info["phone"] = $p;
						$info["address"] = $a;
						$info["dt"] = $dt*1;
					$result = mysqli_query($db, "SELECT * FROM orders WHERE customer='$c' AND datetime=".$info["dt"]);
				$arr = array();
					while($row = mysqli_fetch_assoc($result)){
				$arr[] = $row;
					}
					$info["goods"] = $arr;
				$all[] = $info;
			}
if(is_array($all)){			
foreach ($all as $order1) {
?>
	<hr>
<div class="tablica">	
	<p><b>Заказчик</b>: <font color = #0000CD><?php echo $order1["name"] ?>></font></p>
	<p><b>Email</b>: <font color = #0000CD><?php echo $order1["email"] ?></font></p>
	<p><b>Телефон</b>: <font color = #0000CD><?php echo $order1["phone"] ?></font></p>
	<p><b>Адрес доставки</b>: <font color = #0000CD><?php echo $order1["address"] ?></font></p>
	<p><b>Дата размещения заказа</b>: <font color = #0000CD><?=date("d.m.y H:i:s", $order1["dt"]) ?></font></p>
	<h3>Купленные товары:</h3>
	<table border="1" cellpadding="5" cellspacing="0" width="90%">
	<tr>
		<th>N п/п</th>
		<th>Автор</th>
		<th>Название</th>
		<th>Год издания</th>
		<th>Цена, руб.</th>
		<th>Количество</th>
	</tr>
<?php
	$i = 0;
	$sum = 0;
	foreach($order1["goods"] as $row1){
	
?>
	<tr>
		<td align="center"><font color = #0000CD><?php echo ++$i ?></font></td>
		<td align="center"><font color = #0000CD><?php echo $row1["author"] ?></font></td>
		<td align="center"><font color = #0000CD><?php echo $row1["title"] ?></font></td>
		<td align="center"><font color = #0000CD><?php echo $row1["pubyear"] ?></font></td>
		<td align="center"><font color = #0000CD><?php echo $row1["price"] ?></font></td>
		<td align="center"><font color = #0000CD><?php echo $row1["quantity"] ?></font></td>
	</tr>
<?php
	$i++;
	$sum += $row1["price"] * $row1["quantity"];
	}
?>
	</table>
</div>
<div class="all_sum">	
	<p align="right"><font color = #191970>Всего товаров в корзине на сумму: <?php echo $sum ?> грн.</font>	
</div>	
<?php
		}
	}
?>
</body>
</html>