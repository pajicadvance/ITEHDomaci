<?php
require "../dbBroker.php";
require "../model/ram.php";

if (isset($_POST['id']) && isset($_POST['manufacturer_id']) && isset($_POST['model']) && isset($_POST['memory']) && isset($_POST['modules']) && isset($_POST['memorySpeed']) && isset($_POST['memoryType_id'])) {
    $result = RAM::add($_POST['id'], $_POST['manufacturer_id'], $_POST['model'], $_POST['memory'], $_POST['modules'], $_POST['memorySpeed'], $_POST['memoryType_id'], $conn);
    if ($result) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}