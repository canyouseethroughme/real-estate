<?php

$propertyId = $_POST['id'];

if (
    empty($propertyId)
) {
    http_response_code(400);
    echo 'Missing required fields';
    exit;
}

$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);

unset($jData->properties->$propertyId);

$sjData = json_encode($jData, JSON_PRETTY_PRINT);
$success = file_put_contents(__DIR__ . '/../data/data.json', $sjData);

echo ('done');
