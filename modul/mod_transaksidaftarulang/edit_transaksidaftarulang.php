<html>
<head>
<title>Entry pendaftaran</title>
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

<script type="text/javascript">
function angka(e){
	var el=e.target;
	if(el.value.toString().match(/^[0-9]+$/)==null){
		el.value=el.value.substring(0,el.value.length-1);
	}
}
</script>

</head>
<body>

<?php
$No_induk = $_GET['No_induk'];
$hasil = mysql_query("SELECT * FROM kelas,siswa,pendaftaran WHERE kelas.Kd_kelas = siswa.Kd_kelas and siswa.No_pendaftaran = pendaftaran.No_pendaftaran AND pendaftaran.No_induk='$No_induk'");
$row = mysql_fetch_array($hasil);
list($thn,$bln,$tgl) = explode ("-",$row['Tgl_lhr']);
?>

<br><h2><span>Ubah pendaftaran</span></h2>
<div><? include 'proses_edit_pendaftaran.php'; ?></div>
<form method="POST" action="">
<input type="hidden" name="No_induk" value="<?php echo $No_induk; ?>">
	<div class="module-table-body" align="center">
		<table border="1">
			<tr>
				<td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src="images/head.png" align="center"></img></td>
			</tr>
			<tr class="alts" align="center">
				<th scope="col" colspan="9">
					<input name="No_pendaftaran" id="No_pendaftaran" type="hidden" size="5" value="<?php echo $row['No_pendaftaran'] ;?>">
					<input name="Thn_ajaran" id="Thn_ajaran" type="hidden" size="5" value="<?php echo $row['Thn_ajaran'] ;?>">
					Kelas : <input name="Nm_kelas" id="Nm_kelas" type="text" size="25" value="<?php echo $row['Nm_kelas'] ;?>" disabled="disabled">
				</th>
			</tr>
		</table>
		<table id="tabel" width="200" cellspacing="0">
                 <tr class="alt">
					<td>Nomor Induk</td>
					<td>:</td>
					<td><input type="text" name="No_induk" id="No_induk" value="<?php echo $row['No_induk'] ;?>" size="6" maxlength="6" title="Harap Di isi!" disabled="disabled"/> *)</td>
				</tr>
                 <tr class="alt">
					<td> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='Nm_lengkap' size='50' maxlength='100' value="<?php echo $row['Nm_lengkap'] ;?>"> *)</td>
				</tr>
				<tr class="alt">
                    <td> Jenis Kelamin </td>
                    <td>:</td>
                    <td><input type='radio' name='Jenkel' value="Laki-laki" <? echo ($row['Jenkel']==Laki-laki)?"checked":""; ?> title="Harap Di isi!">Laki-Laki<input type='radio' name='Jenkel' value="Perempuan" <? echo ($row['Jenkel']==Perempuan)?"checked":""; ?> title="Harap Di isi!">Perempuan *)</td>
                </tr>
				 <tr class="alt">
                    <td>Tempat/Tanggal Lahir</td>
                    <td><strong>:</strong></td>
                    <td>
                        <input type="text" name="Tmpt_lhr" maxlength="20" size="20" value="<?php echo $row['Tmpt_lhr'] ;?>" title="Harap Di isi!"> *) &nbsp; &nbsp; / &nbsp; &nbsp;
						<input type="text" name="Tgl_lhr" id="Tgl_lhr" maxlength="10" size="10" class="required" title="Harap di Isi" value="<?php echo $row['Tgl_lhr'] ;?>" readonly="" />
							<a href="JavaScript:;" onClick="return showCalendar('Tgl_lhr', 'dd-mm-y');"><img src="images/ico_calendar.gif" width="16" height="15"></a>
                    *) </td>
                  </tr>
                <tr class="alt">
					<td> Alamat Siswa </td>
                    <td>:</td>
                    <td><textarea name='Alamat_siswa' cols='50' rows='5' title="Harap Di isi!"><? echo($row['Alamat_siswa']);?></textarea> *)</td>
                </tr>
				<tr class="alts" >
						<th scope="col" colspan="9"><b>Nama Orang Tua</b></th>
				</tr>
				<tr class="alt">
					<td> a. Ayah </td>
					<td>:</td>
					<td><input type='text' name='Nm_ortu' size='40' value="<?php echo $row['Nm_ayah'] ;?>"></td>
				</tr>
				<tr class="alt">
					<td> b. Ibu </td>
					<td>:</td>
					<td><input type='text' name='Nm_ibu' size='40' value="<?php echo $row['Nm_ibu'] ;?>"></td>
				</tr>
				<tr class="alt">
					<td> Alamat Orang Tua </td>
					<td>:</td>
					<td><textarea name='Alamat_ortu' cols='50' rows='5' valign='top'><?php echo $row['Alamat_ortu'] ;?></textarea></td>
				</tr>
				<tr class="alt">
					<td> Pekerjaan Orang tua </td>
					<td>:</td>
					<td><input type='text' name='Pekerjaan_ortu' size='30' value="<?php echo $row['Pekerjaan_ortu'] ;?>"></td>
				</tr>
				<tr class="alt">
					<td> Nama Wali </td>
					<td>:</td>
					<td><input type='text' name='Nm_wali' size='40' value="<?php echo $row['Nm_wali'] ;?>"></td>
				</tr>
				<tr class="alt">
					<td valign='top'> Alamat Wali </td>
					<td>:</td>
					<td><textarea name='Alamat_wali' cols='50' rows='5'><?php echo $row['Alamat_wali'] ;?></textarea></td>
				</tr>
				<tr class="alt">
					<td> Pekerjaan Wali </td>
					<td>:</td>
					<td><input type='text' name='Pekerjaan_wali' size='30' value="<?php echo $row['Pekerjaan_wali'] ;?>"></td>
				</tr>
				<tr class="alt">
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
				<th colspan="4" class="alt">
				  <div align="center"><input  type="submit" name="edit" value="Ubah" onclick="return confirm('Anda yakin ingin merubah data ini?');"/> &nbsp; <input type="reset" value="Batal" name="reset"></a> &nbsp; <a href="index.php?module=pendaftaran" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" title="Back"/></a></div>
				</th>
                </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>	