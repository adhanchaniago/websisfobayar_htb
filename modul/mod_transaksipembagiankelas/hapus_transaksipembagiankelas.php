<?php
   	$No_pembagiankelas = $_GET['No_pembagiankelas']; 
	$query = mysql_query("delete from pembagian_kelas where No_pembagiankelas='$No_pembagiankelas'") or die(mysql_error());
	echo "<script language='javascript'> document.location='?module=transaksipembagiankelas'</script>";
?>