<?php
// $host = "localhost";
// $user = "root";
// $pw = "";
// $db = "itec2018week8";
// $conn = new mysqli($host, $user, $pw, $db);

// $host = "hoanle.database.windows.net";
// $user = "pzmyS9yKiP";
// $pw = "N6id2BhU0L";
// $db = "pzmyS9yKiP";
// $conn = new mysqli($host, $user, $pw, $db);


$host = "sql12.freesqldatabase.com";
$user = "sql12313010";
$pw = "rtScm7iDFz";
$db = "sql12313010";
$conn = new mysqli($host, $user, $pw, $db);

if ($conn->connect_error) {
    echo "Connection could not be established.<br />";
} else {    
    // echo "Connected successfully" . "<br>";   
}

// Host: sql12.freesqldatabase.com
// Database name: sql12313010
// Database user: sql12313010
// Database password: rtScm7iDFz
// Port number: 3306

// $serverName = "hoanle.database.windows.net"; // update me
// $connectionOptions = array(
//     "Database" => "HoanDb", // update me
//     "Uid" => "hoanle", // update me
//     "PWD" => "$123qwe$" // update me
// );
// Establishes the connection
// $conn = sqlsrv_connect($serverName, $connectionOptions);
// if ($conn) {
//     echo "Connected successfully" . "<br>";   
// } else {
//     echo "Connection could not be established.<br />";
// }
