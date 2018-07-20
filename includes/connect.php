<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "itec2018week8";
$conn = new mysqli($host, $user, $pw, $db);

// $host = "sql12.freemysqlhosting.net";
// $user = "sql12246939";
// $pw = "wVjgFsmP9N";
// $db = "sql12246939";
// $conn = new mysqli($host, $user, $pw, $db);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    // echo "Connected successfully" . "<br>";
}
