<?php
   	$No_induk = $_GET['No_induk']; 
	$query = mysql_query("delete from pendaftaran where No_induk='$No_induk'") or die(mysql_error());
	echo "<script language='javascript'> document.location='?module=pendaftaran'</script>";
?>