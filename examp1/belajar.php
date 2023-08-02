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

//array
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
echo "</br>-------------------------- </br>";

//Struktur kendali (Looping)
echo "Ini Perulangan (Looping)</br>";
for ($counter = 10; $counter > 0; $counter--){
    echo "Halo Sofia $counter </br>";
}

echo "</br>-------------------------- </br>";

$motor = ["Tril", "Ninja", "Astrea", "Ontel"];
foreach($motor as $isi){
    echo "Awi mau beli motor $isi </br>";
}

echo "</br>-------------------------- </br>";

//Struktur kendali (Jumping)
echo "Ini Perpindahan (Jumping)</br>";
for($i = 1;$i<20;$i++){
    if($i ==4){
        echo "Looping berhenti pada i = $i</br>";
        continue;
    }else{
        if($i == 13){
            echo "Ini katanya $i angka keramat skip ae lah</br>";
        }
    }
    echo "Nilai i : $i</br>";
}

?>