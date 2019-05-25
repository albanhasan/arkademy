<?php

function gantikata($kata,$huruf,$replace){
	$hasil = strtr($kata,$huruf,$replace);
	echo $hasil;
}

gantikata('purwakarta','a','o');
?>