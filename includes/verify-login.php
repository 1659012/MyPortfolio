<?php
include 'connect.php';
session_start();
if (isset($_POST['loginRequest'])) {
    $uid = $_POST['user'];
    $pw = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE uid = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $results = $stmt->get_result();
    $row = $results->fetch_all(MYSQLI_ASSOC);
    if (isset($row[0]['password'])) {
        $hash = $row[0]['password'];
    }
    $responseAjax = array();
    if ($results->num_rows === 0) {
        $responseAjax['checkLogin'] = false;
        $responseAjax['info'] = 'User does not exist';
    // } elseif (password_verify($pw, $hash)) {
    } elseif ($pw == $hash) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $uid;
        $responseAjax['checkLogin'] = true;
        $responseAjax['info'] = 'Good to see you again, ' . $uid;
        $responseAjax['user'] = $uid;
    } else {
        $responseAjax['checkLogin'] = false;
        $responseAjax['user'] = $uid;
        $responseAjax['info'] = 'Password is not correct';
    }
    echo json_encode($responseAjax);
}
