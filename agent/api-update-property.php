<?php

$propertyId = $_POST['id'];
$propertyPrice = $_POST['price'];
$propertyBeds = $_POST['bedrooms'];
$propertyBath = $_POST['bathrooms'];
$propertySqm = $_POST['sqm'];
$propertyImage = $_FILES['image'];

if (
    empty($propertyId) || empty($propertyPrice) || empty($propertyBeds) || empty($propertyBath) || empty($propertySqm)
) {
    http_response_code(400);
    echo 'Missing required fields';
    exit;
}

if ($propertyImage) {
    $uploads_dir = '/Users/picotto/Documents/KEA/real-estate/EXAM/agent/images';
    $path = $_FILES['image']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $imageName = uniqid();
    $imagePath = "$uploads_dir/$imageName.$ext";
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
}


// update data.json
$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);

$jData->properties->$propertyId->id = $propertyId;
$jData->properties->$propertyId->price = $propertyPrice;
$jData->properties->$propertyId->beds = $propertyBeds;
$jData->properties->$propertyId->bath = $propertyBath;
$jData->properties->$propertyId->sqm = $propertySqm;
if ($propertyImage) {
    $jData->properties->$propertyId->imageUrl = "agent/images/$imageName.$ext";
}

$sjData = json_encode($jData, JSON_PRETTY_PRINT);
$success = file_put_contents(__DIR__ . '/../data/data.json', $sjData);

echo (json_encode($jData->properties->$propertyId));
