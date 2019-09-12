<?php

$active = 'signup';

require_once(__DIR__ . '/components/top.php');

if ($_SESSION['jUser']->email) {
    echo "Hi {$_SESSION['jUser']->name}. Your email address is {$_SESSION['jUser']->email}";
} else {
    header('Location: ./login.php');
}
?>

<h1>Profile</h1>

<?php
require_once(__DIR__ . '/components/bottom.php');
