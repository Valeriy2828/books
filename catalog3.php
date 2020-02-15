<?php
	session_start();
	
	require ("includes/header.php");
	//require ("config/count.php");
		     
?>
<div class="full_image" ><img src="images/luxfon.com_11313.jpg" alt="sky">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="rectangle">
					<div class="goods">
						<p>Товаров в <a href="basket.php">корзине </a>:  <b><font color = #0000CD><?=$count?></font></b></p>        
					</div>	
					<?php
						$book = mysqli_query($db, "SELECT * FROM `catalog` WHERE id > 10 and id < 16");
							while($book_3 = mysqli_fetch_assoc($book)){
					?>	
					<div class="image" style="background-image: url(images/<?php echo $book_3["image"] ?>);"></div>
					<div class="description">
						<div class="title">		
							<a href="article.php?id=<?php echo $book_3["id"] ?>"><b><font color = #00008B><?php echo $book_3["title"] ?></font></b></a>
						</div>
						<div class="code">
							<p><b>Код:  </b><font color = #00008B><?php echo $book_3["code"] ?></font></p>
						</div>
						<div class="years">
							<p><b>Год:  </b><font color = #00008B><?php echo $book_3["pubyear"] ?> г</font></p>
						</div>
						<div class="author">
							<p><b>Автор:  </b><font color = #00008B><?php echo $book_3["author"] ?></font></p>
						</div>
						<div class="genre">
							<p><b>Жанр:  </b><font color = #00008B><?php echo $book_3["genre"]?></font></p>
						</div>						
						<div class="text1">
							<p><?php echo mb_substr($book_3["text"], 0 ,600, 'utf-8') ?></p>
						</div>
						<div class="price">
							<p><b>Цена:  </b><font color = #00008B><?php echo $book_3["price"]?> грн</font></p>
						</div>
					</div>
						<div class="to_basket">
							<a href="add2basket.php?id=<?php echo $book_3["id"] ?>"> В корзину</a>                                                
						</div>	
					<?php
						}
					?>
					<div class="page">
						<ul>
							<li><a href="catalog1.php">1</a></li> 
							<li><a href="catalog1.php">2</a></li>
							<li>3</li>
						</ul>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
		
<?php
	require ("includes/footer.php");
?>
