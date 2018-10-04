<?php
$sql="SELECT No_pembagiankelas FROM pembagian_kelas ORDER BY No_pembagiankelas DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],3);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "PK-".$autoNum;
	elseif($autoNum<100)
	$autoNum = "PK-1".$autoNum;
	elseif($autoNum<1000)
	$autoNum = "PK-11".$autoNum;
	$finalAutoNum = $autoNum;
$sql3="SELECT No_induk FROM pembagian_kelas ORDER BY No_induk DESC LIMIT 0,1";
	$hasil3=mysql_query($sql3);
	$dataNum3 = mysql_fetch_array($hasil3);
	$idNum3 = substr($dataNum3[0],-3);
	$autoNum3 = $idNum3+1;
if($autoNum3<10)
	$autoNum3 = "S000".$autoNum3;
	elseif($autoNum3<100)
	$autoNum3 = "S00".$autoNum3;
	elseif($autoNum3<1000)
	$autoNum3 = "S0".$autoNum3;
	$finalAutoNum3 = $autoNum3;
?>
<?php
$query=mysql_query("Select Nm_lengkap FROM pendaftaran;")
or die("Query failed with error: ".mysql_error());
$row=mysql_fetch_array($query);
?>
<html>
<head>
<link rel="stylesheet" href="css/table.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<link rel="stylesheet" href="css/calendar.css" type="text/css">
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar2.js"></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
<style>
.tulisan:link,.tulisan:visited
{ color:black; text-decoration:none;}
.tulisan:hover,.tulisan:active{
color:blue;}
</style>
<script language='JavaScript'>
function angka(e){
	var el=e.target;
	if(el.value.toString().match(/^[0-9]+$/)==null){
		el.value=el.value.substring(0,el.value.length-1);
	}
}
function openWindow() {
		sUrl="popup_pendaftaran.php";
		features = 'toolbar=yes, left=350,top=100, ' + 'directories=no, status=no, menubar=no, ' + 'scrollbars=yes, resizable=no, width=570, height=450';
		window.open(sUrl,"winChild",features);
};
</script>
</head>
<body>
<div>
	<div><?php include 'proses_transaksipembagiankelas.php';?></div>
</div>	
<form name="formDT" method="post" id="formDT" action="">
<fieldset id="fil">
<h2><span>Entry pendaftaran</span></h2>
	<table border="1">
		<tr>
			<td><img src="images/Header2.png" align="center" width="800px"></img></td>
		</tr>
		<tr class="alts" >
			<th scope="col" colspan="9">Nomor Pembagian Kelas &nbsp; &nbsp; : &nbsp; <input name="No_pembagiankelas" id="No_pembagiankelas" type="text" size="8"
			value="<?php echo $finalAutoNum?>" readonly="true">
		</tr>
	</table>
	<table id="tabel" width="200" cellspacing="0">
		<tr class="alt">
			<td>Tahun Ajaran</td>
			<td>:</td>
			<td><select name='Thn_ajaran'>
					<option value='0'>- Pilih Tahun Ajaran Siswa -</option>
						<?php $sql = mysql_query("SELECT Thn_ajaran FROM calon_siswa");
						while ($data = mysql_fetch_array($sql)){
						echo "<option value=".$data['Thn_ajaran'].">".$data['Thn_ajaran']."</option>";}?>
					</select></td>
		</tr>
		<tr class="alt">
			<td>Nama Siswa</td>
			<td>:</td>
			<td><input type="text" name="No_induk" id="No_induk" value="<?php echo $row['Nm_lengkap'];?>" size="30" maxlength="6" title="Harap Di isi!" readonly="true"/></td>
		</tr>
		<tr class="alt">
			<td>Nomor Induk</td>
			<td>:</td>
			<td><input type="text" name="No_induk" id="No_induk" value="<?php echo "$finalAutoNum3"?>" size="30" maxlength="6" title="Harap Di isi!" readonly="true"/></td>
		<tr class="alt">
			<td>Kode Kelas</td>
			<td>:</td>
			<td><select name='Kd_kelas'>
					<option value='0'>- Pilih Kode Kelas Siswa -</option>
						<?php $sql = mysql_query("SELECT Kd_kelas FROM kelas");
						while ($data = mysql_fetch_array($sql)){
						echo "<option value=".$data['Kd_kelas'].">".$data['Kd_kelas']."</option>";}?>
					</select></td>
		</tr>
		<tr class="alt">
			<td colspan=3>*) Isikan secara lengkap </td>
		</tr>
		<th colspan="4" class="alt">
        <div align="center"><input type="submit" name="save" value="Simpan"/>&nbsp;<input type="reset" value="Reset" name="reset"></a>&nbsp;<a onClick='history.go(-1)'><input type="reset" value="Batal" name="reset">&nbsp;<a href="index.php?module=masterdata_transaksipendaftaran" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" title="Back"/></a></div>
        </th>
</table>
</fieldset>
</form>
</body>
</html>