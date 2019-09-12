<?php


session_start();

$sjUsers = file_get_contents(__DIR__ . '/../data/data.json');
$jUsers = json_decode($sjUsers);


if ($_POST) {
    $sEmail = $_POST['emailLogin'];
    $sPassword = $_POST['passwordLogin'];

    foreach ($jUsers->users as $userId => $jUser) {
        if (
            $jUser->email == $sEmail &&
            $jUser->password == $sPassword
        ) {
            session_start();
            $_SESSION['jUser'] = $jUser;

            header('Location: ../profile.php');
            exit;
        } else {
            header('Location: ../login.php');
        }
    }
}
