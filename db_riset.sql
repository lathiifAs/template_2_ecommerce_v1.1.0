/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_riset
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_riset` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_riset`;

/*Table structure for table `alamat_transaksi` */

DROP TABLE IF EXISTS `alamat_transaksi`;

CREATE TABLE `alamat_transaksi` (
  `alamat_transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` varchar(25) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `kode_pos` int(6) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `prov_id` varchar(25) DEFAULT NULL,
  `prov_nama` varchar(50) DEFAULT NULL,
  `kab_id` varchar(25) DEFAULT NULL,
  `kab_nama` varchar(50) DEFAULT NULL,
  `kec_id` varchar(25) DEFAULT NULL,
  `kec_nama` varchar(100) DEFAULT NULL,
  `alamat_lengkap` text,
  UNIQUE KEY `alamat_transaksi_alamat_transaksi_id_IDX` (`alamat_transaksi_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `alamat_transaksi` */

insert  into `alamat_transaksi`(`alamat_transaksi_id`,`transaksi_id`,`nama_penerima`,`kode_pos`,`no_hp`,`email`,`prov_id`,`prov_nama`,`kab_id`,`kab_nama`,`kec_id`,`kec_nama`,`alamat_lengkap`) values 
(49,'2002190345500001','lathiif aji sanhtosho',45219,'082126641201','lathiif.aji.s@gmail.com','5','DI Yogyakarta','419','Sleman','5788','Ngaglik','plosokuning 3');

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) DEFAULT NULL,
  `nama_gambar` varchar(50) DEFAULT NULL,
  `mdd` date DEFAULT NULL,
  UNIQUE KEY `banner_banner_id_IDX` (`banner_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `banner` */

insert  into `banner`(`banner_id`,`jenis`,`nama_gambar`,`mdd`) values 
(22,'main-banner','200218banner1.jpg','2020-02-18'),
(23,'main-banner','200218banner2.jpeg','2020-02-18'),
(24,'main-banner','200218banner3.jpg','2020-02-18'),
(25,'main-banner','200218banner4.jpg','2020-02-18');

/*Table structure for table `bukti_transfer` */

DROP TABLE IF EXISTS `bukti_transfer`;

CREATE TABLE `bukti_transfer` (
  `bukti_transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` varchar(25) DEFAULT NULL,
  `nama_rek` varchar(100) DEFAULT NULL,
  `no_rek_pentransfer` varchar(100) DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  UNIQUE KEY `bukti_transaksi_bukti_transaksi_id_IDX` (`bukti_transfer_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bukti_transfer` */

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `produk_id` varchar(25) DEFAULT NULL,
  `jumlah` int(9) DEFAULT NULL,
  `nil_bayar` varchar(25) DEFAULT NULL,
  `tgl_insert` datetime DEFAULT NULL,
  `transaksi_st` enum('cart','dibeli') DEFAULT 'cart',
  `tgl_transaksi` datetime DEFAULT NULL,
  `tgl_transaksi_batal` datetime DEFAULT NULL,
  UNIQUE KEY `cart_cart_id_IDX` (`cart_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`cart_id`,`user_id`,`produk_id`,`jumlah`,`nil_bayar`,`tgl_insert`,`transaksi_st`,`tgl_transaksi`,`tgl_transaksi_batal`) values 
(1,'2002040002','2002190002',1,'250000','2020-02-19 03:42:54','dibeli','2020-02-19 03:45:50',NULL),
(2,'2002040002','2002190006',1,'1500000','2020-02-19 03:43:05','dibeli','2020-02-19 03:45:50',NULL);

/*Table structure for table `com_group` */

DROP TABLE IF EXISTS `com_group`;

CREATE TABLE `com_group` (
  `group_id` varchar(2) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `group_desc` varchar(100) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(40) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_group` */

insert  into `com_group`(`group_id`,`group_name`,`group_desc`,`mdb`,`mdb_name`,`mdd`) values 
('1','Developer web','Group developer website','1911130001',NULL,'2019-11-22 09:44:11'),
('2','Operator','Admin Operator','1911130001',NULL,'2019-11-22 09:47:26'),
('3','Pembeli','Pembeli secara umum','1911130001','admin','2020-01-03 09:00:41');

/*Table structure for table `com_menu` */

DROP TABLE IF EXISTS `com_menu`;

CREATE TABLE `com_menu` (
  `nav_id` int(11) NOT NULL,
  `parent_id` varchar(10) DEFAULT NULL,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_desc` varchar(100) DEFAULT NULL,
  `nav_url` varchar(100) DEFAULT NULL,
  `nav_no` int(11) unsigned DEFAULT NULL,
  `client_st` enum('1','0') DEFAULT '0',
  `active_st` enum('1','0') DEFAULT '1',
  `display_st` enum('1','0') DEFAULT '1',
  `nav_icon` varchar(50) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_menu` */

insert  into `com_menu`(`nav_id`,`parent_id`,`nav_title`,`nav_desc`,`nav_url`,`nav_no`,`client_st`,`active_st`,`display_st`,`nav_icon`,`mdb`,`mdb_name`,`mdd`) values 
(2,'0','Master Data','','#',20,'0','1','1','ti-harddrives','1911130001','admin','2019-11-22 04:05:43'),
(3,'2','User','menu user','master/user',1,'0','1','1','','1911130001','admin','2019-11-22 04:06:47'),
(4,'0','Sistem','','#',21,'0','1','1','ti-settings','1911130001','admin','2019-11-22 04:06:08'),
(5,'4','Menu Navigasi','navigasi','sistem/navigation',1,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:30:53'),
(6,'4','Role','master role','sistem/role',3,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:31:23'),
(7,'4','Group','group role','sistem/group',2,'0','1','1','','1911130001','admin','2019-11-27 02:30:36'),
(8,'0','Logout','logout','sistem/login/logout',100,'0','1','1','ti-close','1911130001','admin','2019-11-22 04:06:36'),
(9,'0','Lihat Beranda','Link to beranda','client/beranda',99,'0','1','1','ti-home','1911130001','admin','2019-11-27 04:52:38'),
(10,'0','Dashboard','','#',1,'0','1','1','ti-home','1911130001','admin','2019-11-22 04:54:22'),
(11,'10','Dashboard','dashboard content','welcome',1,'0','1','1','','1911130001','admin','2019-11-22 04:58:30'),
(12,'4','Hak Akses','Hak akses user','sistem/permission',4,'0','1','1','','1911130001','admin','2020-01-16 09:17:03'),
(13,'0','Beranda','Untuk menu front client','client/beranda',1,'1','1','1','','1911130001','admin','2019-11-27 04:52:17'),
(14,'0','Tentang','Untuk menu front client','client/about',2,'1','1','0','','1911130001','admin','2020-01-31 07:53:08'),
(15,'0','Login','Login ke portal admin','welcome',3,'1','1','0','','1911130001','admin','2020-01-04 14:09:40'),
(16,'0','Atur Halaman Client','Untuk halaman client','#',2,'0','1','1','ti-layers-alt','1911130001','admin','2020-01-28 09:02:30'),
(17,'16','Atur Beranda','Beranda untuk halaman depan','setclient/beranda',1,'0','0','0','','1911130001','admin','2020-01-02 09:19:18'),
(18,'16','Atur Kontak','Atur data kontak di halaman depan','setclient/contact',2,'0','0','0','','2002070001','superuser','2020-02-08 19:26:56'),
(19,'2','Kategori','Kategori dari produk','master/kategori',3,'0','1','1','','1911130001','admin','2020-01-31 08:26:08'),
(20,'2','Produk','Master Data Produk','master/produk',4,'0','1','1','','1911130001','admin','2020-01-31 08:26:17'),
(21,'16','Atur Banner','untuk mengatur banner utama','setclient/banner',1,'0','1','1','','1911130001','admin','2020-01-06 07:50:53'),
(22,'0','Transaksi','Transaksi admin','#',3,'0','1','1','ti-exchange-vertical','1911130001','admin','2020-01-28 09:02:44'),
(23,'22','Pembelian','-','transaksi/pembelian',1,'0','1','1','','1911130001','admin','2020-01-25 18:07:32'),
(24,'22','Bukti Transfer','verifikasi foto bukti transfer','transaksi/bukti_transfer',2,'0','1','1','','1911130001','admin','2020-01-25 18:08:51'),
(25,'22','Masukan Resi','resi','transaksi/resi',3,'0','1','1','','1911130001','admin','2020-01-28 03:11:40'),
(26,'22','Pendaftar Anggota Bisnis','pendaftaran anggota bisnis ecoracing','master/register_anggota_bisnis',2,'0','1','1','','2002070001','superuser','2020-02-08 05:43:00');

/*Table structure for table `com_reset_pass` */

DROP TABLE IF EXISTS `com_reset_pass`;

CREATE TABLE `com_reset_pass` (
  `data_id` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `request_st` enum('1','0','2') DEFAULT '0',
  `response_by` varchar(10) DEFAULT NULL,
  `response_date` datetime DEFAULT NULL,
  `response_notes` varchar(100) DEFAULT NULL,
  `request_expired` datetime DEFAULT NULL,
  `request_key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_reset_pass` */

/*Table structure for table `com_role` */

DROP TABLE IF EXISTS `com_role`;

CREATE TABLE `com_role` (
  `role_id` varchar(5) NOT NULL,
  `group_id` varchar(2) DEFAULT NULL,
  `role_nm` varchar(100) DEFAULT NULL,
  `role_desc` varchar(100) DEFAULT NULL,
  `mdb` varchar(50) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `com_role_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `com_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_role` */

insert  into `com_role`(`role_id`,`group_id`,`role_nm`,`role_desc`,`mdb`,`mdb_name`,`mdd`) values 
('1','1','Developer','Web developer','1911130001',NULL,'2019-11-22 09:45:00'),
('2','2','Administrator','Admin Website','admin',NULL,'2019-11-13 07:49:08'),
('3','3','Pembeli','','1911130001','admin','2020-01-03 09:01:37');

/*Table structure for table `com_role_menu` */

DROP TABLE IF EXISTS `com_role_menu`;

CREATE TABLE `com_role_menu` (
  `role_id` varchar(5) NOT NULL,
  `nav_id` varchar(10) NOT NULL,
  `role_tp` varchar(4) NOT NULL DEFAULT '1111',
  PRIMARY KEY (`nav_id`,`role_id`),
  KEY `role_id` (`role_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_role_menu` */

insert  into `com_role_menu`(`role_id`,`nav_id`,`role_tp`) values 
('1','10','1111'),
('2','10','1111'),
('1','11','1111'),
('2','11','1111'),
('1','12','1111'),
('1','16','1111'),
('2','16','1111'),
('1','17','1111'),
('2','17','1111'),
('1','18','1111'),
('2','18','1111'),
('1','19','1111'),
('2','19','1111'),
('1','2','1111'),
('2','2','1111'),
('1','20','1111'),
('2','20','1111'),
('1','21','1111'),
('2','21','1111'),
('1','22','1111'),
('2','22','1111'),
('1','23','1111'),
('2','23','1111'),
('1','24','1111'),
('2','24','1111'),
('1','25','1111'),
('2','25','1111'),
('1','26','1111'),
('2','26','1111'),
('1','3','1111'),
('2','3','1111'),
('1','4','1111'),
('1','5','1111'),
('1','6','1111'),
('1','7','1111'),
('1','8','1111'),
('2','8','1111'),
('1','9','1111'),
('2','9','1111');

/*Table structure for table `com_role_user` */

DROP TABLE IF EXISTS `com_role_user`;

CREATE TABLE `com_role_user` (
  `user_id` varchar(10) NOT NULL,
  `role_id` varchar(5) NOT NULL,
  `role_default` enum('1','2') DEFAULT '2',
  `role_display` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `com_role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `com_role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_role_user` */

insert  into `com_role_user`(`user_id`,`role_id`,`role_default`,`role_display`) values 
('2002040002','3','2','1'),
('2002070001','1','2','1'),
('2002070002','2','2','1'),
('2002080001','3','2','1');

/*Table structure for table `com_user` */

DROP TABLE IF EXISTS `com_user`;

CREATE TABLE `com_user` (
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_key` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `default_page` varchar(100) DEFAULT NULL,
  `user_st` enum('1','0','2') DEFAULT NULL,
  `examiner_number` varchar(50) DEFAULT NULL COMMENT 'Medex - Nomor Penunjukan Penguji',
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_user` */

insert  into `com_user`(`user_id`,`user_name`,`user_pass`,`user_key`,`user_mail`,`default_page`,`user_st`,`examiner_number`,`mdb`,`mdb_name`,`mdd`) values 
('2002040002','ajisanthoshol@gmail.com','vf/JUDFX8z8MxndP1WjEV1YHBv0Tbujs1G1PlDHtAK4nvj7no+s1A9JU+GnEU1MmYI7ner5VlIudx/tXUz1KLg==','2444918005','ajisanthoshol@gmail.com','client/beranda','1',NULL,NULL,NULL,'2020-02-04 03:08:43'),
('2002070001','superuser','cObpWdg8YXeixxP0ovMV5xk4vMeqLCxeJtneYJu9NAWzrztPfgtz5Ft2mrgyaR57iq2omlllQJVyUg7beTLD+w==','1485659163','founder@artdev.id','welcome','1',NULL,'1911130001','admin','2020-02-07 08:56:26'),
('2002070002','operator','Ktgy3uBigt16eqGOpPSXNxLaAwVbEPAepBDpgb6zLTQi7hEqekllkEBcEkLc9cuxGtPtzmp42rVB5yfPzVDHHA==','3519401566','operator@gmail.com','welcome','1',NULL,'2002070001','superuser','2020-02-07 09:16:11'),
('2002080001','masrurisasi@gmail.com','azx3YMiWkzO0JVDUcNmFJLsoxNTc3murzE5oecfStEHFPlC2QpZq2SaaxrAppUALQjJiWnZW5IUzszccDpspLg==','4058071586','masrurisasi@gmail.com','client/beranda','1',NULL,NULL,NULL,'2020-02-08 20:01:40');

/*Table structure for table `com_user_login` */

DROP TABLE IF EXISTS `com_user_login`;

CREATE TABLE `com_user_login` (
  `user_id` varchar(10) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`login_date`),
  CONSTRAINT `com_user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_user_login` */

/*Table structure for table `com_user_super` */

DROP TABLE IF EXISTS `com_user_super`;

CREATE TABLE `com_user_super` (
  `user_id` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `com_user_super_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_user_super` */

insert  into `com_user_super`(`user_id`) values 
('2002070001');

/*Table structure for table `favorit` */

DROP TABLE IF EXISTS `favorit`;

CREATE TABLE `favorit` (
  `favorit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `produk_id` varchar(25) DEFAULT NULL,
  `date_favorit` date DEFAULT NULL,
  UNIQUE KEY `favorit_favorit_id_IDX` (`favorit_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `favorit` */

/*Table structure for table `gambar_produk` */

DROP TABLE IF EXISTS `gambar_produk`;

CREATE TABLE `gambar_produk` (
  `gambar_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` varchar(25) NOT NULL,
  `gambar_nama` varchar(50) DEFAULT NULL,
  `mdb` varchar(25) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  UNIQUE KEY `gambar_produk_gambar_id_IDX` (`gambar_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `gambar_produk` */

insert  into `gambar_produk`(`gambar_id`,`produk_id`,`gambar_nama`,`mdb`,`mdb_name`,`mdd`) values 
(1,'2002190001','200219ecoracing1.jpg','2002070001','superuser','2020-02-19 03:22:37'),
(2,'2002190001','200219ecoracing2.jpg','2002070001','superuser','2020-02-19 03:22:37'),
(3,'2002190001','200219ecoracing3.jpg','2002070001','superuser','2020-02-19 03:22:37'),
(4,'2002190001','200219ecoracing4.jpg','2002070001','superuser','2020-02-19 03:22:37'),
(5,'2002190002','200219ecodiesel.png','2002070001','superuser','2020-02-19 03:28:07'),
(6,'2002190002','200219ecodiesel2.jpg','2002070001','superuser','2020-02-19 03:28:07'),
(7,'2002190002','200219ecodiesel3.png','2002070001','superuser','2020-02-19 03:28:07'),
(8,'2002190003','200219tshirt.jpg','2002070001','superuser','2020-02-19 03:31:53'),
(9,'2002190004','200219motorninja.jpg','2002070001','superuser','2020-02-19 03:33:05'),
(10,'2002190005','200219pants.jpg','2002070001','superuser','2020-02-19 03:34:53'),
(11,'2002190006','200219ontel.jpeg','2002070001','superuser','2020-02-19 03:37:12'),
(12,'2002190007','200219sepatu.jpg','2002070001','superuser','2020-02-19 03:39:41');

/*Table structure for table `info_kurir` */

DROP TABLE IF EXISTS `info_kurir`;

CREATE TABLE `info_kurir` (
  `info_kurir_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` varchar(25) DEFAULT NULL,
  `nama_kurir` varchar(50) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `wkt_perkiraan` varchar(50) DEFAULT NULL,
  `biaya_ongkir` int(11) DEFAULT NULL,
  `desk_kurir` text,
  `resi` varchar(100) DEFAULT NULL,
  UNIQUE KEY `info_kurir_info_kurir_id_IDX` (`info_kurir_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `info_kurir` */

insert  into `info_kurir`(`info_kurir_id`,`transaksi_id`,`nama_kurir`,`service`,`wkt_perkiraan`,`biaya_ongkir`,`desk_kurir`,`resi`) values 
(50,'2002190345500001','jne','OKE','4-7',57000,'Ongkos Kirim Ekonomis',NULL);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) DEFAULT NULL,
  `kategori_st` enum('yes','no') DEFAULT 'yes',
  `logo` text,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `user_name` (`kategori_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`kategori_id`,`kategori_nama`,`kategori_st`,`logo`,`mdb`,`mdb_name`,`mdd`) values 
(1,'sepeda','yes','200219bike.png','2002070001','superuser','2020-02-19 03:10:42'),
(2,'mobil','yes','200219car.png','2002070001','superuser','2020-02-19 03:10:47'),
(3,'kaos','yes','200219cloth.png','2002070001','superuser','2020-02-19 03:11:00'),
(4,'celana','yes','200219garment.png','2002070001','superuser','2020-02-19 03:11:09'),
(5,'gitar','yes','200219guitar.png','2002070001','superuser','2020-02-19 03:11:16'),
(6,'topi wanita','yes','200219headgear.png','2002070001','superuser','2020-02-19 03:11:27'),
(7,'sandal','yes','200219home.png','2002070001','superuser','2020-02-19 03:11:37'),
(8,'keyboard','yes','200219keyboard.png','2002070001','superuser','2020-02-19 03:11:45'),
(9,'motor','yes','200219motorcycle.png','2002070001','superuser','2020-02-19 03:11:52'),
(10,'mouse','yes','200219mouse-clicker.png','2002070001','superuser','2020-02-19 03:11:59'),
(11,'smartphone','yes','200219phone.png','2002070001','superuser','2020-02-19 03:12:12'),
(12,'dasi','yes','200219scarf.png','2002070001','superuser','2020-02-19 03:12:18'),
(13,'sepatu','yes','200219sneakers.png','2002070001','superuser','2020-02-19 03:12:25');

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `telephone` varchar(25) DEFAULT NULL,
  `no_whatsapp` varchar(25) DEFAULT NULL,
  `fanpage_fb` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kontak` */

insert  into `kontak`(`telephone`,`no_whatsapp`,`fanpage_fb`,`email`,`alamat`) values 
('082126641201','082126641201','lathiif aji santhosho','ajisanthoshol@gmail.com','karangsong');

/*Table structure for table `prefrensi` */

DROP TABLE IF EXISTS `prefrensi`;

CREATE TABLE `prefrensi` (
  `pref_id` int(11) NOT NULL,
  `jenis_pref` varchar(50) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `value_pref` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `nama_bank` varchar(70) DEFAULT NULL,
  `img_name` varchar(100) DEFAULT NULL,
  UNIQUE KEY `prefrensi_pref_id_IDX` (`pref_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `prefrensi` */

insert  into `prefrensi`(`pref_id`,`jenis_pref`,`kode`,`value_pref`,`keterangan`,`nama_bank`,`img_name`) values 
(1,'rekening','422','1036762337','Masruri','BRI Syariah','bank01.jpg'),
(2,'email','0','founder@artdev.id','@Hijrah1996',NULL,NULL);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `produk_id` varchar(25) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` varchar(12) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL COMMENT 'dalam bentuk gram',
  `deskripsi` text,
  `stok_st` enum('yes','no') DEFAULT NULL,
  `rekomendasi_st` enum('yes','no') DEFAULT 'no',
  `produk_eco_st` enum('yes','no') DEFAULT 'no',
  `active_st` enum('yes','no') DEFAULT 'yes',
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`produk_id`,`kategori_id`,`nama`,`harga`,`satuan`,`berat`,`deskripsi`,`stok_st`,`rekomendasi_st`,`produk_eco_st`,`active_st`,`mdb`,`mdb_name`,`mdd`) values 
('2002190001',9,'Eco racing','500000','unit',456,'Eco Racing adalah fuel booster, yang merupakan additive berbahan dasar organic yang membantu meningkatkan nilai octane maupun cetane dari bahan bakar, dengan penelitian selama 10 tahun dan telah melalui uji laboratorium kelayakan produk.','yes','yes','yes','yes','2002070001','superuser','2020-02-19 03:22:37'),
('2002190002',2,'Eco diesel','500000','unit',500,'Eco racing ini bisa dipakai untuk seluruh macam type mesin yang mengaplikasikan bahan bakar minyak. Jadi anda yang sedang mencari produk penghemat bbm diesel, penghemat solar genset, penghemat solar kapal, penghemat solar innova, Penghemat Solar Pajero, penghemat bbm motor, penghemat bbm mobil, penghemat bbm mobil karburator, penghemat solar mobil dan lainnya bisa mengaplikasikan eco racing sinergy ini.\r\nKita tahu bahwa banyak sekali produk penghemat bbm lainnya yang beredar dipasaran. Contohnya seperti produk dari USA dan Taiwan yang ternyata eh ternyata masih mengaplikasikan campuran Zn (seng) dan Pb (timbal). Hal itu benar-benar tidak bagus untuk mesin kendaraan.\r\nNah… Produk Eco racing ini tidak mengaplikasikan campuran tersebut, bahannya natural organic sehingga benar-benar aman dipakai walau untuk penggunaan terus menerus.','yes','yes','yes','yes','2002070001','superuser','2020-02-19 03:28:07'),
('2002190003',3,'kaos sign','200000','unit',400,'kaos dengan bahan terbaik','yes','yes','no','yes','2002070001','superuser','2020-02-19 03:31:53'),
('2002190004',9,'Ninja 250 Tak','20000000','unit',130000,'Motor ninja dengan cc yang tinggi 250 Tak','yes','yes','no','yes','2002070001','superuser','2020-02-19 03:33:05'),
('2002190005',4,'Celana brown cool','350000','unit',600,'celana coklat import dengan bahan terbaik','yes','yes','no','yes','2002070001','superuser','2020-02-19 03:34:53'),
('2002190006',1,'sepeda ontel','1500000','unit',2000,'sepeda ontel klasik','yes','no','no','yes','2002070001','superuser','2020-02-19 03:37:12'),
('2002190007',1,'Sepatu Sneakers Pria Varka V 039','800000','unit',300,'Sepatu Sneakers Pria Varka V 039 untuk santai','yes','no','no','yes','2002070001','superuser','2020-02-19 03:39:41');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `transaksi_id` varchar(25) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL COMMENT 'hanya menjumlahkan harga * jumlah',
  `kode_unik` varchar(25) DEFAULT NULL COMMENT 'kode unik transfer',
  `transaksi_st` enum('dibeli','kirim_bukti','dibayar','dikirim','batal') DEFAULT 'dibeli',
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  `tgl_batas_bayar` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`transaksi_id`,`user_id`,`subtotal`,`kode_unik`,`transaksi_st`,`mdb`,`mdb_name`,`mdd`,`tgl_batas_bayar`) values 
('2002190345500001','2002040002',2000000,'583','dibeli','2002040002','ajisanthoshol@gmail.com','2020-02-19 03:45:50','2020-02-22 03:45:50');

/*Table structure for table `transaksi_bisnis` */

DROP TABLE IF EXISTS `transaksi_bisnis`;

CREATE TABLE `transaksi_bisnis` (
  `transaksi_bisnis_id` varchar(25) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `produk_id` varchar(25) DEFAULT NULL,
  `kurir` varchar(30) DEFAULT NULL,
  `nominal_transfer` int(11) DEFAULT NULL,
  `nama_rek` varchar(100) DEFAULT NULL,
  `no_rek_pentransfer` varchar(100) DEFAULT NULL,
  `status_transfer` enum('daftar','transfer','diverifikasi') DEFAULT 'daftar',
  `mdd` datetime DEFAULT NULL,
  `verifikasi_date` datetime DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transaksi_bisnis` */

/*Table structure for table `transaksi_produk` */

DROP TABLE IF EXISTS `transaksi_produk`;

CREATE TABLE `transaksi_produk` (
  `transaksi_produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` varchar(25) DEFAULT NULL,
  `produk_id` varchar(25) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  UNIQUE KEY `transaksi_produk_transaksi_produk_id_KEY` (`transaksi_produk_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_produk` */

insert  into `transaksi_produk`(`transaksi_produk_id`,`transaksi_id`,`produk_id`,`jumlah`) values 
(66,'2002190345500001','2002190002',2),
(67,'2002190345500001','2002190006',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` char(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `hp` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jns_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `kode_pos` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `norek` varchar(30) DEFAULT NULL,
  `ahli_waris` varchar(50) DEFAULT NULL,
  `hubungan` varchar(30) DEFAULT NULL,
  `no_ahli_waris` varchar(25) DEFAULT NULL,
  `hu` varchar(30) DEFAULT NULL,
  `sponsor` varchar(30) DEFAULT NULL,
  `user_img` text,
  `status_anggota` enum('aktif','nonaktif') DEFAULT 'nonaktif',
  `mdd_anggota` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`nama`,`provinsi`,`kabupaten`,`kecamatan`,`alamat`,`hp`,`tempat_lahir`,`tanggal_lahir`,`jns_kelamin`,`agama`,`nik`,`kode_pos`,`nama_bank`,`norek`,`ahli_waris`,`hubungan`,`no_ahli_waris`,`hu`,`sponsor`,`user_img`,`status_anggota`,`mdd_anggota`) values 
('2002040002','hadaaa','DI Yogyakarta','Gunung Kidul','Gedang Sari','jogja','08727272','jogja','1997-01-07','L','islam','2112143243243','57463','BRI','212134','tidak ada','gantung','092018313','member','LX1239766',NULL,'aktif','2020-02-05 04:18:40'),
('2002070001','Superuser',NULL,NULL,NULL,'indramayu',NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nonaktif',NULL),
('2002070002','operator',NULL,NULL,NULL,'indarmayu',NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nonaktif',NULL),
('2002080001','MASRURI',NULL,NULL,NULL,'Jl. Kuwu Sayan Gang Sulaeman No.44 RT.001 RW.001 Desa Dermayu Kecamatan Sindang INDRAMAYU 45223',NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nonaktif',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
