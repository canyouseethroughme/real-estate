<?php
$active = 'signup';
session_start();

require_once(__DIR__ . '/components/top.php');

if (!$_SESSION['jUser']) {
    header('Location: login.php');
    exit;
}
?>







<div id="<?= $_SESSION['jUser']->id ?>">
    <div class="">

    </div>
    <div class="containerUpdate">
        <label>Update your profile, <?= $_SESSION['jUser']->name ?>.</label>
        <div class="divUpdate">
            <label>Name</label>
            <input data-update="name" type="text" value="<?= $_SESSION['jUser']->name ?>">
            <label>Last name</label>
            <input data-update="lastName" type="text" value="<?= $_SESSION['jUser']->lastName ?>">
            <label>Email</label>
            <input data-update="email" type="text" maxlength="345" data-type="email" value="<?= $_SESSION['jUser']->email ?>">
            <label>Password</label>
            <input data-update="password" type="text" value="<?= $_SESSION['jUser']->password ?>">
            <button type="button" id="btnEditUser">Save changes</button>
            <button onclick="deleteProfile( this )">Delete Profile</button>
        </div>
    </div>
</div>


<script>
    const USER_ID = '<?= $_SESSION['jUser']->id ?>';
</script>

<?php
require_once(__DIR__ . '/components/bottom.php');
?>