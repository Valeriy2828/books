<?php
error_reporting( E_ERROR );
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
	$full = $_GET['id'];
	$art = mysqli_query($db, "SELECT * FROM `catalog` WHERE id= " . $full);
	
	if(mysqli_num_rows($art) <= 0){
?>	
		<div class="stop">
			<h2>Статья не найдена</h2>
		</div>
<?php		
	}
	
		$art_1 = mysqli_fetch_assoc($art);
		mysqli_query($db, "UPDATE `catalog` SET views = views + 1  WHERE id= " . $full);
?>
<div class="description_art">
<span>	
<div class="image_art" style="background-image: url(images/<?php echo $art_1['image2'] ?>);"></div>
							
	<div class="title_art">		
		<b><font color = #00008B><?php echo $art_1['title'] ?></font></b>
	</div>
	<div class="views">
		<?php
			$art_2 = $art_1['views'];			
		?>
		<a><kbd><font color =  #191970><?php echo getTermination($art_2)?></font></kbd></a>	
	</div>
	<div class="years_art">
		<p><b>Год:  </b><font color = #1E90FF><?php echo $art_1['pubyear'] ?></font></p>
	</div>
	<div class="director_art">
		<p><b>Автор:  </b><font color = #1E90FF><?php echo $art_1['author'] ?></font></p>
	</div>
	<div class="actor_art">
		<p><b>Жанр:  </b><font color = #1E90FF><?php echo $art_1['genre'] ?></font></p>
	</div>
	<div class="code1">
		<p><b>Код:  </b><font color = #1E90FF><?php echo $art_1["code"] ?></font></p>
	</div>
	<div class="text_art">
		<p><?php echo mb_substr($art_1['text'], 0 ,5500, 'utf-8')?></p>
	</div>
	<div class="price1">
			<p><b>Цена:  </b><font color = #1E90FF><?php echo $art_1["price"]?> грн</font></p>
		</div>
		<div class="bask1">
			<a href="add2basket.php?id=<?php echo $art_1["id"] ?>"></b> В корзину</a>                                                
		</div>
</span>	
<div class="block">
	<a href="#comment-add-form">Добавить свой</a>
	<h3>Комментарии</h3>
	
		<?php	
			$idn = (int)$art_1['id'];
			$comments = mysqli_query($db, "SELECT * FROM `comment` WHERE `articles_id` = '$idn' ORDER BY `id` DESC LIMIT 10");
			
			if(mysqli_num_rows($comments) <= 0){
		?>	
			<div class="no_info">
				<?php echo "Нет комментариев"; ?>
			</div>		
		<?php			
				}			
			while($comment = mysqli_fetch_assoc($comments)){
		?>	
			<div class="articles_info">
				<i class="fa fa-user-circle" aria-hidden="true"></i>
				<?php echo $comment['user']; ?>
			</div>
			<div class="articles_preview">
				<p><?php echo $comment['text']; ?></p>
			</div>			
		
		<?php		
			}
		?>		
</div>
<?php							
if($_SESSION && $_SESSION['login']){									
?>	
<div id="comment-add-form" class="block1">	
	<h3>Добавить комментарий</h3>
		<div class="block_content">
			<form class="form" method="POST" action="article.php?id=<?php echo $art_1['id']; ?>#comment-add-form">
				<?php
					if(isset($_POST['do_post'])){
						$errors = array();						
							if($_POST['text'] == ""){
								$errors[] = "Введите текст комментария!";
							}
							if(empty($errors)){
								//Добавить комментарий
								$c = $_SESSION['login'];
								$textarea = $_POST['text'];
								$art_id = $art_1['id'];
									mysqli_query($db, "INSERT INTO `comment`(
																			`user`,`text`,`pubdate`,`articles_id`)
																			VALUES('$c','$textarea', NOW() ,'$art_id')");
									
									echo '<span style="color :green;font-weight: bold; margin-bottom: 10px; margin-left: 130px; display: block;">Комментарий успешно добавлен!!!</span>';
									 header("Location: article.php");
							}else{
								//Вывести ошибку
								echo '<span style="color :red;font-weight: bold; margin-bottom: 10px; margin-left: 130px; display: block;">'.$errors['0'].'</span>';
							}
					}
				?>								
				<div class="form_group">
					<textarea class="form_control" name="text" placeholder="Текст комментария..." ><?php echo $_POST['text']; ?></textarea>
				</div>
				<div class="form_group2">
					<input type="submit" name="do_post" value="Добавить комментарий" class="form_control">																	
				</div>																	
			</form>
		</div>
</div>
<?php
}else{
?>
			<div class="error_registr">	
				<p id="comment-add-form"><?php echo "<p>Незарегистрированные пользователи не могут оставлять комментарии!!!!"; ?></p>
			</div>
<?php			
			}
?>	
</div>



