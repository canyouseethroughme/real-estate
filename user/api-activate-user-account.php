<?php


$sKey = $_GET['key'];
$sUserId = $_GET['id'];
$isAgent = $_GET['isAgent'] == '1';

$listName = $isAgent ? 'agents' : 'users';

if ($jData->$listName->$sUserId->verified == 1) {
    echo 'already verified';
    exit;
}

$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);


echo "<h5> Welcome {$jData->$listName->$sUserId->name}.</h5>
        <div>Log in to your account by clicking 
            <a href='../login.php>here</a>
        </div>
";


//convert the 0 into 1


if ($jData->$listName->$sUserId->activationKey == $sKey && $jData->$listName->$sUserId->verified == 0) {
    $jData->$listName->$sUserId->verified = 1;
}
$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('../data/data.json', $sjData);
header('Location: ../profile.php');
