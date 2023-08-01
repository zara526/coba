<?php
//Struktur Kendali perulangan
echo "Ini Struktur Kendali </br>";
echo "-------------------------- </br>";

$nilai = 70;
echo "Nilai Ujian Anda : " . $nilai;

if($nilai >=75 ){
    echo "</br> Anda lulus </br>";
}else{
    echo "</br> Anda tidak lulus </br>";
}

echo "-------------------------- </br>";

//Function
echo "ini Percobaan Function</br>";
function sayHello($nama){
    echo "Ahlan wa sahlan $nama </br>";
}

sayHello("Alwi");

echo "</br>-------------------------- </br>";

echo "Ini Array";
$data = [1,2,3];

print_r($data);
echo "</br>";

$makanan= [
    "Soto" => "Lamongan",
    "Pecel" => "Blitar",
    "Bakso" => "Malang"
];

print_r($makanan);

?>