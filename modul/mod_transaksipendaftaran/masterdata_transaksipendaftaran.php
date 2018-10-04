<br>
<?php
$pembayaran_param = false;
if(isset($_GET['act'])){
	$pembayaran_param = $_GET['act'];
}
switch($pembayaran_param){
	default:
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM pembayaran"));
?>
	<h2><span>Informasi Pendaftaran, Total Data : <?php echo $Num_Rows; ?> Pendaftar</span></h2>
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Entry Pembayaran' onclick=\"window.location.href='?module=entry_transaksipendaftaran';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:10%">Nomor Pembayaran</th>
									<th style="width:10%">Nomor Pendaftaran</th>
									<th style="width:15%">Nama Siswa</th>
									<th style="width:5%">Kelas</th>
									<th style="width:5%">Kode Biaya</th>
									<th style="width:15%">Tanggal Bayar</th>
								</tr>
								<?php
								$p      = new PagingPembayaran;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								$sql = mysql_query("SELECT * FROM pembayaran");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['No_pembayaran']; ?></td>
										<td><?php echo $data['No_pendaftaran']; ?></td>
										<td><?php echo $data['Nm_calonsiswa']; ?></td>
										<td><?php echo $data['Nm_kelas']; ?></td>
										<td><?php echo $data['Kd_biaya']; ?></td>
										<td><?php echo $data['Tgl_bayar']; ?></td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pembayaran"));
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