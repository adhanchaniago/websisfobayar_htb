<br>
<?php
$pembagian_kelas_param = false;
if(isset($_GET['act'])){
	$pembagian_kelas_param = $_GET['act'];
}
switch($pembagian_kelas_param){
	default:
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM pembagian_kelas"));
?>
	<h2><span>Informasi Pendaftaran, Total Pembagian: (<?php echo $Num_Rows;?>) Kelas </span></h2>
	<div class="module-table-body">
		<form method="post" action="index.php?module=cari_transaksipendaftaran">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Entry Pembagian Kelas' onclick=\"window.location.href='?module=entry_transaksipembagiankelas';\">"; ?>
				</th>
			</tr>
		</form>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Nomor Pembagian Kelas</th>
									<th style="width:20%">Nama Siswa</th>
									<th style="width:15%">Tahun Ajaran</th>
									<th style="width:10%">Nomor Induk</th>
									<th style="width:10%">Kode Kelas</th>
									<th style="width:10%">Nama Kelas</th>
									<th style="width:10%">Aksi</th>
								</tr>
								
								<?php
								$p      = new PagingPendaftaran;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM pembagian_kelas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data['No_pembagiankelas']; ?></td>
										<td align="center"><?php echo $data['Nm_calonsiswa']; ?></td>
										<td align="center"><?php echo $data['Thn_ajaran']; ?></td>
										<td align="center"><?php echo $data['No_induk']; ?></td>
										<td align="center"><?php echo $data['Kd_kelas']; ?></td>
										<td align="center"><?php echo $data['Nm_kelas']; ?></td>
										<td align="center"><a href="?module=hapus_transaksipembagiankelas&No_pembagiankelas=<?php echo $data[No_pembagiankelas];?>&Kd_kelas=<?php echo $data[Kd_kelas]; ?>" onclick="return confirm('Anda yakin ingin menghapus pembagian kelas <?php echo $data[Kd_kelas]; ?>?');"><img src="images/delete.png" border="0" style="padding-right:3px;" title="Hapus"/></a></td>
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