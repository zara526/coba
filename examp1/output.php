<?php
require_once "sinauOOP.php";

$orang = new Orang("Alwi", "Ciganjur");
$orang->name = "Alwi";
$orang->address = "Ciganjur, Jaksel";
$orang->age = "17";

 var_dump($orang);

echo "</br> Nama : $orang->name </br>";
echo "Alamat : $orang->address </br>";
echo "Umur : $orang->age </br>";
$orang->sayHello(null);

//constanta
define("APPLICATION", "belajar php OOP");
const APP_VERSION = "3.5.0";

echo APPLICATION . "</br>";
echo APP_VERSION . "</br>";
echo Orang::AUTHOR;
$orang->info();

//constructor
$orang2 = new Orang("Azka", "Malang");
print_r($orang2);

//destructor
$orang3 = new Orang("Zara", "Malang");

echo "</br>Program selesai</br>";

//coba output untuk inheritance
$manager = new Manager();
$manager->name = "Aminah";
$manager->sayHalo("Anisa");

$pg = new pegawai();
$pg->name = "Unyil";
$pg->sayHalo("Usro'");
?>