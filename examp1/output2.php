<?php
require_once  "namespace.php";
require_once "overriding.php";
//Keyword USE dengan Alias
//Group USE Declaration

use Data\satu\ {konflik as konflik1, konflik as konflik2};
use function Helper\{helpMe as help};
use function Helper\helpMe;
use  const Helper\APPLICATION;

$konflik1 = new Data\satu\konflik();
$konflik2 = new Data\dua\konflik();

echo Helper\APPLICATION . "</br>";

Helper\helpMe();

echo "</br>====================</br>";

//setelah Import dengan USE Keyword
$konflik3 = new konflik1();
$konflik4 = new konflik2();

echo "</br>" . helpMe();
echo  APPLICATION . "</br>";

echo "</br>====================</br>";
//setelah Group USE Declaration
$konflik1 = new konflik1();
$konflik = new konflik2();

help();

echo "</br>====================</br>";
echo "Ini Output Overriding</br>";

$bos = new Bos();
$bos->name = "Alwi";
$bos->sayHalo("Zara");

$ky = new karyawan();
$ky->name = "Haidar";
$ky->sayHalo("Alana");

?>