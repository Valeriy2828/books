<?php
	session_start();
	
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
<?php	
	if($count == 0){
?>	
	
		<div class="back">
			<?php echo "<p><font color = #191970>Ваша корзина пуста!!!Перейдите пожалуйста в <a href=\"catalog1.php\">КАТАЛОГ</a></font></p>"?>
		</div>
<?php		
	}else{
?>
	<div class="fon">
		<div class="tablica">
			<table border="1" cellpadding="5" cellspacing="0">
				<tr>
					<th>N п/п</th>
					<th>Автор</th>
					<th>Название</th>
					<th>Год издания</th>
					<th>Цена, грн.</th>
					<th>Количество</th>
					<th>Обложка</th>
					<th>Удаление</th>
				</tr>
<?php
			$result = mysqli_query($db ,"SELECT * FROM catalog, basket WHERE customer='".session_id()."' and catalog.id = basket.goodsid");
				$i = 0;
				$sum = 0;
				while ($bag = mysqli_fetch_assoc($result)){
					$sum += $bag["price"] * $bag["quantity"];
?>					
					<tr>
						<td align="center"><font color = #0000CD><?php echo ++$i?></font></td>
						<td align="center"><font color = #0000CD><?php echo $bag["author"]?></font></td>
						<td align="center"><font color = #0000CD><?php echo $bag["title"]?></font></td>
						<td align="center"><font color = #0000CD><?php echo $bag["pubyear"]?></font></td>
						<td align="center"><font color = #0000CD><?php echo $bag["price"]?></font></td>
						<td align="center"><font color = #0000CD><?php echo $bag["quantity"]?></font></td>
						<td align="center"><img src="images/<?php echo $bag["image"] ?>"width="70" height="30" ></td>
						<div class="dele">
							<td align="center"><a href="delete_basket.php?id=<?php echo $bag["id"]?>">Удалить</a></td>
						</div>
					</tr>
<?php					
				}
?>				
			</table>
			<div class="grn">
				<p><font color = #191970>Всего товаров на сумму
								<?php echo $sum?>
								 грн.</font>
			</div>
			<div class="zakaz">
				<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'">
			</div>
		</div>
	</div>	
<?php
}
