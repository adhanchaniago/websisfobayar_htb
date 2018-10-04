<?php
if(isset($_POST['save']))
{   
 	$No_pendaftaran = addslashes($_POST['No_pendaftaran']);
	$No_induk = addslashes($_POST['No_induk']);
	$Thn_ajaran = addslashes($_POST['Thn_ajaran']);
   	$Nm_lengkap = addslashes($_POST['Nm_lengkap']);	
	$Jenkel = addslashes($_POST['Jenkel']);
	$Tmpt_lhr = addslashes($_POST['Tmpt_lhr']);
    $Tgl_lhr = addslashes($_POST['Tgl_lhr']);
	$Alamat_siswa = addslashes($_POST['Alamat_siswa']);
	$Nm_ayah = addslashes($_POST['Nm_ortu']);
	$Nm_ibu = addslashes($_POST['Nm_ibu']);
	$Alamat_ortu = addslashes($_POST['Alamat_ortu']);
	$Pekerjaan_ortu = addslashes($_POST['Pekerjaan_ortu']);
	$Nm_wali = addslashes($_POST['Nm_wali']);
	$Alamat_wali = addslashes($_POST['Alamat_wali']);
	$Pekerjaan_wali = addslashes($_POST['Pekerjaan_wali']);
    if (empty($No_pendaftaran))
  		{
	  				echo "<script language=\"JavaScript\">alert('Pilih Nomor Pendaftaran baru isi Form');</script>";
   	  				echo "<script language='javascript'> document.location='index.php?module=entry_pendaftaran'</script>";	  
				}elseif (empty($No_induk)){
					echo "<script language=\"JavaScript\">alert('Masukkan Nomor Induk');</script>";
					echo "<script language='javascript'> document.location='index.php?module=entry_pendaftaran'</script>";	  
				}
				else{
					$sql = "SELECT No_induk FROM pendaftaran WHERE No_induk='$No_induk' ";
					$hasil = mysql_query($sql);
					$row = mysql_fetch_row($hasil);
					$sql2 = "SELECT No_pendaftaran FROM pendaftaran WHERE No_pendaftaran='$No_pendaftaran' ";
					$hasil2 = mysql_query($sql2);
					$row2 = mysql_fetch_row($hasil2);
						if (!empty($row[0])) 
								{
									echo "<script language=\"JavaScript\">alert('Nomor Induk $row[0] sudah ada');</script>";
   	  								echo "<script language='javascript'> document.location='index.php?module=entry_pendaftaran'</script>";
								}
						elseif (!empty($row2[0])) 
								{
									echo "<script language=\"JavaScript\">alert('Nomor Pendaftar $row2[0] sudah pernah disimpan');</script>";
   	  								echo "<script language='javascript'> document.location='index.php?module=entry_pendaftaran'</script>";
								}
						else{		
								$sql="INSERT INTO pendaftaran(	No_induk,	
																No_pendaftaran,
																Thn_ajaran,
																Nm_lengkap,
																Jenkel,
																Tmpt_lhr,
																Tgl_lhr,
																Alamat_siswa,
																Nm_ayah,
																Nm_ibu,
																Alamat_ortu,
																Pekerjaan_ortu,
																Nm_wali,
																Alamat_wali,
																Pekerjaan_wali)						
									  VALUES('$No_induk','$No_pendaftaran','$Thn_ajaran','$Nm_lengkap','$Jenkel','$Tmpt_lhr','$Tgl_lhr','$Alamat_siswa','$Nm_ayah','$Nm_ibu','$Alamat_ortu','$Pekerjaan_ortu','$Nm_wali','$Alamat_wali','$Pekerjaan_wali') ";
								$perintah=mysql_query($sql) or die(mysql_error());
										{
											echo "<script language='javascript'> document.location='index.php?module=pendaftaran'</script>";
										}
							}
					}
			}
	
?>