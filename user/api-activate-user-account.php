<?php


$sKey = $_GET['key'];
$sUserId = $_GET['id'];


if ($jData->users->$sUserId->verified == 1) {
    echo 'already verified';
    exit;
}

$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);


echo "<h5> Welcome {$jData->users->$sUserId->name}.</h5>
        <div>Log in to your account by clicking 
            <a href='../login.php>here</a>
        </div>
";


//convert the 0 into 1


if ($jData->users->$sUserId->activationKey == $sKey && $jData->users->$sUserId->verified == 0) {
    $jData->users->$sUserId->verified = 1;
}
$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('../data/data.json', $sjData);
header('Location: ../profile.php');
