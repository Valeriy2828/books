<?php
$db = mysqli_connect(
					$config['db']['server'],
					$config['db']['username'],
					$config['db']['password'],
					$config['db']['name']
									);
mysqli_query($db, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($db, "SET CHARACTER SET 'utf8'");
									
if($db == false){
	echo "<font color = red>Не удалось соединиться с базой данных!!!</font>"."<br>";
	echo '<font color = red>'.mysqli_connect_error().'</font>';
	exit();
}


