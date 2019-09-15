<?php
$active = 'signup';
require_once(__DIR__ . '/components/top.php');

?>
<div class="divLogin">
    <form method="POST" id="frmLogin" action="user/user-signup.php">
        <div class="loginSpan" style="margin-bottom:10px;"><label><span>Sign up user</span></label></div>
        <label>Your first name</label>
        <input type="text" name="txtFirstName" placeholder="Minimum 2 charachters, maximum 20" maxlength="20" data-type="string" data-min="2" data-max="20">
        <label>Your last name</label>
        <input type="text" name="txtLastName" placeholder="Minimum 2 charachters, maximum 20" maxlength="20" data-type="string" data-min="2" data-max="20">
        <label>Your password</label>
        <input type="password" name="txtPassword" placeholder="Minimum 6 charachters, maximum 20" maxlength="20" data-type="string" data-min="6" data-max="20">
        <label>Your email</label>
        <input type="text" name="txtEmail" placeholder="Valid email address" maxlength="345" data-type="email">
        <button id="btnLogin" onclick="return login(this)" data-start="REGISTER" data-wait="Registering ...">Register as user</button>
    </form>
</div>

<?php
require_once(__DIR__ . '/components/bottom.php');
