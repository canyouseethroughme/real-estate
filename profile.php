<?php

$active = 'login';

require_once(__DIR__ . '/components/top.php');

session_start();
if ($_SESSION) {
    echo "Hi {$_SESSION['jUser']->name}. Your email address is {$_SESSION['jUser']->email}";
    echo '<a href="user/user-logout.php">Logout</a>';
} else {
    header('Location: /../login.php');
}
?>

<h1>Profile</h1>

<?php
require_once(__DIR__ . '/components/bottom.php');
