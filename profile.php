<?php

$active = 'signup';

require_once(__DIR__ . '/components/top.php');
?>


<h1>Profile</h1>

<?php
if ($_SESSION['jUser']->email) { ?>


    <h1>Hi <?= $_SESSION['jUser']->name ?>.
        Your email address is <?= $_SESSION['jUser']->email ?>
        Edit your profile <a href="edit-profile.php"><Button>Click me</Button></a>
    </h1>







<?php } else {
    header('Location: ./login.php');
}
?>

<?php
require_once(__DIR__ . '/components/bottom.php');
