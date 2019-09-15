<?php

$active = 'login';

require_once(__DIR__ . '/components/top.php');

session_start();

if ($_SESSION['jUser']->email) {
    header('Location: profile.php');
}


?>
<div class="divLogin">
    <form method="POST" id="frmLogin" action="user/user-login.php">
        <div class="loginSpan"><label><span> Login</span></label><br>
            <input id="isUser" type="checkbox" style="width:10px; margin: 25px 0 10px 0">
            <label>as user</label>

            <input id="isAgent" name="isAgent" type="checkbox" style="width:10px">
            <label for="isAgent">or agent</label>
        </div>
        <label>Email</label>
        <input name="emailLogin" type="text" maxlength="345" data-type="email" placeholder="Type registered email address">
        <label>Password</label>
        <input name="passwordLogin" type="password" maxlength="20" data-type="string" data-min="6" data-max="20" placeholder="Type password">

        <button id="btnLogin" onclick="return login(this)" data-start="LOGIN" data-wait="Connecting ...">
            Login
        </button>


    </form>
</div>
<?php
require_once(__DIR__ . '/components/bottom.php');
