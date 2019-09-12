<?php
$active = 'signup';
require_once(__DIR__ . '/components/top.php');

?>

<form method="POST" id="frmLogin" action="user/user-signup.php">
    <p>Your first name</p>
    <input type="text" name="txtFirstName" placeholder="Minimum 2 charachters, maximum 20" maxlength="20" data-type="string" data-min="2" data-max="20">
    <p>Your last name</p>
    <input type="text" name="txtLastName" placeholder="Minimum 2 charachters, maximum 20" maxlength="20" data-type="string" data-min="2" data-max="20">
    <p>Your password</p>
    <input type="password" name="txtPassword" placeholder="Minimum 6 charachters, maximum 20" maxlength="20" data-type="string" data-min="6" data-max="20">
    <p>Your email</p>
    <input type="text" name="txtEmail" placeholder="Valid email address" maxlength="345" data-type="email">
    <button id="btnLogin" onclick="return login(this)" data-start="REGISTER" data-wait="Registering ...">Register as user</button>
</form>


<?php
require_once(__DIR__ . '/components/bottom.php');
