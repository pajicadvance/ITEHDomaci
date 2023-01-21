<?php
require "../dbBroker.php";
require "../model/cpu.php";
require "../model/gpu.php";
require "../model/ram.php";
require "../model/motherboard.php";

if (isset($_POST['id']) && isset($_POST['tableName'])){
    if ($_POST['tableName'] == "cpu")
        $result = CPU::deleteById($_POST['id'], $conn);
    else if ($_POST['tableName'] == "gpu")
        $result = GPU::deleteById($_POST['id'], $conn);
    else if ($_POST['tableName'] == "ram")
        $result = RAM::deleteById($_POST['id'], $conn);
    else if ($_POST['tableName'] == "mobo")
        $result = Motherboard::deleteById($_POST['id'], $conn);
    
    if($result){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}