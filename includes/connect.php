<?php
// $host = "localhost";
// $user = "root";
// $pw = "";
// $db = "itec2018week8";
// $conn = new mysqli($host, $user, $pw, $db);

$host = "remotemysql.com";
$user = "pzmyS9yKiP";
$pw = "N6id2BhU0L";
$db = "pzmyS9yKiP";
$conn = new mysqli($host, $user, $pw, $db);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    // echo "Connected successfully" . "<br>";
}
