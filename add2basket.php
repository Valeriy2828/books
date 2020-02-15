<?php
session_start();

require ("config/config.php");
require ("config/count.php");

$customer = session_id();

$goodsid = (int)$_GET['id'];

$quantity = 1;

$datetime = time();
	
$sql = mysqli_query($db, "INSERT INTO `basket`(customer,goodsid,quantity,datetime) 
							VALUES('$customer',
									$goodsid,
									$quantity,
									$datetime)");


header("Location: catalog1.php");