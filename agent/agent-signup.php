<?php

include(__DIR__ . '/../functions/functions.php');

$sAgentName = $_POST['txtFirstName'];
$sAgentLastName = $_POST['txtLastName'];
$sAgentPassword = $_POST['txtPassword'];
$sAgentEmail = $_POST['txtEmail'];
$sAgentPhoneNumber = $_POST['txtPhoneNumber'];

if (
    empty($sAgentName) || empty($sAgentLastName) || empty($sAgentPassword) || empty($sAgentEmail)
) {

    exit;
}

if (
    !(strlen($sAgentName) >= 2 && strlen($sAgentName) <= 20) ||
    !(strlen($sAgentLastName) >= 2 && strlen($sAgentLastName) <= 20) ||
    !filter_var($sAgentEmail, FILTER_VALIDATE_EMAIL) ||
    !(strlen($sAgentPassword) >= 6 && strlen($sAgentPassword) <= 20)

) {

    exit;
}

$sAgentActivationKey = bin2hex(random_bytes(4));
$sAgentVerified = 0;

if ($_POST) {
    $jAgent = new stdClass();
    $jAgent->name = $sAgentName;
    $jAgent->lastName = $sAgentLastName;
    $jAgent->password = $sAgentPassword;
    $jAgent->email = $sAgentEmail;
    $jAgent->phoneNumber = $sAgentPhoneNumber;
    $jAgent->activationKey = $sAgentActivationKey;
    $jAgent->verified = $sAgentVerified;
    $sAgent = json_encode($jAgent, JSON_PRETTY_PRINT);

    $sjData = file_get_contents(__DIR__ . '/../data/data.json');

    $jData = json_decode($sjData);

    $sAgentId = bin2hex(random_bytes(16));
    $jData->agents->$sAgentId = $jAgent;

    $sjData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . '/../data/data.json', $sjData);

    include('../user/api-send-activation-email.php');
    sendActivationEmail($sAgentId, $sAgentEmail, $sAgentActivationKey, true);

    header('Location: ../login.php');
}
