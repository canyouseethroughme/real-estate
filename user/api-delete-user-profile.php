<?php

session_start();

$_SESSION['jUser']->id = $userId;

$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);
echo $sjData;
unset($jData->users->$userId);

$sjData = json_encode($jData);

file_put_contents(__DIR__ . '/../data/data.json', $sjData);

session_destroy();
