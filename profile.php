<?php

$active = 'signup';

require_once(__DIR__ . '/components/top.php');
?>




<?php
session_start();


if ($_SESSION['jUser']->email) { ?>
    <div class="containerProfile">
        <div class="profileDiv">
            <h2 style="margin-bottom: 20px;">Welcome, <?= $_SESSION['jUser']->name ?>.</h2>

            <h3 style="margin-bottom: 10px">
                If you want to edit your profile, click on the button bellow.
            </h3>
            <a href="edit-profile.php"><Button>Edit profile</Button></a>
        </div>
    </div>






<?php } else {
    header('Location: ./login.php');
}
?>

<?php
require_once(__DIR__ . '/components/bottom.php');
