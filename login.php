<?php

$active = 'login';

require_once(__DIR__ . '/components/top.php');

session_start();

if ($_SESSION) {
    header('Location: profile.php');
}


?>

<form method="POST" id="frmLogin" action="user/user-login.php">
    <div>
        <h5>Email</h5>
        <input name="emailLogin" type="text" maxlength="345" data-type="email">
        <h5>Password</h5>
        <input name="passwordLogin" type="password" maxlength="20" data-type="string" data-min="6" data-max="20">
    </div>
    <button id="btnLogin" onclick="return login(this)" data-start="LOGIN" data-wait="Connecting ...">
        Login
    </button>

</form>

<?php
require_once(__DIR__ . '/components/bottom.php');
