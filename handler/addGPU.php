<?php
require "../dbBroker.php";
require "../model/gpu.php";

if (isset($_POST['id']) && isset($_POST['manufacturer_id']) && isset($_POST['model']) && isset($_POST['memory']) && isset($_POST['coreClock']) && isset($_POST['memoryClock']) && isset($_POST['tdp'])) {
    $result = GPU::add($_POST['id'], $_POST['manufacturer_id'], $_POST['model'], $_POST['memory'], $_POST['coreClock'], $_POST['memoryClock'], $_POST['tdp'], $conn);
    if ($result) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}