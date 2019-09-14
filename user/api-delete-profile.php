<?php

session_start();


$userId = $_SESSION['jUser']->id;
$listName = $_SESSION['jUser']->isAgent ? 'agents' : 'users';

$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);

unset($jData->$listName->$userId);
$sjData = json_encode($jData);

file_put_contents(__DIR__ . '/../data/data.json', $sjData);

session_destroy();
