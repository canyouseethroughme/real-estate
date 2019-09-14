<?php
session_start();

$sjData = file_get_contents('../data/data.json');
$jData = json_decode($sjData);

$userId = $_POST['id'];
$listName = $_SESSION['jUser']->isAgent ? 'agents' : 'users';

foreach ($_POST as $key => $val) {
    $jData->$listName->$userId->$key = $val;
}

$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('../data/data.json', $sjData);
$_SESSION['jUser'] = $jData->$listName->$userId;
$_SESSION['jUser']->id = $userId;
$_SESSION['jUser']->isAgent = $listName == 'agents';

echo json_encode($jData->$listName->$userId);
