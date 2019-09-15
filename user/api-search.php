<?php
$term = $_GET['search'];

$sjProperties = file_get_contents(__DIR__ . '/../data/data.json');
$jProperties = json_decode($sjProperties)->properties;

$matchingPropertyList = [];

foreach ($jProperties as $id => $property) {
    if ((strpos($property->zip, $term) !== false)) {
        $matchingPropertyList[] = $property;
    }
}

echo json_encode($matchingPropertyList);
