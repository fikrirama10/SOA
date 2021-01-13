-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2020 pada 06.29
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soa_sales`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `Id` int(11) NOT NULL,
  `KodeBarang` varchar(50) NOT NULL,
  `KatBarang` int(11) DEFAULT NULL,
  `NamaBarang` varchar(50) DEFAULT NULL,
  `HargaBarang` decimal(10,0) DEFAULT NULL,
  `StokBarang` int(11) DEFAULT NULL,
  `IdSatuan` int(11) DEFAULT NULL,
  `HargaJual` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`Id`, `KodeBarang`, `KatBarang`, `NamaBarang`, `HargaBarang`, `StokBarang`, `IdSatuan`, `HargaJual`) VALUES
(2, 'B001', 1, 'Kacang', '20000', 20, 1, '25000'),
(3, 'B002', 3, 'Kacang', '20000', 400, 1, '25000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_mutasi`
--

CREATE TABLE `barang_mutasi` (
  `Id` int(11) NOT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `BarangMasuk` int(11) DEFAULT NULL,
  `BarangKeluar` int(11) DEFAULT NULL,
  `StokAwal` int(11) DEFAULT NULL,
  `StokAkhir` int(11) DEFAULT NULL,
  `TglMutasi` datetime DEFAULT NULL,
  `JenisMutasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_mutasi`
--

INSERT INTO `barang_mutasi` (`Id`, `KodeBarang`, `Qty`, `BarangMasuk`, `BarangKeluar`, `StokAwal`, `StokAkhir`, `TglMutasi`, `JenisMutasi`) VALUES
(2, 'B001', 1, 20, 21, 100, 90, '2020-12-16 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_mutasi_jenis`
--

CREATE TABLE `barang_mutasi_jenis` (
  `Id` int(11) NOT NULL,
  `JenisMutasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_mutasi_jenis`
--

INSERT INTO `barang_mutasi_jenis` (`Id`, `JenisMutasi`) VALUES
(1, 'Penjualan'),
(2, 'Penerimaan'),
(3, 'Barang Reject'),
(4, 'Barang Return');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_receipt`
--

CREATE TABLE `barang_receipt` (
  `Id` int(11) NOT NULL,
  `KodeReceipt` varchar(50) NOT NULL,
  `KodeRequest` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `User` int(11) DEFAULT NULL,
  `TglReceipt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_receipt`
--

INSERT INTO `barang_receipt` (`Id`, `KodeReceipt`, `KodeRequest`, `Keterangan`, `User`, `TglReceipt`) VALUES
(1, 'RC001', 'RQ001', 'Barang Baru ', 1, '2012-12-12 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_receipt_detail`
--

CREATE TABLE `barang_receipt_detail` (
  `Id` int(11) NOT NULL,
  `KodeReceipt` varchar(50) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `QtyRequest` int(11) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `TglReceipt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_request`
--

CREATE TABLE `barang_request` (
  `Id` int(11) NOT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `IdUser` int(11) NOT NULL DEFAULT 0,
  `TglRequest` datetime NOT NULL,
  `KodeRequest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_request`
--

INSERT INTO `barang_request` (`Id`, `Keterangan`, `Status`, `IdUser`, `TglRequest`, `KodeRequest`) VALUES
(2, 'Baru', 1, 1, '2012-12-12 00:00:00', 'RQ001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_request_detail`
--

CREATE TABLE `barang_request_detail` (
  `Id` int(11) NOT NULL,
  `KodeRequest` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Ket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_stok`
--

CREATE TABLE `barang_stok` (
  `Id` int(11) NOT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_stok`
--

INSERT INTO `barang_stok` (`Id`, `KodeBarang`, `Qty`, `LastUpdate`) VALUES
(1, 'B001', 2, '0000-00-00 00:00:00'),
(2, 'B001', 2, '2020-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `card`
--

CREATE TABLE `card` (
  `Id` int(11) NOT NULL,
  `Card` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `card`
--

INSERT INTO `card` (`Id`, `Card`) VALUES
(1, 'KTP'),
(2, 'SIM'),
(3, 'Passport');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1607918737),
('m130524_201442_init', 1607918743),
('m190124_110200_add_verification_token_column_to_user_table', 1607918744);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `Id` int(11) NOT NULL,
  `Provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`Id`, `Provinsi`) VALUES
(1, 'Bali'),
(2, 'Banten'),
(3, 'Bengkulu'),
(4, 'D.I. Yogyakarta'),
(5, 'DKI Jakarta'),
(6, 'Gorontalo'),
(7, 'Jambi'),
(8, 'Jawa Barat'),
(9, 'Jawa Tengah'),
(10, 'Jawa Timur'),
(11, 'Kalimantan Barat'),
(12, 'Kalimantan Selatan'),
(13, 'Kalimantan Tengah'),
(14, 'Kalimantan Timur'),
(15, 'Kepulauan Bangka Belitung'),
(16, 'Kepulauan Riau'),
(17, 'Lampung'),
(18, 'Maluku Utara'),
(19, 'Maluku'),
(20, 'Nanggroe Aceh Darussalam'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Papua Barat'),
(24, 'Papua'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatera Barat'),
(32, 'Sumatera Selatan'),
(33, 'Sumatera Utara'),
(34, 'Bangka Belitung'),
(35, 'Kalimantan Utara'),
(36, 'Luar Negeri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `Id` int(11) NOT NULL,
  `KodeTrx` varchar(50) NOT NULL,
  `IdCust` int(11) DEFAULT NULL,
  `TglTrx` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `SubTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `Id` int(11) NOT NULL,
  `KodeTrx` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `SubTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Authkey` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PasswordResetToken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdPriv` int(6) NOT NULL DEFAULT 10,
  `Login` tinyint(3) NOT NULL,
  `LastLogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IdM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsLogin` tinyint(1) DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Authkey`, `Password`, `PasswordResetToken`, `Email`, `IdPriv`, `Login`, `LastLogin`, `IdM`, `LastIP`, `IsLogin`, `Enabled`) VALUES
(1, 'adiginan', 'yzB5pP59mlISO1wKm6CnGtxBKLldagxC', '$2y$13$Lb6fRAHQVFKa6F5lnWEwj.8PCcLnhgwXwmkwGNK6shUI.MPWpXdIW', NULL, 'adiginandani28@gmail.com', 1, 1, '2020-12-21 05:03:50', '2147483647', '::1', NULL, NULL),
(2, 'adiginan_', 'iMvVn4IV45K4TeR1wy-DJhh55Bw2dFxB', '$2y$13$8C0xQd5TjJBfmcB.FPu6eeJokjX5opmfggMGmYZ8NpvXkEHTuY9SK', NULL, 'adiginanni28@gmail.com', 1, 0, '2020-12-22 03:15:48', '20200000001', NULL, NULL, NULL),
(3, 'adiginan)', 'eOP7p4fzA6fWDZCIVTuDe-VnNLCLobM-', '$2y$13$CyCFmB0ODl5TOAtguVxXXORqLdWndevS01ErPaz/sptJZAjAbnpW.', NULL, 'adiginandni28@gmail.com', 1, 0, '2020-12-22 03:17:08', '20200000001', NULL, NULL, NULL),
(4, 'adiginan2', 'RHIbARYvSXxqx5I4FCBJ4Gc8xjY12oWu', '$2y$13$pLWMCHsaBt.KWoJqmhAQjOkPUD/3VBWupZfUKqwXDkehQAHnWVoqm', NULL, 'adiginandi28@gmail.com', 1, 0, '2020-12-22 03:23:12', '20200000001', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `Id` int(11) NOT NULL,
  `IdM` int(180) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `IdCard` int(11) NOT NULL,
  `CardNo` varchar(50) NOT NULL,
  `Jk` enum('L','P') NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Kota` varchar(100) NOT NULL,
  `IdProv` int(11) NOT NULL,
  `Pos` varchar(5) NOT NULL,
  `Telepon` varchar(25) NOT NULL,
  `HP` varchar(16) NOT NULL,
  `Lahir` varchar(255) NOT NULL,
  `TglLahir` date NOT NULL,
  `IdStat` int(11) NOT NULL,
  `IsAdmin` tinyint(4) NOT NULL,
  `Created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`Id`, `IdM`, `Nama`, `IdCard`, `CardNo`, `Jk`, `Alamat`, `Kota`, `IdProv`, `Pos`, `Telepon`, `HP`, `Lahir`, `TglLahir`, `IdStat`, `IsAdmin`, `Created_at`) VALUES
(1, 2147483647, 'Adi', 1, '3204460908980002', 'L', 'Kopo Sayati', '2', 1, '40228', '085793503654', '085793503654', 'Bandung', '1998-09-08', 2, 1, '0000-00-00'),
(2, 2147483647, 'AdiGinan', 0, '3204460908980004', 'L', 'kopo', 'Bandung', 4, '40228', '085793503654', '085793503654', 'Bandung', '1998-08-09', 3, 0, '0000-00-00'),
(3, 2147483647, 'AdiG', 0, '3204460908980005', 'L', 'Kopo', 'Bandung', 1, '40228', '085793503654', '085793503654', 'Bandung', '1998-08-09', 1, 0, '0000-00-00'),
(4, 2147483647, 'AdiGinan', 0, '3204460908980006', 'L', 'kopo', 'Bandung', 1, '40228', '085793503654', '085793503654', 'Bandung', '1998-08-09', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_priviledges`
--

CREATE TABLE `user_priviledges` (
  `Id` int(11) NOT NULL,
  `Priviledges` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user_priviledges`
--

INSERT INTO `user_priviledges` (`Id`, `Priviledges`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_status`
--

CREATE TABLE `user_status` (
  `Id` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_status`
--

INSERT INTO `user_status` (`Id`, `Status`) VALUES
(1, 'Pending'),
(2, 'Registered'),
(3, 'Active'),
(4, 'Banned');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Index 2` (`KodeBarang`);

--
-- Indeks untuk tabel `barang_mutasi`
--
ALTER TABLE `barang_mutasi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_barang_mutasi_barang` (`KodeBarang`),
  ADD KEY `FK_barang_mutasi_barang_mutasi_jenis` (`JenisMutasi`);

--
-- Indeks untuk tabel `barang_mutasi_jenis`
--
ALTER TABLE `barang_mutasi_jenis`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `barang_receipt`
--
ALTER TABLE `barang_receipt`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Index 2` (`KodeReceipt`);

--
-- Indeks untuk tabel `barang_receipt_detail`
--
ALTER TABLE `barang_receipt_detail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_barang_receipt_detail_barang_receipt` (`KodeReceipt`),
  ADD KEY `FK_barang_receipt_detail_barang` (`KodeBarang`);

--
-- Indeks untuk tabel `barang_request`
--
ALTER TABLE `barang_request`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Index 2` (`KodeRequest`);

--
-- Indeks untuk tabel `barang_request_detail`
--
ALTER TABLE `barang_request_detail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_barang_request_detail_barang_request` (`KodeRequest`),
  ADD KEY `FK_barang_request_detail_barang` (`KodeBarang`);

--
-- Indeks untuk tabel `barang_stok`
--
ALTER TABLE `barang_stok`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `FK_barang_stok_barang` (`KodeBarang`);

--
-- Indeks untuk tabel `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Index 2` (`KodeTrx`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_transaksi_detail_barang` (`KodeBarang`),
  ADD KEY `FK_transaksi_detail_transaksi` (`KodeTrx`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `username` (`Username`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `password_reset_token` (`PasswordResetToken`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdCard` (`IdCard`) USING BTREE,
  ADD KEY `IdM` (`IdM`) USING BTREE,
  ADD KEY `IdStat` (`IdStat`);

--
-- Indeks untuk tabel `user_priviledges`
--
ALTER TABLE `user_priviledges`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_mutasi`
--
ALTER TABLE `barang_mutasi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_mutasi_jenis`
--
ALTER TABLE `barang_mutasi_jenis`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang_receipt`
--
ALTER TABLE `barang_receipt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang_receipt_detail`
--
ALTER TABLE `barang_receipt_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_request`
--
ALTER TABLE `barang_request`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_request_detail`
--
ALTER TABLE `barang_request_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_stok`
--
ALTER TABLE `barang_stok`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_priviledges`
--
ALTER TABLE `user_priviledges`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_mutasi`
--
ALTER TABLE `barang_mutasi`
  ADD CONSTRAINT `FK_barang_mutasi_barang` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`),
  ADD CONSTRAINT `FK_barang_mutasi_barang_mutasi_jenis` FOREIGN KEY (`JenisMutasi`) REFERENCES `barang_mutasi_jenis` (`Id`);

--
-- Ketidakleluasaan untuk tabel `barang_receipt_detail`
--
ALTER TABLE `barang_receipt_detail`
  ADD CONSTRAINT `FK_barang_receipt_detail_barang` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`),
  ADD CONSTRAINT `FK_barang_receipt_detail_barang_receipt` FOREIGN KEY (`KodeReceipt`) REFERENCES `barang_receipt` (`KodeReceipt`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_request_detail`
--
ALTER TABLE `barang_request_detail`
  ADD CONSTRAINT `FK_barang_request_detail_barang` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_barang_request_detail_barang_request` FOREIGN KEY (`KodeRequest`) REFERENCES `barang_request` (`KodeRequest`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_stok`
--
ALTER TABLE `barang_stok`
  ADD CONSTRAINT `FK_barang_stok_barang` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `FK_transaksi_detail_barang` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`),
  ADD CONSTRAINT `FK_transaksi_detail_transaksi` FOREIGN KEY (`KodeTrx`) REFERENCES `transaksi` (`KodeTrx`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
