<?php
$total = 0;
$sql="SELECT No_pembayaran FROM pembayaran ORDER BY No_pembayaran DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],-4);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "KP000".$autoNum;
	elseif($autoNum<100)
	$autoNum = "KP00".$autoNum;
	elseif($autoNum<1000)
	$autoNum = "KP0".$autoNum;
	$finalAutoNum = $autoNum;
?>
<html>
<head>
<title>Transaksi Pembayaran</title>
<link rel="stylesheet" href="css/table.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
<link rel="stylesheet" href="css/calendar.css" type="text/css">
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript" src="js/calendar2.js"></script>
	<style type="text/css">
    input.error, select.error { border: 1px solid red; }
    label.error { color:red; margin-left: 10px; }
    </style>
</head>
<body>
<div>
<div><?php include 'pembayaran_transaksipendaftaran.php';?></div>
</div>
<?php $query2=mysql_query("Select * FROM kode_formulir;")
or die("Query failed with error: ".mysql_error());
$row2=mysql_fetch_array($query2);?>
<form name="formDT" method="post" id="formDT" action="">
<fieldset id="fil">
<h2><span>Entry Pembayaran</span></h2>
<table id="tabel" width="600" cellspacing="0">
<tr class="alt" >
    <th scope="col" colspan="9">No Pembayaran : <input type="text" name="No_pembayaran" value="<?php echo "$finalAutoNum" ?>" size="6" maxlength="6" title="Harap Di isi!" readonly="true"/></th>
</tr>
<tr class="alt">
   <td width="220">No Pendaftaran</td>
   <td width="220">Nama Siswa</td>
   <td width="200">Kelas</td>
   <td width="200">Kode Biaya</td>
   <td width="200">Tanggal Bayar</td>   
</tr>
<tr class="alt">
	<td><select name='No_pendaftaran'>
					<option value='0'>- Pilih No. Pendaftaran -</option>
						<?php $sql = mysql_query("SELECT No_pendaftaran FROM pembayaran");
						while ($data = mysql_fetch_array($sql)){
						echo "<option value=".$data['No_pendaftaran'].">".$data['No_pendaftaran']."</option>";}?>
					</select></td>
	<td><select name='Nm_calonsiswa'>
					<option value='0'>- Pilih Nama Siswa -</option>
						<?php $sql = mysql_query("SELECT Nm_calonsiswa FROM calon_siswa");
						while ($data = mysql_fetch_array($sql)){
						echo "<option value=".$data['Nm_calonsiswa'].">".$data['Nm_calonsiswa']."</option>";}?>
					</select></td>
	<td><select name='Nm_kelas'>
					<option value='0'>- Pilih Kelas -</option>
						<?php $sql = mysql_query("SELECT Nm_kelas FROM pembagian_kelas");
						while ($data = mysql_fetch_array($sql)){
						echo "<option value=".$data['Nm_kelas'].">".$data['Nm_kelas']."</option>";}?>
					</select></td>
	<td width="200"><input name="Kd_biaya" id="Kd_biaya" type="date" size="15" value="<?php echo $row2['Kd_biaya'];?>" disabled="disabled"/></td>
	<td width="200"><input name="Tgl_bayar" id="Tgl_bayar" type="date" size="15" value=""/>&nbsp;<a href="JavaScript:;" onClick="return showCalendar('Tgl_bayar', 'dd-mm-y');"><img src="images/Icon_Calendar.gif" width="16" height="15"></a></td>
</tr> 
      <th colspan="6"><div align="center"><input type="submit" name="isi" id="isi" value="Cek Pembayaran"></div></th>
</table>
</br>
</fieldset>
<?php
	if(isset($_POST['isi'])){
		 $Kd_biaya				= $_POST['Kd_biaya'];
		 $Nm_biaya				= $_POST['Nm_biaya'];
		 $Biaya					= $_POST['Biaya'];
	     $query					= "SELECT * FROM kode_formulir";
		 $sql					= mysql_query($query);
 ?>
<fieldset id="fil">
<h2><span>Cek Pembayaran</span></h2>
	<table id="tableData" cellspacing="0">
	<tr class="alts">
	  <th width="25" scope="col">No</th>
	  <th width="102" >Kode Bayar</th>
	  <th width="200" >Nama Bayar </th>
	  <th width="200" >Nominal </th>
	</tr>
	<?php	
		$i=1;
		while ($hasil = mysql_fetch_array($sql)){
				$nominal=$hasil['Biaya'];
				$total=$nominal+$total;
	?> 
  <tr class="<?php=(++$no%2) ? "tr1" : "tr2" ?>">
	<td><?php echo $i;?></td>
		<td align="center" class="alt"><?php echo $hasil['Kd_biaya'];?> <input type="hidden" name="Kd_bayar[]" value="<?php echo $hasil['Kd_bayar'];?>"/></td>
		<td align="center" class="alt"><?php echo $hasil['Nm_biaya'];?></td>
		<td align="center" class="alt"><?php echo $hasil['Biaya'];?> <input type="hidden" name="Nominal[]" value="<?php echo $hasil['Biaya'];?>"/></td>
		</tr>
		<?php $i++; } ?>
<?php {  ?> 	  		
  <?php }  ?>
<th colspan="4" class="alt">
          <div align="right"> Total : <input type="text" name="Total" size="28" maxlength="15" value="<?php echo " Rp ".$total; ?>"/></div> &nbsp; <div align="center"><input  type="submit" name="save" value="Simpan"/> &nbsp; <input type="reset" value="Batal" name="reset"></a> &nbsp; <a href="master.php?module=pembayaran" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" title="Back"/></a></div>
        </th>
  <?php } ?>
  </table>
</fieldset>
</form>
</body>
</html>