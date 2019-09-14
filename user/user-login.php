<?php

// VALIDATION
(function () {
    if (empty($_POST['emailLogin']) || !filter_var($_POST['emailLogin'], FILTER_VALIDATE_EMAIL));
    return;

    if (empty($_POST['passwordLogin']) || strlen($_POST['passwordLogin']) < 4 || strlen($_POST['passwordLogin']) > 20);
    return;
})();
// ---------

session_start();

$sjUsers = file_get_contents(__DIR__ . '/../data/data.json');
$jUsers = json_decode($sjUsers);


if ($_POST) {
    $sEmail = $_POST['emailLogin'];
    $sPassword = $_POST['passwordLogin'];

    $listName = $_POST['isAgent'] ? 'agents' : 'users';

    foreach ($jUsers->$listName as $userId => $jUser) {
        if (
            $jUser->email == $sEmail &&
            $jUser->password == $sPassword
        ) {
            session_start();
            $_SESSION['jUser'] = $jUser;
            $_SESSION['jUser']->id = $userId;
            if ($_POST['isAgent']) {
                $_SESSION['jUser']->isAgent = true;
            }


            header('Location: ../profile.php');
            exit;
        } else {
            header('Location: ../login.php');
        }
    }
}
