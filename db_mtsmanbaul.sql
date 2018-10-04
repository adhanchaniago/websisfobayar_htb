-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 08. Agustus 2018 jam 10:58
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mtsmanbaul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `Kd_biaya` char(5) NOT NULL DEFAULT '',
  `Nm_biaya` varchar(100) NOT NULL DEFAULT '',
  `Thn_ajaran` int(9) NOT NULL,
  `Biaya` int(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Status`),
  KEY `Thn_ajaran` (`Thn_ajaran`),
  KEY `Kd_kelas` (`Status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`Kd_biaya`, `Nm_biaya`, `Thn_ajaran`, `Biaya`, `Status`) VALUES
('KB001', 'Formulir', 2011, 120000, 'Beli Formulir'),
('KB002', 'Daftar Ulang', 2011, 3500000, 'Membayar Awal Daftar Ulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_siswa`
--

CREATE TABLE IF NOT EXISTS `calon_siswa` (
  `No_calonsiswa` char(7) NOT NULL DEFAULT '',
  `Thn_ajaran` char(10) DEFAULT NULL,
  `Nm_pembeli` varchar(50) DEFAULT NULL,
  `Nm_calonsiswa` varchar(50) NOT NULL,
  `Jenkel` varchar(10) DEFAULT NULL,
  `Kd_gel` char(10) NOT NULL,
  PRIMARY KEY (`No_calonsiswa`),
  KEY `Kd_gel` (`Kd_gel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `calon_siswa`
--

INSERT INTO `calon_siswa` (`No_calonsiswa`, `Thn_ajaran`, `Nm_pembeli`, `Nm_calonsiswa`, `Jenkel`, `Kd_gel`) VALUES
('PSB0001', '2011/2014', 'Budi Luhur', 'Anaknya Budi Luhur', 'Perempuan', 'KG0001'),
('PSB0002', '2012/2014', 'Budi Mulia', 'Anaknya Budi Mulia', 'Perempuan', 'KG0001'),
('PSB0003', '2011/2014', 'Budi Utomo', 'Anaknya Budi Utomo', 'Laki-laki', 'KG0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gelombang`
--

CREATE TABLE IF NOT EXISTS `gelombang` (
  `Kd_gel` char(6) NOT NULL DEFAULT '',
  `Nm_gel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Kd_gel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gelombang`
--

INSERT INTO `gelombang` (`Kd_gel`, `Nm_gel`) VALUES
('KG0001', 'Gelombang-1'),
('KG0002', 'Gelombang-2'),
('KG0003', 'Gelombang-3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `Kd_kelas` varchar(10) NOT NULL DEFAULT '',
  `Nm_kelas` varchar(100) NOT NULL DEFAULT '',
  `Kuota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Nm_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`Kd_kelas`, `Nm_kelas`, `Kuota`) VALUES
('K01', 'VII-1', '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_daftarulang`
--

CREATE TABLE IF NOT EXISTS `kode_daftarulang` (
  `Kd_biaya` char(5) NOT NULL DEFAULT '',
  `Nm_biaya` varchar(100) DEFAULT NULL,
  `Biaya` int(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Kd_biaya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data untuk tabel `kode_daftarulang`
--

INSERT INTO `kode_daftarulang` (`Kd_biaya`, `Nm_biaya`, `Biaya`, `Status`) VALUES
('KB002', 'Daftar Ulang', 3500000, 'Membayar Awal Daftar Ulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_formulir`
--

CREATE TABLE IF NOT EXISTS `kode_formulir` (
  `Kd_biaya` char(5) NOT NULL DEFAULT '',
  `Nm_biaya` varchar(100) DEFAULT NULL,
  `Biaya` int(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Kd_biaya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data untuk tabel `kode_formulir`
--

INSERT INTO `kode_formulir` (`Kd_biaya`, `Nm_biaya`, `Biaya`, `Status`) VALUES
('KB001', 'Formulir', 120000, 'Beli Formulir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembagian_kelas`
--

CREATE TABLE IF NOT EXISTS `pembagian_kelas` (
  `No_pembagiankelas` char(7) NOT NULL DEFAULT '',
  `Nm_calonsiswa` varchar(50) NOT NULL,
  `Thn_ajaran` char(10) DEFAULT NULL,
  `No_induk` char(5) NOT NULL,
  `Kd_kelas` char(7) NOT NULL,
  `Nm_kelas` char(10) NOT NULL,
  PRIMARY KEY (`No_pembagiankelas`),
  KEY `Kd_kelas` (`Kd_kelas`),
  KEY `Thn_ajaran` (`Thn_ajaran`),
  KEY `No_induk` (`No_induk`),
  KEY `Nm_kelas` (`Nm_kelas`),
  KEY `Nm_calonsiswa` (`Nm_calonsiswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembagian_kelas`
--

INSERT INTO `pembagian_kelas` (`No_pembagiankelas`, `Nm_calonsiswa`, `Thn_ajaran`, `No_induk`, `Kd_kelas`, `Nm_kelas`) VALUES
('PK-1', 'Anaknya Budi Luhur', '2011/2014', 'S0001', 'K01', 'VII-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `No_pembayaran` char(7) NOT NULL,
  `No_pendaftaran` char(7) NOT NULL,
  `Nm_calonsiswa` varchar(50) NOT NULL,
  `Nm_kelas` varchar(100) NOT NULL,
  `Kd_biaya` char(5) NOT NULL,
  `Tgl_bayar` datetime NOT NULL,
  PRIMARY KEY (`No_pembayaran`),
  KEY `Kd_biaya` (`Kd_biaya`),
  KEY `nm_kelas` (`Nm_kelas`),
  KEY `no_pendaftaran` (`No_pendaftaran`),
  KEY `no_pembayaran` (`No_pembayaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`No_pembayaran`, `No_pendaftaran`, `Nm_calonsiswa`, `Nm_kelas`, `Kd_biaya`, `Tgl_bayar`) VALUES
('KP0001', 'PSB0001', 'Anaknya Budi Luhur', 'VII-1', 'KB001', '2018-08-06 04:14:13'),
('KP0002', 'PSB0001', 'Anaknya Budi Luhur', 'VII-1', 'KB002', '2018-08-06 04:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_daftarulang`
--

CREATE TABLE IF NOT EXISTS `pembayaran_daftarulang` (
  `No_pembayaran` char(7) NOT NULL,
  `No_pendaftaran` char(7) NOT NULL,
  `Nm_calonsiswa` varchar(50) NOT NULL,
  `Nm_kelas` varchar(100) NOT NULL,
  `Kd_biaya` char(5) NOT NULL,
  `Biaya` int(50) NOT NULL,
  `Tgl_bayar` datetime NOT NULL,
  `Nm_biaya` char(50) NOT NULL,
  `Status` char(50) NOT NULL,
  KEY `Kd_biaya` (`Kd_biaya`),
  KEY `nm_kelas` (`Nm_kelas`),
  KEY `no_pendaftaran` (`No_pendaftaran`),
  KEY `Biaya` (`Biaya`),
  KEY `Kd_biaya_2` (`Kd_biaya`),
  KEY `No_pembayaran` (`No_pembayaran`),
  KEY `Nm_biaya` (`Nm_biaya`),
  KEY `Status` (`Status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_daftarulang`
--

INSERT INTO `pembayaran_daftarulang` (`No_pembayaran`, `No_pendaftaran`, `Nm_calonsiswa`, `Nm_kelas`, `Kd_biaya`, `Biaya`, `Tgl_bayar`, `Nm_biaya`, `Status`) VALUES
('KP0002', 'PSB0001', 'Anaknya Budi Luhur', 'VII-1', 'KB002', 3500000, '2018-08-06 04:14:13', 'Daftar Ulang', 'Membayar Awal Daftar Ulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_formulir`
--

CREATE TABLE IF NOT EXISTS `pembayaran_formulir` (
  `No_pembayaran` char(7) NOT NULL,
  `No_pendaftaran` char(7) NOT NULL,
  `Nm_calonsiswa` varchar(50) NOT NULL,
  `Nm_kelas` varchar(100) NOT NULL,
  `Kd_biaya` char(5) NOT NULL,
  `Biaya` int(50) NOT NULL,
  `Tgl_bayar` datetime NOT NULL,
  PRIMARY KEY (`No_pembayaran`),
  KEY `Kd_biaya` (`Kd_biaya`),
  KEY `nm_kelas` (`Nm_kelas`),
  KEY `no_pendaftaran` (`No_pendaftaran`),
  KEY `no_pembayaran` (`No_pembayaran`),
  KEY `No_pembayaran_2` (`No_pembayaran`),
  KEY `No_pendaftaran_2` (`No_pendaftaran`),
  KEY `Nm_kelas_2` (`Nm_kelas`),
  KEY `Kd_biaya_2` (`Kd_biaya`),
  KEY `Biaya` (`Biaya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_formulir`
--

INSERT INTO `pembayaran_formulir` (`No_pembayaran`, `No_pendaftaran`, `Nm_calonsiswa`, `Nm_kelas`, `Kd_biaya`, `Biaya`, `Tgl_bayar`) VALUES
('KP0001', 'PSB0001', 'Anaknya Budi Luhur', 'VII-1', 'KB001', 120000, '2018-08-06 04:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `No_calonsiswa` char(10) NOT NULL DEFAULT '',
  `Thn_ajaran` varchar(9) DEFAULT NULL,
  `Nm_lengkap` varchar(50) DEFAULT NULL,
  `Tmpt_lahir` varchar(25) DEFAULT NULL,
  `Tgl_lahir` varchar(20) DEFAULT NULL,
  `Jenkel` varchar(10) DEFAULT NULL,
  `Alamat_siswa` varchar(100) DEFAULT NULL,
  `Nm_wali` varchar(50) DEFAULT NULL,
  `No_induk` char(5) NOT NULL DEFAULT '',
  `Nm_ayah` varchar(50) DEFAULT NULL,
  `Nm_ibu` varchar(50) DEFAULT NULL,
  `Alamat_ortu` varchar(100) DEFAULT NULL,
  `Pekerjaan_ortu` varchar(25) DEFAULT NULL,
  `Alamat_wali` varchar(100) DEFAULT NULL,
  `Pekerjaan_wali` varchar(25) DEFAULT NULL,
  `Kd_Gel` char(6) NOT NULL,
  `Biaya` varchar(100) NOT NULL,
  PRIMARY KEY (`No_induk`),
  KEY `Biaya` (`Biaya`),
  KEY `Kd_Gel` (`Kd_Gel`),
  KEY `No_calonsiswa` (`No_calonsiswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`No_calonsiswa`, `Thn_ajaran`, `Nm_lengkap`, `Tmpt_lahir`, `Tgl_lahir`, `Jenkel`, `Alamat_siswa`, `Nm_wali`, `No_induk`, `Nm_ayah`, `Nm_ibu`, `Alamat_ortu`, `Pekerjaan_ortu`, `Alamat_wali`, `Pekerjaan_wali`, `Kd_Gel`, `Biaya`) VALUES
('PSB0001', '2011/2014', 'Anaknya Budi Luhur', 'Jakarta', '01/09/1996', 'Perempuan', 'Jl. Adam Malik', 'Sigit', 'S0001', 'Firman', 'Reni', 'Jl. Bahagia', 'Presiden', 'Jl. Bahagia', 'Wakil Presiden', 'KG0001', '550000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
