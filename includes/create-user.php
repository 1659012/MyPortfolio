<?php
include 'connect.php';
session_start();
if (isset($_POST['create_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pw1 = $_POST['pw1'];
    $pw2 = $_POST['pw2'];
    $date = date('Y-m-d H:i:s');
    $level = 'newbie';
    $stmt = $conn->prepare("SELECT * FROM user WHERE uid = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $results = $stmt->get_result();
    $responseAjax = array();
    if ($results->num_rows > 0) {
        $responseAjax['checkCreate'] = false;
        $responseAjax['info'] = "That user name is already taken!";
    } else {
        $hash = password_hash($pw1, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user VALUES (NULL, ?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name, $uid, $email, $hash, $level, $date);
        $stmt->execute();
        $responseAjax['checkCreate'] = true;
        $responseAjax['info'] = "Your account has been created $uid!";
        $responseAjax['user'] = $uid;
        $_SESSION['login'] = true;
        $_SESSION['user'] = $uid;
    }

    echo json_encode($responseAjax);
}
