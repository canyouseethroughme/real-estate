<?php

$sUserName = $_POST['txtFirstName'];
$sUserLastName = $_POST['txtLastName'];
$sUserPassword = $_POST['txtPassword'];
$sUserEmail = $_POST['txtEmail'];

if (
    empty($sUserName) || empty($sUserLastName) || empty($sUserPassword) || empty($sUserEmail)
) {
    echo 'empty inputs';
    exit;
}

if (
    !(strlen($sUserName) >= 2 && strlen($sUserName) <= 20) ||
    !(strlen($sUserLastName) >= 2 && strlen($sUserLastName) <= 20) ||
    !filter_var($sUserEmail, FILTER_VALIDATE_EMAIL) ||
    !(strlen($sUserPassword) >= 6 && strlen($sUserPassword) <= 20)
) {
    echo 'check credentials';
    exit;
}


$sUserActivationKey = bin2hex(random_bytes(4));
$sUserVerified = 0;

if ($_POST) {
    $jUser = new stdClass();
    $jUser->name = $sUserName;
    $jUser->lastName = $sUserLastName;
    $jUser->password = $sUserPassword;
    $jUser->email = $sUserEmail;
    $jUser->activationKey = $sUserActivationKey;
    $jUser->verified = $sUserVerified;
    $sUser = json_encode($jUser, JSON_PRETTY_PRINT);

    $sjData = file_get_contents(__DIR__ . '/../data/data.json');
    $jData = json_decode($sjData);

    $sUserId = bin2hex(random_bytes(16));
    $jData->users->$sUserId = $jUser;

    $sjData = json_encode($jData, JSON_PRETTY_PRINT);

    file_put_contents(__DIR__ . '/../data/data.json', $sjData);

    header('Location: ../login.php');
    include('api-send-activation-email.php');
};
