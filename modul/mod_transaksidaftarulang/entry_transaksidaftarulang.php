<?php
$sql="SELECT No_induk FROM pendaftaran ORDER BY No_induk DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],-3);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "S000".$autoNum;
	elseif($autoNum<100)
	$autoNum = "S00".$autoNum;
	elseif($autoNum<1000)
	$autoNum = "S0".$autoNum;
	$finalAutoNum = $autoNum;
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
	<div><?php include 'proses_transaksidaftarulang.php';?></div>
</div>	
<form name="formDT" method="post" id="formDT" action="">
<fieldset id="fil">
<h2><span>Entry pendaftaran</span></h2>
	<table border="1">
		<tr>
			<td><img src="images/Header2.png" align="center" width="800px"></img></td>
		</tr>
		<tr class="alts" >
			<th scope="col" colspan="9">Nomor Pendaftaran &nbsp; &nbsp; : &nbsp; <input name="No_pendaftaran" id="No_pendaftaran" type="text" size="8"
			value="<?php echo isset($_POST['No_pendaftaran']) ? $_POST['No_pendaftaran'] : '';?>" readonly="true">&nbsp;<input type="button"
			value="Pilih Nomor Pendaftaran" onClick="openWindow();"/>
		</tr>
	</table>
	<table id="tabel" width="200" cellspacing="0">
		<tr class="alt">
			<td>Nomor Induk</td>
			<td>:</td>
			<td><input type="text" name="No_induk" id="No_induk" value="<?php echo "$finalAutoNum" ?>" size="30" maxlength="6" title="Harap Di isi!" readonly="true"/></td>
		</tr>
		<tr class="alt">
			<td>Tahun Ajaran</td>
			<td>:</td>
			<td><input name="Thn_ajaran" id="Thn_ajaran" size="25" value="<?php echo isset($_POST['Thn_ajaran']) ? $_POST['Thn_ajaran']:'';?>" readonly="true"></td>
		</tr>
		<tr class="alt">
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type='text' name='Nm_lengkap' size='50' maxlength='100' value="<?php echo isset($_POST['Nm_lengkap']) ? $_POST['Nm_lengkap'] : '';?>" readonly="true"></td>
		</tr>
		<tr class="alt">
			<td>Nama Kelas</td>
			<td>:</td>
			<td><input name="Nm_kelas" id="Nm_kelas" type="text" size="25" value="<?php echo isset($_POST['Nm_kelas']) ? $_POST['Nm_kelas']:'';?>" readonly="true"></th>
		</tr>
		<tr class="alt">
			<td> Jenis Kelamin </td>
			<td>:</td>
			<td><input type="text" name="Jenkel" id="Jenkel" size="8" maxlength="10" title="Harap Di isi!" value="<?php echo isset($_POST['Jenkel']) ? $_POST['Jenkel'] : '';?>" readonly="true"/></td>
		</tr> 
		<tr class="alt">
			<td>Tempat/Tanggal Lahir</td>
			<td><strong>:</strong></td>
			<td>
				<input type="text" name="Tmpt_lhr" maxlength="20" size="20" title="Harap Di isi!" value="<?php echo isset($_POST['Tmpt_lhr']) ? $_POST['Tmpt_lhr'] : '';?>">&nbsp;/&nbsp;<input type="text" name="Tgl_lhr" id="Tgl_lhr" size="7" maxlength="10" title="Harap Di isi!" value="<?php echo isset($_POST['Tgl_lhr']) ? $_POST['Tgl_lhr'] : '';?>"/>
			</td>
		</tr>
		<tr class="alt">
			<td> Alamat Siswa </td>
			<td>:</td>
			<td><textarea name='Alamat_siswa' cols='50' rows='5' title="Harap Di isi!"><?php echo isset($_POST['Alamat_siswa']) ? $_POST['Alamat_siswa'] : '';?></textarea></td>
		</tr> 
		<tr class="alt" >
			<th scope="col" colspan="9"><b>Nama Orang Tua</b></th>
		</tr>
		<tr class="alt">
			<td> a. Ayah </td>
            <td>:</td>
            <td><input type='text' name='Nm_ortu' size='40' value="<?php echo isset($_POST['Nm_ortu']) ? $_POST['Nm_ortu'] : '';?>"></td>
		</tr>
		<tr class="alt">
			<td> b. Ibu </td>
            <td>:</td>
            <td><input type='text' name='Nm_ibu' size='40'></td>
        </tr>
		<tr class="alt">
            <td> Alamat Orang Tua </td>
            <td>:</td>
            <td><textarea name='Alamat_ortu' cols='50' rows='5' valign='top'></textarea></td>
        </tr>
		<tr class="alt">
            <td> Pekerjaan Orang tua </td>
            <td>:</td>
            <td><input type='text' name='Pekerjaan_ortu' size='30'></td>
        </tr>
		<tr class="alt">
            <td> Nama Wali </td>
            <td>:</td>
            <td><input type='text' name='Nm_wali' size='40' value="<?php echo isset($_POST['Nm_wali']) ? $_POST['Nm_wali'] : '';?>"></td>
        </tr>
		<tr class="alt">
            <td valign='top'> Alamat Wali </td>
            <td>:</td>
            <td><textarea name='Alamat_wali' cols='50' rows='5'></textarea></td>
        </tr>
		<tr class="alt">
            <td> Pekerjaan Wali </td>
            <td>:</td>
            <td><input type='text' name='Pekerjaan_wali' size='30'></td>
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