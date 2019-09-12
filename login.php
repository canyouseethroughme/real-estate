<?php

$active = 'login';

require_once(__DIR__ . '/components/top.php');

session_start();

if ($_SESSION) {
    header('Location: profile.php');
}

if ($_POST) {
    $sjUsers = file_get_contents(__DIR__ . '/data/data.json');
    $jUsers = json_decode($sjUsers);

    foreach ($jUsers as $jUser) {
        if (
            $jUser->email == $_POST['email'] &&
            $jUser->password == $_POST['password']
        ) {
            header('Location: profile.php');
        }
    }
}

?>

<form method="POST" id="frmLogin">
    <div>
        <h5>Email</h5>
        <input name="email" type="text" maxlength="345" data-type="email">
        <h5>Password</h5>
        <input name="password" type="password" maxlength="20" data-type="string" data-min="6" data-max="20">
    </div>
    <button id="btnLogin" onclick="return login(this)" data-start="LOGIN" data-wait="Connecting ...">
        Login
    </button>

</form>

<?php
require_once(__DIR__ . '/components/bottom.php');
