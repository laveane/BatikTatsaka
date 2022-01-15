

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","admin","$2y$10$AIy0X1Ep6alaHDTofiChGeqq7k/d1Kc8vKQf1JZo0mKrzkkj6M626");



CREATE TABLE `bom_produk` (
  `kode_bom` varchar(100) NOT NULL,
  `kode_bk` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `kebutuhan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;




CREATE TABLE `customer` (
  `kode_customer` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO customer VALUES("C0002","Rafi Akbar","a.rafy@gmail.com","rafi","$2y$10$/UjGYbisTPJhr8MgmT37qOXo1o/HJn3dhafPoSYbOlSN1E7olHIb.","0856748564");
INSERT INTO customer VALUES("C0003","holi","izuddinkhubi@gmail.com","holi","$2y$10$PYm57GT4NRw5BwElvUrmfu6xR9KB2xIWp8OqgLJ1iih4eSxDYBawG","2323");
INSERT INTO customer VALUES("C0004","Kain","izuddinkhubi@gmail.com","kain","$2y$10$0mJr/adDSREVRt23iBYkfe4mspCHeZBpCq9hL8MXw567fJd.FCZsi","12344");
INSERT INTO customer VALUES("C0005","Kusuma","izuddinkhubi@gmail.com","kusuma","$2y$10$q9LiONu7RQSgAJJSFfTedOrmiHUMbMTaTi04sfvOSA1omsRhHULjK","7878787");
INSERT INTO customer VALUES("C0006","Rafi","Rafy@gmail.com","rafymrx","$2y$10$dOlBFaimo9eDptB/cpvU1.8qWN2MmMK5DDZacbZgKAxwEHb5LWbtm","087804616097");
INSERT INTO customer VALUES("C0007","Muhammad Yunus Almeida","muhammadyunusalmeida@gmail.com","yunusalmeida","$2y$10$SBv5hQ8px.1DQ2lonMjaN.ZxhoMqdUoNAwgUAMcCzSs06fs8QGCuK","+62 851-6136-3585");
INSERT INTO customer VALUES("C0008","Laveane Hariyanto","laveaneha@gmail.com","laveaneha","$2y$10$uLvMihTNubE6ZW9R1.ZVTu9nNPagJ.B2kJoWUlWHxEzsnOaQKYLza","082139434841");



CREATE TABLE `inventory` (
  `kode_bk` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`kode_bk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO inventory VALUES("M0001","Kain","96","Kodi","8000","2020-10-05");
INSERT INTO inventory VALUES("M0002","Pewarna","500","ml","200","2020-10-04");



CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_customer` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` varchar(200) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `berat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO produk VALUES("P0001","Batik Tulis Arang","61b44d2310eca.jpg","Batik Tulis Arang
			","300000","l","50");
INSERT INTO produk VALUES("P0002","Batik Tulis Full","61b44e266ea1b.jpg","Batik Tulis Full
			","300000","l","50");
INSERT INTO produk VALUES("P0003","Tulis Full Motif Kopi Pecah","61b44e6dc8ee9.jpg","				Batik Tulis Full Motif Kopi Pecah			","300000","l","");
INSERT INTO produk VALUES("P0004","Tulis Full Khas Banyuwangi","61b4500638ab3.jpg","Batik Tulis Full Khas Banyuwangi			","300000","l","50");
INSERT INTO produk VALUES("P0005","Tulis Arang v2","61b47bba7d00a.jpg","Batik Tulis Arang","300000","l","50");
INSERT INTO produk VALUES("P0006","Syal Batik Tatsaka","61b47d25045e5.jpg","Syal Batik asli Tatsaka","50000","l","20");
INSERT INTO produk VALUES("P0007","Pouch Batik","61b47d9173401.jpg","Pouch","35000,40000,50000","s,m,l","20");



CREATE TABLE `produksi` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(200) NOT NULL,
  `kode_customer` varchar(200) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_pos` varchar(200) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket_ekspedisi` varchar(200) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `etd_ekspedisi` varchar(200) NOT NULL,
  `terima` varchar(200) NOT NULL,
  `tolak` varchar(200) NOT NULL,
  `cek` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `timess` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

INSERT INTO produksi VALUES("39","INV0001","C0005","P0001","Mega Mendung","2","20000","m","0","Oct 12, 2020 02:33:09","Papua Barat","Teluk Wondama","Jl Tanah Merah Indah 1 No 10 C","60129","jne","OKE 179,000 5-9 Hari","179000","5-9","1","0","0","40006","01:33:09","5f83533300a31.jpg","2020-10-12");
INSERT INTO produksi VALUES("40","INV0002","C0005","P0001","Mega Mendung","1","20000","m","0","Oct 12, 2020 02:53:28","Jawa Timur","Surabaya","Jl Tanah Merah Indah 1 No 10 C","60129","jne","REG 7,000 2-3 Hari","7000","2-3","1","0","0","20003","01:53:28","5f835ea041f26.jpg","2020-10-12");
INSERT INTO produksi VALUES("41","INV0003","C0006","P0001","Mega Mendung","2","20000","m","0","Oct 12, 2020 08:26:53","Jawa Timur","Surabaya","Jl Tanah Merah Indah 1 No 10 C","60129","jne","REG 7,000 2-3 Hari","7000","2-3","1","0","0","100009","07:26:53","5f83a34f0d970.jpg","2020-10-12");
INSERT INTO produksi VALUES("42","INV0003","C0006","P0003","Batik Sarimbit Kuning","1","30000","l","0","Oct 12, 2020 08:26:53","Jawa Timur","Surabaya","Jl Tanah Merah Indah 1 No 10 C","60129","jne","REG 7,000 2-3 Hari","7000","2-3","1","0","0","100009","07:26:53","5f83a34f0d970.jpg","2020-10-12");
INSERT INTO produksi VALUES("43","INV0003","C0006","P0002","Batik Sarimbit ","1","30000","xl","0","Oct 12, 2020 08:26:53","Jawa Timur","Surabaya","Jl Tanah Merah Indah 1 No 10 C","60129","jne","REG 7,000 2-3 Hari","7000","2-3","1","0","0","100009","07:26:53","5f83a34f0d970.jpg","2020-10-12");
INSERT INTO produksi VALUES("47","INV0004","C0006","P0001","Mega Mendung","1","20000","m","0","Oct 12, 2020 09:50:17","Jawa Timur","Surabaya","Jl Tanah Merah Indah 1 No 10 C","60129","jne","REG 7,000 2-3 Hari","7000","2-3","1","0","0","20009","08:50:17","5f83b6a1f19c8.jpg","2020-10-12");
INSERT INTO produksi VALUES("48","INV0005","C0006","P0003","Batik Sarimbit Kuning","1","30000","l","0","Oct 13, 2020 10:26:03","Jawa Timur","Surabaya","Jl Tanah Merah Indah 1 No 10 C","60129","jne","REG 7,000 2-3 Hari","7000","2-3","1","0","0","30005","09:26:03","","2020-10-13");
INSERT INTO produksi VALUES("49","INV0006","C0007","P0002","Batik Sarimbit ","5","30000","xl","0","Dec 10, 2021 06:10:53","DKI Jakarta","Jakarta Timur","Jalan raya","","tiki","REG 15,000 3 Hari","15000","3","1","0","0","150003","05:10:53","","2121-12-10");
INSERT INTO produksi VALUES("50","INV0007","C0007","P0002","Batik Sarimbit ","4","15000","s","Pesanan Baru","Dec 10, 2021 08:18:22","Jawa Timur","Probolinggo","Jalan Raya","67236","jne","OKE 7,000 2-3 Hari","7000","2-3","0","0","0","60008","07:18:22","61b2f142b6129.jpeg","2121-12-10");
INSERT INTO produksi VALUES("51","INV0008","C0007","P0002","Batik Tulis Full","1","300000","l","Pesanan Baru","Dec 11, 2021 16:38:31","Jawa Timur","Probolinggo","Jalan raya","67236","tiki","ECO 7,000 5 Hari","7000","5","0","0","0","340006","15:38:31","","2121-12-11");
INSERT INTO produksi VALUES("52","INV0008","C0007","P0007","Pouch Batik","1","40000","m","Pesanan Baru","Dec 11, 2021 16:38:31","Jawa Timur","Probolinggo","Jalan raya","67236","tiki","ECO 7,000 5 Hari","7000","5","0","0","0","340006","15:38:31","","2121-12-11");
INSERT INTO produksi VALUES("53","INV0009","C0008","P0007","Pouch Batik","1","0","s","Pesanan Baru","Dec 13, 2021 10:17:59","","","Jl.yossudarso no.57","68486","","","0","","0","0","0","5","09:17:59","","2121-12-13");
INSERT INTO produksi VALUES("54","INV0009","C0008","P0006","Syal Batik Tatsaka","2","0","l","Pesanan Baru","Dec 13, 2021 10:17:59","","","Jl.yossudarso no.57","68486","","","0","","0","0","0","5","09:17:59","","2121-12-13");
INSERT INTO produksi VALUES("55","INV0010","C0008","P0003","Tulis Full Motif Kopi Pecah","1","300000","l","Pesanan Baru","Dec 13, 2021 11:15:52","","","Jl.yossudarso no.57","68486","jne","-- Pilih Paket --","0","","0","0","0","340006","10:15:52","","2121-12-13");
INSERT INTO produksi VALUES("56","INV0010","C0008","P0007","Pouch Batik","1","40000","m","Pesanan Baru","Dec 13, 2021 11:15:52","","","Jl.yossudarso no.57","68486","jne","-- Pilih Paket --","0","","0","0","0","340006","10:15:52","","2121-12-13");
INSERT INTO produksi VALUES("57","INV0011","C0008","P0004","Tulis Full Khas Banyuwangi","1","300000","l","Pesanan Baru","Dec 27, 2021 10:47:15","","","Jl.yossudarso no.57","68486","jne","-- Pilih Paket --","0","","0","0","0","300002","09:47:15","61c97ee4e8e3b.jpg","2121-12-27");
INSERT INTO produksi VALUES("58","INV0012","C0008","P0002","Batik Tulis Full","1","300000","l","Pesanan Baru","Jan 02, 2022 18:15:53","Jawa Timur","Banyuwangi","Jl.yossudarso no.57","68486","pos","Paket Kilat Khusus 8,000 2 HARI Hari","8000","2 HARI","0","0","0","300001","17:15:53","","2222-01-02");
INSERT INTO produksi VALUES("59","INV0013","C0008","P0001","Batik Tulis Arang","1","300000","l","Pesanan Baru","Jan 07, 2022 15:17:59","Jawa Timur","Banyuwangi","Jl.yossudarso no.57","68486","jne","OKE 7,000 2-3 Hari","7000","2-3","0","0","0","300005","14:17:59","61d83d9aa42c0.jpg","2022-01-07");
INSERT INTO produksi VALUES("60","INV0014","C0008","P0007","Pouch Batik","3","40000","m","Pesanan Baru","Jan 14, 2022 16:57:23","Jawa Timur","Banyuwangi","Jl.yossudarso no.57","68486","jne","OKE 7,000 2-3 Hari","7000","2-3","0","0","0","420005","15:57:23","61e19063a13c1.jpg","2022-01-14");
INSERT INTO produksi VALUES("61","INV0014","C0008","P0001","Batik Tulis Arang","1","300000","l","Pesanan Baru","Jan 14, 2022 16:57:23","Jawa Timur","Banyuwangi","Jl.yossudarso no.57","68486","jne","OKE 7,000 2-3 Hari","7000","2-3","0","0","0","420005","15:57:23","61e19063a13c1.jpg","2022-01-14");



;




CREATE TABLE `report_cancel` (
  `id_report_cancel` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_cancel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `report_inventory` (
  `id_report_inv` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bk` varchar(100) NOT NULL,
  `nama_bahanbaku` varchar(100) NOT NULL,
  `jml_stok_bk` int(11) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  PRIMARY KEY (`id_report_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `report_omset` (
  `id_report_omset` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_omset` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_omset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `report_produksi` (
  `id_report_prd` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_prd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `report_profit` (
  `id_report_profit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bom` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `total_profit` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_profit`),
  UNIQUE KEY `kode_bom` (`kode_bom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


