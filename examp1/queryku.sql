-- DDL
-- Data Definition Language
CREATE DATABASE examp1;
DROP TABLE promo;
ALTER TABLE `penjualan` MODIFY 'kode_brg' VARCHAR(10) NOT NULL;
ALTER TABLE `penjualan` MODIFY 'id_pem' VARCHAR(10) NOT NULL;
ALTER TABLE `penjualan` MODIFY 'tgl_beli' DATETIME NOT NULL;

-- DML
-- Data Manipulation Language

UPDATE `barang` SET `harga`='225000', `stok`='60' WHERE kode_brg='S1';
INSERT INTO `pembeli` (`id_pem`, `nama`, `jenis_kelamin`, `alamat`) VALUES
('B03', 'Farhan Erdiansyah', 'L', 'Jl. Teluk Pacitan, Kota Malang'),

DELETE FROM pembeli WHERE `pembeli`.`id_pem` = 'B03';
SELECT * FROM pembeli;
SELECT * FROM penjualan;
SELECT * FROM barang;
SELECT * FROM barang WHERE harga BETWEEN 50000 AND 225000;

SELECT * FROM pembeli WHERE jenis_kelamin='P';
SELECT COUNT(id_pem) FROM pembeli;

-- JOIN
-- JOIN 3 tabel
SELECT pembeli.id_pem, pembeli.nama, penjualan.tgl_beli, barang.nama, penjualan.jml_beli FROM pembeli JOIN penjualan ON pembeli.id_pem = penjualan.id_pem JOIN barang ON barang.kode_brg = penjualan.kode_brg;

-- LEFT JOIN
SELECT barang.kode_brg, barang.nama, penjualan.id_pem, penjualan,tgl_beli FROM barang LEFT JOIN penjualan ON barang.kode_brg = penjualan.kode_brg;

-- RIGHT JOIN
SELECT pembeli.id_pem, pembeli.nama, pembeli.alamat, penjualan.kode_brg, penjualan.jml_beli FROM pembeli RIGHT JOIN penjualan ON pembeli.id_pem = penjualan.id_pem;

--DCL (Data Control Language)
CREATE USER 'Zara'@'localhost' IDENTIFIED BY 'Z@r4w1135';
GRANT CREATE, INSERT, SELECT ON examp1.* TO 'Zara';

--Ini saya ketik di CMD
mysql -u Zara -p
Enter password: *********

--coba hak akses Zara
 INSERT INTO `pembeli` (`id_pem`, `nama`, `jenis_kelamin`, `alamat`) VALUES
    -> ('B03', 'Alwi Assegaf', 'L', 'Jl. Ciganjur, Kota Jakarta'),
    ->  ('B04', 'Aminah Assegaf', 'P', 'Jl. Ciganjur, Kota Jakarta');
SELECT * FROM barang;
DELETE FROM pembeli WHERE `pembeli`.`id_pem` = 'A04';
ERROR 1142 (42000): DELETE command denied to user 'Zara'@'localhost' for table 'pembeli'
-- error karena tidak ada hak akses DELETE untuk user Zara

REVOKE INSERT ON examp1. * FROM 'Zara';

INSERT INTO `pembeli` (`id_pem`, `nama`, `jenis_kelamin`, `alamat`) VALUES
    -> ('B05', 'Anisa yoshida', 'P', 'Jl. Ciganjur, Kota Jakarta');
ERROR 1142 (42000): INSERT command denied to user 'Zara'@'localhost' for table 'pembeli'
-- error karena hak INSERT telah dihapus

--TCL
-- awali dengan sintaks berikut agar bisa menggunakan COMMIT dan ROLLBACK
START TRANSACTION;

--ROLLBACK : untuk mengembalikan database ke bentuk awal sebelum di rollback. Jika mengalami error
 ROLLBACK;

 --COMMIT : Untuk menyimpan tranksaksi secara permanen (untuk transaksi tanpa error)
 COMMIT;

 -- untuk menampilkan data urut dari A sampai Z
 SELECT * FROM barang ORDER BY nama ASC;

 -- untuk menampilkan data urut dari Z sampai A
 SELECT * FROM barang ORDER BY nama DESC;

 -- SUBQUERY
SELECT * FROM pembeli WHERE jenis_kelamin = (SELECT jenis_kelamin FROM pembeli WHERE nama = "Fahid Anwar");
SELECT nama FROM barang WHERE EXISTS (SELECT * FROM penjualan WHERE kode_brg = barang.kode_brg);

 -- VIEW
CREATE VIEW VGETJual AS SELECT * FROM penjualan;
CREATE VIEW VJoin AS SELECT barang.kode_brg, barang.nama, penjualan.id_pem, penjualan.tgl_beli FROM barang LEFT JOIN(pembeli LEFT JOIN penjualan ON pembeli.id_pem = penjualan.id_pem) ON barang.kode_brg = penjualan.kode_brg WHERE penjualan.kode_brg IS NULL;
 --kode di atas untuk mengetahui barang yang belum terjual saat ini

 -- TRIGGER
 -- ketika ada data yang diinsertkan ke tabel penjualan maka stok pada tabel barang akan berkurang
 
 CREATE DEFINER=`root`@`localhost` TRIGGER `beli` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN UPDATE barang SET stok = stok - NEW.jml_beli WHERE kode_brg = NEW.kode_brg; END
CREATE DEFINER=`root`@`localhost` TRIGGER `delete-barang` AFTER DELETE ON `barang` FOR EACH ROW BEGIN DELETE FROM penjualan WHERE kode_brg = old.kode_brg; END

-- STORED PROCEDURE
DELIMITER $$
CREATE PROCEDURE getAddress()
BEGIN
    SELECT * FROM pembeli WHERE alamat = 'Jl. Ciganjur, Kota Jakarta';
END$$
--sintaks untuk memanggil
CALL getAddress(); 

--Stored Function
CREATE FUNCTION getStatus ( harga float(10.2) ) RETURNS VARCHAR(10) DETERMINISTIC BEGIN DECLARE status VARCHAR(10); IF harga<50000 THEN SET status = 'Murah'; ELSEIF harga>=50000 AND harga<75000 THEN SET status = 'Sedang'; ELSE SET status = 'Mahal'; END IF; RETURN(status); END;

--sintaks untuk memanggil
SLECT nama, harga, getStatus(harga) AS status FROM barang;