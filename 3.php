<?php

function count_vowels($kata){
	$a = substr_count($kata, 'a'); 
	$i = substr_count($kata, 'i'); 
	$u = substr_count($kata, 'u'); 
	$e = substr_count($kata, 'e'); 
	$o = substr_count($kata, 'o'); 

	$vokal = $a+$i+$u+$e+$o;
	echo 'Kata : '.$kata.'<br> total huruf vokal: '.$vokal; 
}

count_vowels('programmer');
?>