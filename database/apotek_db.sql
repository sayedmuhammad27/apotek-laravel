-- ========================================================
-- Database Schema & Sample Data: apotek_db
-- Projek Kelompok Sistem Informasi Apotek
-- Framework: Laravel
-- ========================================================

CREATE DATABASE IF NOT EXISTS `apotek_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `apotek_db`;

-- --------------------------------------------------------
-- Table structure for table `pelanggans`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `pelanggans`;
CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pelanggans_id_pelanggan_unique` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `pelanggans`
INSERT INTO `pelanggans` (`id`, `id_pelanggan`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'PLG-001', 'Ahmad Fauzi', 'Jl. Merdeka No. 12, Banda Aceh', '081234567890', NOW(), NOW()),
(2, 'PLG-002', 'Siti Nurhaliza', 'Jl. Diponegoro No. 45, Lhokseumawe', '082198765432', NOW(), NOW()),
(3, 'PLG-003', 'Rizky Pratama', 'Jl. Teuku Umar No. 88, Meulaboh', '085277889900', NOW(), NOW()),
(4, 'PLG-004', 'Cut Putri Rahma', 'Jl. Syiah Kuala No. 23, Banda Aceh', '081344556677', NOW(), NOW()),
(5, 'PLG-005', 'Budi Santoso', 'Jl. T. Iskandar No. 10, Sigli', '087811223344', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for table `staf_apoteks`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `staf_apoteks`;
CREATE TABLE `staf_apoteks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_staff` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staf_apoteks_id_staff_unique` (`id_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `staf_apoteks`
INSERT INTO `staf_apoteks` (`id`, `id_staff`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'STF-001', 'Sayed Muhammad', 'Jl. Kebon Jeruk No. 17, Banda Aceh', '2001-08-15', 'Banda Aceh', '081122334455', NOW(), NOW()),
(2, 'STF-002', 'Apt. Sarah Maulida, S.Farm', 'Komplek Keude Cunda, Lhokseumawe', '1998-04-12', 'Lhokseumawe', '081233445566', NOW(), NOW()),
(3, 'STF-003', 'Dedi Kurniawan, A.Md.Farm', 'Jl. Sudirman Blok B No. 9, Langsa', '2000-11-20', 'Langsa', '085344556677', NOW(), NOW()),
(4, 'STF-004', 'Rina Andriani', 'Jl. Hasanuddin No. 34, Banda Aceh', '2002-02-28', 'Sabang', '082255667788', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for table `obats`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `obats`;
CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_obat` int(11) NOT NULL DEFAULT 0,
  `tanggal_kadaluarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `obats_kode_obat_unique` (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `obats`
INSERT INTO `obats` (`id`, `kode_obat`, `nama_obat`, `stock_obat`, `tanggal_kadaluarsa`, `created_at`, `updated_at`) VALUES
(1, 'OBT-001', 'Paracetamol 500mg (Strip)', 120, '2028-12-31', NOW(), NOW()),
(2, 'OBT-002', 'Amoxicillin 500mg (Kapsul)', 85, '2027-10-15', NOW(), NOW()),
(3, 'OBT-003', 'Antasida Doen (Tablet Kunyah)', 95, '2028-06-20', NOW(), NOW()),
(4, 'OBT-004', 'Cetirizine HCl 10mg', 60, '2027-08-30', NOW(), NOW()),
(5, 'OBT-005', 'OBH Sirup Batuk & Flu 100ml', 45, '2026-11-25', NOW(), NOW()),
(6, 'OBT-006', 'Vitamin C 500mg IPI', 150, '2029-01-01', NOW(), NOW()),
(7, 'OBT-007', 'Ibuprofen 400mg', 70, '2027-05-18', NOW(), NOW()),
(8, 'OBT-008', 'Betadine Antiseptic Solution 60ml', 30, '2028-03-10', NOW(), NOW());
