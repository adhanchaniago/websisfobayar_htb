<?php
if(isset($_POST['save']))
{   
 	$No_pembagiankelas = $_POST['No_pembagiankelas'];
	$Thn_ajaran = $_POST['Thn_ajaran'];
	$No_induk = $_POST['No_induk'];
	$Kd_kelas = $_POST['Kd_kelas'];
    if (empty($No_pembagiankelas))
  		{
	  				echo "<script language=\"JavaScript\">alert('Nomor pembagian kelas baru isi form error!');</script>";
   	  				echo "<script language='javascript'> document.location='index.php?module=entry_transaksipembagiankelas'</script>";	  
				}elseif (empty($No_induk)){
					echo "<script language=\"JavaScript\">alert('Masukkan Nomor Induk!');</script>";
					echo "<script language='javascript'> document.location='index.php?module=entry_transaksipembagiankelas'</script>";	  
				}
				else{
					$sql = "SELECT No_induk FROM pembagian_kelas WHERE No_induk='$No_induk' ";
					$hasil = mysql_query($sql);
					$row = mysql_fetch_row($hasil);
					$sql2 = "SELECT No_pembagiankelas FROM pembagian_kelas WHERE No_pembagiankelas='$No_pembagiankelas' ";
					$hasil2 = mysql_query($sql2);
					$row2 = mysql_fetch_row($hasil2);
						if (!empty($row[0])) 
								{
									echo "<script language=\"JavaScript\">alert('Nomor Induk $row[0] sudah ada!');</script>";
   	  								echo "<script language='javascript'> document.location='index.php?module=entry_transaksipembagiankelas'</script>";
								}
						elseif (!empty($row2[0])) 
								{
									echo "<script language=\"JavaScript\">alert('Nomor Pendaftar $row2[0] sudah pernah disimpan!');</script>";
   	  								echo "<script language='javascript'> document.location='index.php?module=entry_transaksipembagiankelas'</script>";
								}
						else{		
								$sql="INSERT INTO pembagian_kelas(No_pembagiankelas,
																Thn_ajaran,
																No_induk,
																Kd_kelas)
									  VALUES('$No_pembagiankelas','$Thn_ajaran','$No_induk','$Kd_kelas')";
								$perintah=mysql_query($sql) or die(mysql_error());
										{
											echo "<script language='javascript'> document.location='index.php?module=masterdata_transaksipembagiankelas'</script>";
										}
							}
					}
			}
	
?>