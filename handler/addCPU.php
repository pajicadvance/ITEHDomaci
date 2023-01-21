<?php
require "../dbBroker.php";
require "../model/cpu.php";

if (isset($_POST['id']) && isset($_POST['manufacturer_id']) && isset($_POST['model']) && isset($_POST['coreClock']) && isset($_POST['coreCount']) && isset($_POST['tdp']) && isset($_POST['socket_id']) && isset($_POST['memoryType_id'])) {
    $result = CPU::add($_POST['id'], $_POST['manufacturer_id'], $_POST['model'], $_POST['coreClock'], $_POST['coreCount'], $_POST['tdp'], $_POST['socket_id'], $_POST['memoryType_id'], $conn);
    if ($result) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}