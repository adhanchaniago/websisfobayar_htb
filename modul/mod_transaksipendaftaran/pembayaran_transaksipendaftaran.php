<?php
if(isset($_POST['save'])){   
$No_pembayaran = $_POST['No_pembayaran'];
$No_pendaftaran = $_POST['No_pendaftaran'];
$Nm_calonsiswa = $_POST['Nm_calonsiswa'];
$Nm_kelas = $_POST['Nm_kelas'];
$Kd_biaya = $_POST['Kd_biaya'];
$Tgl_bayar	= $_POST['Tgl_bayar'];
if (empty($No_pembayaran) || empty($No_pendaftaran) || empty($Nm_calonsiswa) || empty($Nm_kelas) || empty($Kd_biaya) || empty($Tgl_bayar)){
echo "<script language=\"JavaScript\">alert('Masukkan No Pembayaran dan Pilih No Daftar !');</script>";
echo "<script language='javascript'> document.location='index.php?module=entry_transaksipembayaran.php'</script>";	  
}else if (empty($No_pembayaran)){
echo "<script language=\"JavaScript\">alert('Maaf ! Kode pembayaran belum ada');</script>";
echo "<script language='javascript'> document.location='index.php?module=entry_transaksipembayaran.php'</script>";	  
}else{
$No_pembayaran=$_POST['No_pembayaran'][$i];
$Kd_biaya=$_POST['Kd_biaya'][$i];
$sql="INSERT INTO pembayaran (No_pembayaran,
No_pendaftaran,
Nm_calonsiswa,
Nm_kelas,
Kd_biaya,
Tgl_bayar)							
VALUES('$No_pembayaran','$No_pendaftaran','$Nm_calonsiswa','$Nm_kelas','$Kd_biaya','$Tgl_bayar') ";
$perintah=mysql_query($sql4) or die(mysql_error());
}{
echo "<script language=\"JavaScript\">alert('Transaksi Pembayaran dengan No Pembayaran = $No_pembayaran berhasil ditambahkan / disimpan');</script>";
echo "<script language='javascript'> document.location='index.php?module=pembayaran'</script>";}}
?>