<?php

$active = 'homes';

session_start();

require_once(__DIR__ . '/components/top.php');
?>


<div class="mapProperties">
    <div id="map"></div>
    <div class="properties"></div>
</div>

<?php
require_once(__DIR__ . '/components/bottom.php');
