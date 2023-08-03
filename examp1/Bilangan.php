<?php
echo "Menampilkan Bilangan Bulat</br>";
$i = 1;
while ($i <= 10){
    echo $i . " ";
    $i++;
}

echo  "</br>=======================</br>";

echo "Menampilkan Bilangan Genap</br>";
for($i = 1; $i <=30; $i++){
    if ($i % 2 === 0){
    echo $i . " ";
    }
}

echo  "</br>=======================</br>";
echo "Menampilkan Bilangan Ganjil</br>";

echo "Cara 1 : ";
$bil_ganjil = [1, 3, 5, 7, 9, 11, 13, 15];
foreach($bil_ganjil as $value){
    echo $value . " ";
}

echo "</br>";
//cara 2
echo "Cara 2 : ";
for($a = 1;$a <= 15; $a++){
    if( $a % 2 === 1){
        echo $a . " ";
    }
}

echo  "</br>=======================</br>";
echo "Menampilkan Bilangan Prima</br>";
function isPrime($angka){
    if($angka <=1){
        return false;
    }

    for($i = 2; $i <= sqrt($angka); $i++){
        if($angka % $i === 0){
            return false;
        }
    }

    return true;
}

$awal = 1;
$akhir = 30;

for($i = $awal; $i <= $akhir; $i++){
    if(isPrime($i)){
        echo $i . " ";
    }
}

?>