<br>
<?php
$pendaftaran_param = false;
if(isset($_GET['act'])){
	$pendaftaran_param = $_GET['act'];
}
switch($pendaftaran_param){
	default:
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM pendaftaran"));
?>
	<h2><span>Informasi Pendaftaran, Total Pendaftar: (<?php echo $Num_Rows;?>) Siswa </span></h2>

	<div class="module-table-body">
		<form method="post" action="index.php?module=cari_transaksipendaftaran">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Entry Pendaftaran' onclick=\"window.location.href='?module=entry_transaksidaftarulang';\">"; ?>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
					<img src="images/cari.png" border="0" style="padding-right:3px;" title="Cari"/><input type="text" name="search" id="search" size="20"> <input type="submit" name="submit" value="Cari">
				</th>
			</tr>
		</form>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:3%">No</th>
									<th style="width:8%">Nomor Induk</th>
									<th style="width:25%">Nama Lengkap</th>
									<th style="width:13%">Jenis Kelamin</th>
									<th style="width:15%">Kelas</th>
									<th style="width:15%">Aksi</th>
								</tr>
								
								<?php
								$p      = new PagingPendaftaran;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM pendaftaran");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['No_induk']; ?></td>
										<td><?php echo $data['Nm_lengkap']; ?></td>
										<td><?php echo $data['Jenkel']; ?></td>
										<td><?php echo $data['Nm_kelas']; ?></td>
										<td align="center"><a href="?module=edit_transaksipendaftaran&No_induk=<?php echo $data[No_induk]; ?>"><img src="images/edit.png" border="0" style="padding-right:3px;" title="Edit"/></a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="?module=hapus_daftar_ulang&No_induk=<?php echo $data[No_induk]; ?>&Nm_lengkap=<?php echo $data[Nm_lengkap]; ?>" onclick="return confirm('Anda yakin ingin menghapus daftar_ulang <?php echo $data[Nm_lengkap]; ?>?');"><img src="images/delete.png" border="0" style="padding-right:3px;" title="Hapus"/></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
								</div>
							</div>
						</td>
					</tr>
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pendaftaran"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
<?php
}
?>