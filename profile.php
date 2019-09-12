<?php

$active = 'signup';

require_once(__DIR__ . '/components/top.php');
?>


<h1>Profile</h1>

<?php
if ($_SESSION['jUser']->email) { ?>


    <h1>Hi <?= $_SESSION['jUser']->name ?>.
        Your email address is <?= $_SESSION['jUser']->email ?>
    </h1>

    <div>
        <form action="" method="POST">
            <input type="text">
        </form>
    </div>



<?php } else {
    header('Location: ./login.php');
}
?>

<?php
require_once(__DIR__ . '/components/bottom.php');
