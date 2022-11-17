<?php
$host = "localhost";
$db = "cart_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_errno) {
    exit("Konekcija nije uspela $conn->connect_error err kod $conn->connect_errno");
}
?>