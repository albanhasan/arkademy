<?php
function betweendays($awal,$akhir){ 
$tgl_awal = strtotime($awal); // Convert date to a UNIX timestamp  

// Specify the end date. This date can be any English textual format  
$tgl_akhir = strtotime($akhir); // Convert date to a UNIX timestamp  

// Loop from the start date to end date and output all dates inbetween  
for ($i=$tgl_awal; $i<=$tgl_akhir; $i+=86400) {  
    echo date("Y-m-d", $i).', ';  
} 	
}

betweendays('2019-11-01','2019-11-05');
?>