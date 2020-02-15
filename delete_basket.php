<?php
session_start();

require ("config/config.php");

$id = $_GET["id"];

	$del = mysqli_query($db, "DELETE FROM basket WHERE id = $id");

header("Location: basket.php");