<?php

$url = "localhost";
$database = "pc_part_store";
$username = "root";
$password = "";

$conn = new mysqli($url, $username, $password, $database);

if ($conn->connect_errno) {
    exit("Konekcija neuspesna: " . $conn->connect_errno);
}