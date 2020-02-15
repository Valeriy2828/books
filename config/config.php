<?php
$config = array(
	'title1' => 'Интернет-магазин книг',
	'title2' => 'YOUR BOOKS',
	'title3' => 'Перейти в каталог',
	'db' => array(
					'server' => 'localhost',
					'username' => 'root',
					'password' => '',
					'name' => 'books_shop'
					)
);
	
require "db.php";

function getTermination ($num){

    $number = substr($num, -2);
    if($number > 10 and $number < 15){    
        $term = "ов";
    }else{
		$number = substr($number, -1);
         
        if($number == 0) {$term = "ов";}
        if($number == 1 ) {$term = "";}
        if($number > 1 ) {$term = "а";}
        if($number > 4 ) {$term = "ов";}        
    }
     
    echo  $num.' просмотр'.$term;
}