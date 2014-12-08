-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 04:27 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guaranteedauto`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `Username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Username`, `Email`, `Password`) VALUES
('admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `guaranteed`
--

CREATE TABLE IF NOT EXISTS `guaranteed` (
  `Ma_BH` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_KH` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email_KH` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DienThoai_KH` text CHARACTER SET utf8,
  `Ma_KH` text CHARACTER SET utf8 NOT NULL,
  `Ten_SP` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Seri_SP` text CHARACTER SET utf8 NOT NULL,
  `MaKho_SP` text CHARACTER SET utf8 NOT NULL,
  `MoTaLoi` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `NgayNhan_SP` date NOT NULL,
  `NgayTra_SP` date NOT NULL,
  `NhanVienSua` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TinhTrang` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `GhiChu` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Ma_BH`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `guaranteed`
--

INSERT INTO `guaranteed` (`Ma_BH`, `Ten_KH`, `Email_KH`, `DienThoai_KH`, `Ma_KH`, `Ten_SP`, `Seri_SP`, `MaKho_SP`, `MoTaLoi`, `NgayNhan_SP`, `NgayTra_SP`, `NhanVienSua`, `TinhTrang`, `GhiChu`) VALUES
(19, 'Phạm Thanh Minh', '', '01667862346', 'TV02', 'Dell insprion 550', 'tv1000', 'tv1000', 'hỏng ổ cứng', '2014-08-12', '2014-08-12', 'Thanh Minh', 'Liệt phím ESC', ''),
(26, 'lamm', 'lamptt@gmail.com', '01667862346', '001', 'honda', 'TV03302', 'TV0234', 'hongr', '2014-06-12', '2014-06-12', 'Minh', 'Hỏng hoàn toàn', 'vứt'),
(28, 'minh123123', '123123@gmail.com', '023675435', '5v2342', 'Lenovo-4001', '123123', '123123', '12313', '2014-10-12', '2014-10-12', '123213', '123123', ''),
(30, 'Minh gay', 'inhgay@gmail.com', '0123456678', '001', 'Lenovo-4001', '123123', 'TV0234', 'hongr', '2014-06-12', '2014-06-12', 'Phạm Văn Thông', 'Hỏng hoàn toàn', 'vứt'),
(38, 'minhpt', 'minhpt_d5cntt@epu.edu.vn', '01667862346', 'tv1003', 'Lenovo-4001', 'TV03302', '', 'Hỏng ổ cứng', '2014-08-12', '2014-08-12', 'Đại ca MInh', 'Không sao cả', 'Ok'),
(42, 'Phạm Thanh Minh', 'lamptt@gmail.com', '01667862346', '5v2342', 'Dell insprion 550', 'dell12356', '', 'ssadasd', '2014-08-12', '2014-10-12', 'Phạm Văn Thông', 'Hỏng hoàn toàn', 'khong sao ca');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
