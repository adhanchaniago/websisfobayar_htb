<?php
include "koneksi/koneksi.php";
$module = "mod_home";
if(isset($_GET['module'])){
$module = $_GET['module'];
}
	// Master Data: Siswa
	if ($module == 'masterdata_siswa'){
		include "modul/mod_siswa/masterdata_siswa.php";
	}
	elseif ($module == 'entry_siswa'){
		include "modul/mod_siswa/entry_siswa.php";
	}
	elseif ($module == 'cari_siswa'){
		include "modul/mod_siswa/cari_siswa.php";
	}
	elseif ($module == 'edit_siswa'){
		include "modul/mod_siswa/edit_siswa.php";
	}
	elseif ($module == 'hapus_siswa'){
		include "modul/mod_siswa/hapus_siswa.php";
	}
	// Master Data: Kelas
	elseif ($module == 'masterdata_kelas'){
		include "modul/mod_kelas/masterdata_kelas.php";
	}
	elseif ($module == 'entry_kelas'){
		include "modul/mod_kelas/entry_kelas.php";
	}
	elseif ($module == 'cari_kelas'){
		include "modul/mod_kelas/cari_kelas.php";
	}
	elseif ($module == 'edit_kelas'){
		include "modul/mod_kelas/edit_kelas.php";
	}
	elseif ($module == 'hapus_kelas'){
		include "modul/mod_kelas/hapus_kelas.php";
	}
	// Master Data: Detail Biaya
	elseif ($module == 'masterdata_detailbiaya'){
		include "modul/mod_detailbiaya/masterdata_detailbiaya.php";
	}
	elseif ($module == 'entry_detailbiaya'){
		include "modul/mod_detailbiaya/entry_detailbiaya.php";
	}
	elseif ($module == 'cari_detailbiaya'){
		include "modul/mod_siswa/cari_detailbiaya.php";
	}
	elseif ($module == 'edit_detailbiaya'){
		include "modul/mod_detailbiaya/edit_detailbiaya.php";
	}
	elseif ($module == 'hapus_detailbiaya'){
		include "modul/mod_detailbiaya/hapus_detailbiaya.php";
	}
	// Master Data: Gelombang
	elseif ($module == 'masterdata_gelombang'){
		include "modul/mod_gelombang/masterdata_gelombang.php";
	}
	elseif ($module == 'entry_gelombang'){
		include "modul/mod_gelombang/entry_gelombang.php";
	}
	elseif ($module == 'cari_gelombang'){
		include "modul/mod_siswa/cari_gelombang.php";
	}
	elseif ($module == 'edit_gelombang'){
		include "modul/mod_gelombang/edit_gelombang.php";
	}
	elseif ($module == 'hapus_gelombang'){
		include "modul/mod_gelombang/hapus_gelombang.php";
	}
	// Master Data: Transaksi Pendaftaran
	elseif ($module == 'masterdata_transaksipendaftaran'){
		include "modul/mod_transaksipendaftaran/masterdata_transaksipendaftaran.php";
	}
		elseif ($module == 'entry_transaksipendaftaran'){
		include "modul/mod_transaksipendaftaran/entry_transaksipendaftaran.php";
	}
	elseif ($module == 'cari_transaksipendaftaran'){
		include "modul/mod_transaksipendaftaran/cari_transaksipendaftaran.php";
	}
	elseif ($module == 'edit_transaksipendaftaran'){
		include "modul/mod_transaksipendaftaran/edit_transaksipendaftaran.php";
	}
	elseif ($module == 'hapus_transaksipendaftaran'){
		include "modul/mod_transaksipendaftaran/hapus_transaksipendaftaran.php";
	}
	// Master Data: Transaksi Daftar Ulang
	elseif ($module == 'masterdata_transaksidaftarulang'){
		include "modul/mod_transaksidaftarulang/masterdata_transaksidaftarulang.php";
	}
	elseif ($module == 'entry_transaksidaftarulang'){
		include "modul/mod_transaksidaftarulang/entry_transaksidaftarulang.php";
	}
	elseif ($module == 'hapus_transaksidaftarulang'){
		include "modul/mod_transaksidaftarulang/hapus_transaksidaftarulang.php";
	}
	// Master Data: Transaksi Pembagian Kelas
	elseif ($module == 'masterdata_transaksipembagiankelas'){
		include "modul/mod_transaksipembagiankelas/masterdata_transaksipembagiankelas.php";
	}
	elseif ($module == 'entry_transaksipembagiankelas'){
		include "modul/mod_transaksipembagiankelas/entry_transaksipembagiankelas.php";
	}
	elseif ($module == 'hapus_transaksipembagiankelas'){
		include "modul/mod_transaksipembagiankelas/hapus_transaksipembagiankelas.php";
	}
	// Master Data: Cetak Laporan Pendaftaran
	elseif ($module == 'masterdata_cetaklaporanpendaftaran'){
		include "modul/mod_cetaklaporanpendaftaran/masterdata_cetaklaporanpendaftaran.php";
	}
	// Master Data: Cetak Laporan daftarulang
	elseif ($module == 'masterdata_cetaklaporankeuangan'){
		include "modul/mod_cetaklaporankeuangan/masterdata_cetaklaporankeuangan.php";
	}
	// Master Data: Cetak Laporan Pembagian Kelas
	elseif ($module == 'masterdata_cetaklaporankelas'){
		include "modul/mod_cetaklaporankelas/masterdata_cetaklaporankelas.php";
	}
	// Master Data: Cetak Kwitansi Pendaftaran
	elseif ($module == 'masterdata_cetakkwitansipendaftaran'){
		include "modul/mod_cetakkwitansipendaftaran/masterdata_cetakkwitansipendaftaran.php";
	}
	// Master Data: Cetak Kwitansi Daftar Ulang
	elseif ($module == 'masterdata_cetakkwitansidaftarulang'){
		include "modul/mod_cetakkwitansidaftarulang/masterdata_cetakkwitansidaftarulang.php";
	}
	else{
		include "modul/mod_home/home.php";
	}
	
//}
?>