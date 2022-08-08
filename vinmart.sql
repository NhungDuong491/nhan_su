-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2021 lúc 07:59 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vinmart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `nguon_binh_luan` int(11) NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gui` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_chuc_vu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`id`, `ma_chuc_vu`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'GD', 'Giám đốc', '2021-10-04 15:14:06', '2021-10-04 15:14:06'),
(2, 'PGD', 'Phó giám đốc', '2021-10-04 15:14:06', '2021-10-04 15:14:06'),
(3, 'TP', 'Trưởng phòng', '2021-10-04 15:14:06', '2021-10-04 15:14:06'),
(4, 'PTP', 'Phó trưởng phòng', '2021-10-04 15:14:06', '2021-10-04 15:14:06'),
(5, 'QL', 'Quản lý', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(6, 'NV', 'Nhân viên', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(11, NULL, 'Bảo vệ', '2021-10-25 05:38:46', '2021-10-25 05:38:46'),
(12, NULL, 'fb', '2021-10-25 05:51:06', '2021-10-25 05:51:06'),
(13, 'hrg', 'ẻg', '2021-10-25 05:52:36', '2021-10-25 05:52:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cskh`
--

CREATE TABLE `cskh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nguoi_tao` int(11) NOT NULL,
  `nguoi_phu_trach` int(11) NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoa_don_nhap`
--

CREATE TABLE `ct_hoa_don_nhap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoa_don_nhap_id` int(11) NOT NULL,
  `nha_cung_cap_id` int(11) DEFAULT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `so_luong` bigint(20) NOT NULL DEFAULT 0,
  `gia` decimal(20,2) NOT NULL DEFAULT 0.00,
  `thanh_tien` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoa_don_xuat`
--

CREATE TABLE `ct_hoa_don_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoa_don_xuat_id` int(11) NOT NULL,
  `san_pham_diem_ban_id` int(11) DEFAULT NULL,
  `so_luong` bigint(20) NOT NULL DEFAULT 0,
  `gia` decimal(20,2) NOT NULL DEFAULT 0.00,
  `thanh_tien` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_phieu_nhap`
--

CREATE TABLE `ct_phieu_nhap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phieu_nhap_id` int(11) NOT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `so_luong` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_phieu_xuat`
--

CREATE TABLE `ct_phieu_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phieu_xuat_id` int(11) NOT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `so_luong` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_ban`
--

CREATE TABLE `diem_ban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem_ban`
--

INSERT INTO `diem_ban` (`id`, `ten`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'Vinmart+ Triều Khúc', 'số 9 Phố Triều Khúc, Thanh Xuân Nam, Thanh Xuân, Hà Nội, Việt Nam', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(2, 'Vinmart Đại La', '163A Đại La, Đồng Tâm, Hai Bà Trưng, Hà Nội, Việt Nam', '2021-10-04 15:14:07', '2021-10-04 15:14:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_nhap`
--

CREATE TABLE `hoa_don_nhap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `tong_tien` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_xuat`
--

CREATE TABLE `hoa_don_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diem_ban_id` int(11) NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `khach_hang_id` int(11) DEFAULT NULL,
  `tong_tien` decimal(20,2) NOT NULL DEFAULT 0.00,
  `khuyen_mai` decimal(20,2) NOT NULL DEFAULT 0.00,
  `ngay_xuat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ma_kh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` int(11) DEFAULT 1,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tich_diem` decimal(20,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `user_id`, `ma_kh`, `ten`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `sdt`, `tich_diem`, `created_at`, `updated_at`) VALUES
(1, 6, 'MKH1', 'Nguyễn Văn A', 1, '2021-10-04', 'Thanh Xuân, Hà Nội', '0123456789', '0.00', '2021-10-04 15:14:08', '2021-10-04 15:14:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_khong_dau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten`, `ten_khong_dau`, `created_at`, `updated_at`) VALUES
(1, 'Thịt - Hải sản - Trứng', 'thit-hai-san-trung', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(2, 'Rau - Củ - Trái cây', 'rau-cu-trai-cay', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(3, 'Dầu ăn - Gia vị - Đồ khô', 'dau-an-gia-vi-do-kho', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(4, 'Thực phẩm đông lạnh/ Chế biến sẵn', 'thuc-pham-dong-lanh-che-bien-san', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(5, 'Sữa - Sản phẩm từ sữa', 'sua-san-pham-tu-sua', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(6, 'Đồ uống - Giải khát', 'do-uong-giai-khat', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(7, 'Bánh kẹo - Đồ ăn vặt', 'banh-keo-do-an-vat', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(8, 'Hóa phẩm - Giấy', 'hoa-pham-giay', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(9, 'Đồ dùng gia đình', 'do-dung-gia-dinh', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(10, 'Chăm sóc cá nhân', 'cham-soc-ca-nhan', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(12, 'Bảo vệ', 'bao-ve', '2021-10-24 18:19:48', '2021-10-24 18:19:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chuc_vu_id` int(11) NOT NULL,
  `luong_co_ban` decimal(20,2) NOT NULL DEFAULT 0.00,
  `luong_thuong` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `marketing`
--

CREATE TABLE `marketing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nguoi_tao` int(11) NOT NULL,
  `nguoi_phu_trach` int(11) NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(105, '2014_10_12_000000_create_users_table', 1),
(106, '2014_10_12_100000_create_password_resets_table', 1),
(107, '2019_08_19_000000_create_failed_jobs_table', 1),
(108, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(109, '2021_08_18_165150_chuc_vus_table', 1),
(110, '2021_08_18_165204_nhan_viens_table', 1),
(111, '2021_08_18_165231_khach_hangs_table', 1),
(112, '2021_08_18_165246_diem_bans_table', 1),
(113, '2021_08_18_165259_hoa_don_nhaps_table', 1),
(114, '2021_08_18_165307_chi_tiet_hoa_don_nhaps_table', 1),
(115, '2021_08_18_165314_chi_tiet_hoa_don_xuats_table', 1),
(116, '2021_08_18_165323_hoa_don_xuats_table', 1),
(117, '2021_08_18_165339_san_phams_table', 1),
(118, '2021_08_18_165345_loai_san_phams_table', 1),
(119, '2021_08_18_165357_nha_cung_caps_table', 1),
(120, '2021_08_18_165414_luongs_table', 1),
(121, '2021_08_18_165445_ngay_congs_table', 1),
(122, '2021_08_20_123241_phong_bans_table', 1),
(123, '2021_08_28_150244_binh_luans_table', 1),
(124, '2021_08_28_150321_cskh_table', 1),
(125, '2021_08_28_150350_marketing_table', 1),
(126, '2021_09_17_090625_san_pham_diem_bans_table', 1),
(127, '2021_09_17_091340_phieu_xuats_table', 1),
(128, '2021_09_17_091351_chi_tiet_phieu_xuats_table', 1),
(129, '2021_09_17_091403_phieu_nhaps_table', 1),
(130, '2021_09_17_091418_chi_tiet_phieu_nhaps_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngay_cong`
--

CREATE TABLE `ngay_cong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `ngay_cham_cong` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ngay_cong`
--

INSERT INTO `ngay_cong` (`id`, `nhan_vien_id`, `ngay_cham_cong`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-07', '2021-10-07 07:14:59', '2021-10-07 07:14:59'),
(3, 1, '2021-10-17', '2021-10-17 16:47:51', '2021-10-17 16:47:51'),
(4, 1, '2021-10-23', '2021-10-22 17:06:42', '2021-10-22 17:06:42'),
(5, 4, '2021-10-25', '2021-10-24 17:01:31', '2021-10-24 17:01:31'),
(6, 1, '2021-10-25', '2021-10-24 18:58:07', '2021-10-24 18:58:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `diem_ban_id` int(11) DEFAULT NULL,
  `ma_nv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` int(11) NOT NULL DEFAULT 1,
  `ngay_sinh` date NOT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cccd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `user_id`, `diem_ban_id`, `ma_nv`, `ten`, `anh`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `sdt`, `cccd`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'QTV', 'Quản Trị Viên', NULL, 1, '2021-10-04', 'Thanh Xuân, Hà Nội', '0888888888', '0348888888888', 'Đang làm việc', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(3, 3, NULL, 'QL3', 'Trưởng Phòng Tài Chính', NULL, 0, '2021-10-04', 'Ba Đình, Hà Nội', '0123666666', '0346666666666', 'Đang làm việc', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(4, 4, 1, 'QL4', 'Quản Lý Kho', NULL, 1, '2021-10-04', 'Thái Bình', '0123523423', '034345241324', 'Đang làm việc', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(10, 13, NULL, 'NV10', 'Nguyễn Thu Trang', NULL, 0, '2000-12-05', 'Thanh Hóa', '02175742453', '253645324564532', 'Đang làm việc', '2021-10-25 04:49:14', '2021-10-25 05:21:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten`, `dia_chi`, `sdt`, `created_at`, `updated_at`) VALUES
(2, 'Nhà cung cấp thực phẩm đông lạnh toàn quốc', 'Ng. 750 Đường Kim Giang, Thanh Liệt, Thanh Trì, Hà Nội 10000', '0123456789', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(3, 'Nhà Cung Cấp Thực Phẩm Sạch PhongLinhFood', 'Kiot 68, CT10B Chung Cư Đại Thanh, Thanh Trì, Hà Nội 100000', '0334 268 657', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(4, 'Thực Phẩm An Phát - Thịt Bò Nhập Khẩu', 'Khu Đô Thị Mới, Hoàng Mai, Hà Nội 10000', '0392 164 697', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(5, 'General Foods Vietnam JSC', '68 Ngụy Như Kon Tum, Nhân Chính, Thanh Xuân, Hà Nội 10000', '097 219 22 22', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(6, 'Công ty TNHH Công nghệ Sản xuất thực phẩm AOKI', 'ngõ 25A Lê Văn Lương, Nhân Chính, Cầu Giấy, Hà Nội', '024 3724 6417', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(7, 'Công ty TNHH Công nghệ Thực phẩm Đồ uống PCI', 'Kiot số 2 Tầng 1 TMDV B (B1, B2, DV)-CT2 (Twin Tower) KĐTM Tây Nam hồ Linh Đàm, Hà Nội 100000', '096 666 66 66', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(8, 'Công Ty Cổ Phần Nước Khoáng Bình Minh', 'Tòa nhà Machinco, 10 Trần Phú, Hà Đông, Hà Nội 100000', '024 3323 4284', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(9, 'CTY TNHH TM DV NUOC KHOANG MINH QUAN', '12A -TT3, P. Văn Quán, Hà Đông, Hà Nội', '096 322 23 29', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(10, 'Công Ty TNHH Thực Phẩm & Đồ Uống Sạch Việt Nam', '156/1, Chiến Thắng, Xã Tân Triều, Huyện Thanh Trì, Thành Phố Hà Nội, Tân Triều, Thanh Trì, Hà Nội', '091 484 47 66', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(11, 'Vinamilk Hà Nội', '521 Kim Mã, Ngọc Khánh, Ba Đình, Hà Nội', '024 3724 6019', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(12, 'TH True Milk', 'tầng 2 tòa nhà Bắc Á số, 9 Đào Duy Anh, Phương Mai, Đống Đa, Hà Nội', '1800 545440', '2021-10-04 15:14:08', '2021-10-04 15:14:08'),
(13, 'Công Ty Thực Phẩm Richy Miền Bắc', 'Tự Do, Đan Phượng, Hà Nội', '0893388476', '2021-10-04 15:14:09', '2021-10-04 15:14:09'),
(14, 'Công Ty Cp Bánh Kẹo Mứt Hà Nội', '107 Ngụy Như Kon Tum, Nhân Chính, Thanh Xuân, Hà Nội', '024 3835 0006', '2021-10-04 15:14:09', '2021-10-04 15:14:09'),
(15, 'Công ty Cổ phần bánh kẹo Hải Hà', '25-27 Trương Định, Hai Bà Trưng, Hà Nội 100000', '024 3863 2041', '2021-10-04 15:14:09', '2021-10-04 15:14:09'),
(16, 'Công Ty Cp Chế Biến Thực Phẩm Kinh Đô Miền Bắc', '34 Láng Hạ, Đống Đa, Hà Nội', '024 3863 2042', '2021-10-04 15:14:09', '2021-10-04 15:14:09'),
(17, 'Rau FVF - Công ty CP Sản Xuất và Cung Ứng Rau Quả Sạch Quốc Tế - Tập đoàn TH', '34 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', '024 3791 9666', '2021-10-04 15:14:09', '2021-10-04 15:14:09'),
(18, 'Nông Sản Dũng Hà', 'A11 Ngõ 100 Trung Kính, Yên Hoà, Cầu Giấy, Hà Nội 150000', '024 6658 8556', '2021-10-04 15:14:09', '2021-10-04 15:14:09'),
(19, 'Công Ty Tnhh Thực Phẩm Hoàng Đông', '94 Trần Quý Cáp, Văn Chương, Đống Đa, Hà Nội', '024 2218 2181', '2021-10-04 15:14:09', '2021-10-04 15:14:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diem_ban_id` int(11) DEFAULT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_xuat`
--

CREATE TABLE `phieu_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diem_ban_id` int(11) NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `ngay_xuat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_ban`
--

CREATE TABLE `phong_ban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_phong_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_ban`
--

INSERT INTO `phong_ban` (`id`, `ma_phong_ban`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'PTC', 'Phòng tài chình', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(2, 'PNS', 'Phòng nhân sự', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(3, 'KHO', 'Kho', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(4, 'BH', 'Bán hàng', '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(5, 'QHKH', 'Quan hệ khách hàng', '2021-10-04 15:14:07', '2021-10-24 18:57:03'),
(7, NULL, 'Bảo vệ', '2021-10-25 05:27:21', '2021-10-25 05:27:21'),
(8, 'BV', 'Bảo', '2021-10-25 05:34:34', '2021-10-25 05:34:34'),
(9, '1', '2', '2021-10-25 05:58:28', '2021-10-25 05:58:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loai_san_pham_id` int(11) NOT NULL,
  `nha_cung_cap_id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_khong_dau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_nhap` decimal(20,2) NOT NULL DEFAULT 0.00,
  `so_luong` bigint(20) NOT NULL DEFAULT 0,
  `don_vi_tinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nsx` date DEFAULT NULL,
  `hsd` date DEFAULT NULL,
  `trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_diem_ban`
--

CREATE TABLE `san_pham_diem_ban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diem_ban_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `gia_ban` decimal(8,2) NOT NULL DEFAULT 0.00,
  `so_luong` bigint(20) NOT NULL DEFAULT 0,
  `da_ban` bigint(20) NOT NULL DEFAULT 0,
  `trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phong_ban_id` int(11) NOT NULL DEFAULT 0,
  `chuc_vu_id` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `phong_ban_id`, `chuc_vu_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'qtv@admin.admin', NULL, '25d55ad283aa400af464c76d713c07ad', 0, 1, NULL, '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(3, 'taichinh_1@gmail.com', NULL, 'cf11f389a5cd3744d0ae4a7c328c48bc', 1, 4, NULL, '2021-10-04 15:14:07', '2021-10-25 03:19:14'),
(4, 'kho_1@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 3, 5, NULL, '2021-10-04 15:14:07', '2021-10-12 10:04:00'),
(6, 'khachhang_1@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 0, 0, NULL, '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(9, 'trang@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 2, 5, NULL, NULL, NULL),
(11, 'thutrang@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 2, 6, NULL, '2021-10-04 15:14:07', '2021-10-04 15:14:07'),
(13, 'trangnt5120@gmail.com', NULL, '1bbc7ff9d75c9a9357820c82b956e886', 2, 5, NULL, '2021-10-25 04:49:14', '2021-10-25 05:21:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cskh`
--
ALTER TABLE `cskh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ct_hoa_don_nhap`
--
ALTER TABLE `ct_hoa_don_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ct_hoa_don_xuat`
--
ALTER TABLE `ct_hoa_don_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ct_phieu_nhap`
--
ALTER TABLE `ct_phieu_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ct_phieu_xuat`
--
ALTER TABLE `ct_phieu_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diem_ban`
--
ALTER TABLE `diem_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loai_san_pham_ten_unique` (`ten`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ngay_cong`
--
ALTER TABLE `ngay_cong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nha_cung_cap_ten_unique` (`ten`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieu_xuat`
--
ALTER TABLE `phieu_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham_diem_ban`
--
ALTER TABLE `san_pham_diem_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cskh`
--
ALTER TABLE `cskh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ct_hoa_don_nhap`
--
ALTER TABLE `ct_hoa_don_nhap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ct_hoa_don_xuat`
--
ALTER TABLE `ct_hoa_don_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ct_phieu_nhap`
--
ALTER TABLE `ct_phieu_nhap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ct_phieu_xuat`
--
ALTER TABLE `ct_phieu_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diem_ban`
--
ALTER TABLE `diem_ban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `ngay_cong`
--
ALTER TABLE `ngay_cong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieu_xuat`
--
ALTER TABLE `phieu_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_pham_diem_ban`
--
ALTER TABLE `san_pham_diem_ban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
