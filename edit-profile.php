<?php
$active = 'signup';
session_start();

require_once(__DIR__ . '/components/top.php');

if (!$_SESSION['jUser']) {
    header('Location: login.php');
    exit;
}
?>



<h1>Edit Profile</h1>


<h1>Hi <?= $_SESSION['jUser']->name ?>.
    Your email address is <?= $_SESSION['jUser']->email ?>
</h1>



<div id="<?= $_SESSION['jUser']->id ?>">
    <input data-update="name" type="text" value="<?= $_SESSION['jUser']->name ?>">
    <input data-update="lastName" type="text" value="<?= $_SESSION['jUser']->lastName ?>">
    <input data-update="email" type="text" maxlength="345" data-type="email" value="<?= $_SESSION['jUser']->email ?>">
    <input data-update="password" type="text" value="<?= $_SESSION['jUser']->password ?>">
    <button type="button" id="btnEditUser">Save changes</button>
</div>

<script>
    const USER_ID = '<?= $_SESSION['jUser']->id ?>';
</script>

<?php
require_once(__DIR__ . '/components/bottom.php');
?>