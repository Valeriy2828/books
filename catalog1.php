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
						$book = mysqli_query($db, "SELECT * FROM `catalog` WHERE id < 6");					
							while($book_1 = mysqli_fetch_assoc($book)){
					?>	
					<div class="image" style="background-image: url(images/<?php echo $book_1["image"] ?>);"></div>
					<div class="description">
						<div class="title">		
							<a href="article.php?id=<?php echo $book_1["id"] ?>"><b><font color = #00008B><?php echo $book_1["title"] ?></font></b></a>
						</div>
						<div class="code">
							<p><b>Код:  </b><font color = #00008B><?php echo $book_1["code"] ?></font></p>
						</div>
						<div class="years">
							<p><b>Год:  </b><font color = #00008B><?php echo $book_1["pubyear"] ?> г</font></p>
						</div>
						<div class="author">
							<p><b>Автор:  </b><font color = #00008B><?php echo $book_1["author"] ?></font></p>
						</div>
						<div class="genre">
							<p><b>Жанр:  </b><font color = #00008B><?php echo $book_1["genre"]?></font></p>
						</div>						
						<div class="text1">
							<p><?php echo mb_substr($book_1["text"], 0 ,600, 'utf-8') ?></p>
						</div>
						<div class="price">
							<p><b>Цена:  </b><font color = #00008B><?php echo $book_1["price"]?> грн</font></p>
						</div>
					</div>
						<div class="to_basket">
							<a href="add2basket.php?id=<?php echo $book_1["id"] ?>"> В корзину</a>                                                
						</div>	
					<?php
						}
					?>
					<div class="page">
						<ul>
							<li>1</li> 
							<li><a href="catalog2.php">2</a></li>
							<li><a href="catalog3.php">3</a></li>
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
