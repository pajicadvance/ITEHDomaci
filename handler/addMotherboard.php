<?php
require "../dbBroker.php";
require "../model/motherboard.php";

if (isset($_POST['id']) && isset($_POST['manufacturer_id']) && isset($_POST['model']) && isset($_POST['formFactor']) && isset($_POST['socket_id']) && isset($_POST['memoryType_id']) && isset($_POST['memorySlots']) && isset($_POST['maxMemory'])) {
    $result = Motherboard::add($_POST['id'], $_POST['manufacturer_id'], $_POST['model'], $_POST['formFactor'], $_POST['socket_id'], $_POST['memoryType_id'], $_POST['memorySlots'], $_POST['maxMemory'], $conn);
    if ($result) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}