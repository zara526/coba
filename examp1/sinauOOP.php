<?php
 class Orang {

    const AUTHOR = "zarawiicu_";
    var string $name;
    var string $address;
    var int $age;

    function sayHello(?string $name){
        if(is_null($name)){
        echo "Hola, nama saya $this->name" . "</br>";
        }else{
            echo "Hola $name, nama saya $this->name" . "</br>";
        }
    }

    function info(){
        echo "Author : " . self::AUTHOR . "</br>";
    }

    public function __construct(string $name, ?string $address){
        $this->name = $name;
        $this->address = $address;
    }

    public function __destruct(){
        echo "</br>Object orang {$this->name} is destroyed</br>";
    }
    
 }

 class Manager{
    var string $name;
    function sayHalo(string $name){
        echo "Halo $name, kenalin saya $this->name </br>";
    }
 }

 //inheritance (Pewarisan)
 class pegawai extends Manager{

 }
?>