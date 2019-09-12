<?php


session_start();
$sjUsers = file_get_contents(__DIR__ . '/../data/data.json');
// echo $sjUsers;
$jUsers = json_decode($sjUsers);
// if ($_POST) {
//     foreach ($jUsers as $jUser) {
//         $jUser->email = $_POST['emailLogin'];
//         $jUser->password = $_POST['passwordLogin'];
//     }
// }
if ($_POST) {
    $sEmail = $_POST['emailLogin'];
    $sPassword = $_POST['passwordLogin'];
    foreach ($jUsers as $jUser) {

        if (
            $jUser->email == $sEmail &&
            $jUser->password == $sPassword
        ) {

            header('Location: /profile.php');
        }
    }
}
