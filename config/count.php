<?php

$count = 0;

$sql = mysqli_query($db , "SELECT count(*) FROM basket WHERE customer ='".session_id()."'");
$res = mysqli_fetch_row($sql);
$count = $res[0];
