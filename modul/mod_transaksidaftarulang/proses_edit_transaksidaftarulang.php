<?php

if(isset($_POST['edit']))
{
	$No_pendaftaran 	= $_POST['No_pendaftaran'];
	$No_induk 			= $_POST['No_induk'];
	$Thn_ajaran 		= $_POST['Thn_ajaran'];
   	$Nm_lengkap 		= $_POST['Nm_lengkap'];	
	$Jenkel 			= $_POST['Jenkel'];
	$Tmpt_lhr 			= $_POST['Tmpt_lhr'];
    $Tgl_lhr 			= $_POST['Tgl_lhr'];
	$Alamat_siswa 		= $_POST['Alamat_siswa'];
	$Nm_ayah 			= $_POST['Nm_ortu'];
	$Nm_ibu 			= $_POST['Nm_ibu'];
	$Alamat_ortu 		= $_POST['Alamat_ortu'];
	$Pekerjaan_ortu 	= $_POST['Pekerjaan_ortu'];
	$Nm_wali 			= $_POST['Nm_wali'];
	$Alamat_wali 		= $_POST['Alamat_wali'];
	$Pekerjaan_wali 	= $_POST['Pekerjaan_wali'];


	if (empty($Nm_lengkap) || empty($Jenkel) || empty($Tmpt_lhr) || empty($Alamat_siswa) )
  		{
	  				echo "<script language=\"JavaScript\">alert('Isikan Data secara lengkap Tanda *');</script>";
   	  				echo "<script language='javascript'> document.location='index.php?module=edit_pendaftaran&No_induk=$No_induk'</script>";	  
   			}else{
						$lastUpdateDate = date('Y-m-d H:i:s');
						$sql="UPDATE pendaftaran SET Nm_lengkap='$Nm_lengkap', Jenkel='$Jenkel', Tmpt_lhr='$Tmpt_lhr', Tgl_lhr='$Tgl_lhr', Alamat_siswa='$Alamat_siswa', Nm_ayah='$Nm_ayah', Nm_ibu='$Nm_ibu', Alamat_ortu='$Alamat_ortu', Pekerjaan_ortu='$Pekerjaan_ortu', Nm_wali='$Nm_wali', Alamat_wali='$Alamat_wali', Pekerjaan_wali='$Pekerjaan_wali' WHERE pendaftaran.No_induk='$No_induk'";
							mysql_query($sql) or die(mysql_error());
							{
							echo "<script language=\"JavaScript\">alert('Siswa $Nm_lengkap berhasil Diubah dan Disimpan');</script>";
							echo "<script language='javascript'> document.location='index.php?module=pendaftaran'</script>";
							}
			}
}
?>