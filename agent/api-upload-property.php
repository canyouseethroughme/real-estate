<?php

$propertyPrice = $_POST['price'];
$propertyBeds = $_POST['bedrooms'];
$propertyBath = $_POST['bathrooms'];
$propertySqm = $_POST['sqm'];
$propertyImage = $_FILES['image'];

if (
    empty($propertyPrice) || empty($propertyBeds) || empty($propertyBath) || empty($propertySqm) ||
    empty($propertyImage)
) {
    http_response_code(400);
    echo 'Missing required fields';
    exit;
}


$uploads_dir = '/Users/picotto/Documents/KEA/real-estate/EXAM/agent/images';
$path = $_FILES['image']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$imageName = uniqid();
$imagePath = "$uploads_dir/$imageName.$ext";
move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);


$propertyId = uniqid();

$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);

$property = new stdClass();
$property->id = $propertyId;
$property->price = $propertyPrice;
$property->beds = $propertyBeds;
$property->bath = $propertyBath;
$property->sqm = $propertySqm;
$property->imageUrl = "agent/images/$imageName.$ext";

$jData->properties->$propertyId = $property;


$sjData = json_encode($jData, JSON_PRETTY_PRINT);
$success = file_put_contents(__DIR__ . '/../data/data.json', $sjData);

echo (json_encode($property));
