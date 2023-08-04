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


SELECT * FROM pembeli WHERE jenis_kelamin='P';
SELECT COUNT(id_pem) FROM pembeli;

-- JOIN
-- JOIN 3 tabel
SELECT pembeli.id_pem, pembeli.nama, penjualan.tgl_beli, barang.nama, penjualan.jml_beli FROM pembeli JOIN penjualan ON pembeli.id_pem = penjualan.id_pem JOIN barang ON barang.kode_brg = penjualan.kode_brg;

-- LEFT JOIN
SELECT barang.kode_brg, barang.nama, penjualan.id_pem, penjualan,tgl_beli FROM barang LEFT JOIN penjualan ON barang.kode_brg = penjualan.kode_brg;

-- RIGHT JOIN
SELECT pembeli.id_pem, pembeli.nama, pembeli.alamat, penjualan.kode_brg, penjualan.jml_beli FROM pembeli RIGHT JOIN penjualan ON pembeli.id_pem = penjualan.id_pem;