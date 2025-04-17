<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "inventaris";

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

