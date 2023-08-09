<?php
require_once "sinauOOP.php";
class Bos{
    var string $name;
    var string $title;
    function sayHalo(string $name){
        echo "Halo $name, kenalin ini Bos $this->name </br>";
    }

    public function __construct(string $name = "", string $title = "Bos"){
        $this->name = $name;
        $this->title = $title;
    }

 }

 
 class karyawan extends Manager{
    function sayHalo(string $name){
        echo "Assalamu'alaikum $name, kenalin ini karyawan $this->name </br>";
    }
 }
?>