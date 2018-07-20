<?php
session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['user'] = '';
}
// var_dump($_SESSION);

include 'connect.php';
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora|Nunito:300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/myCSS.css">
    <title>My Portfolio</title>

  </head>
  <body>

<?php
include 'navbar.php';

?>
