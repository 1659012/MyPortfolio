<div class="main-body">
<div class="main-content">
<?php
if ($_SESSION['login']) {
    echo '<h1 class="login-info" id="checkLogin" user="' . $_SESSION['user'] . '">Welcome to my Portfolio, ' . $_SESSION['user'] . '</h1>';
} else {
    echo '<h1 class="login-info">Please <a href="login.php"> login </a>to view contents</h1>' .
        '<p class="login-info-acc">(Available account: <strong>itecky</strong> pass: <strong>itec</strong> )</p>';
}
?>
</div>
</div>