<?php

$active = 'homes';

session_start();

require_once(__DIR__ . '/components/top.php');
?>


<div class="mapProperties">
    <div id="map"></div>
    <div class="properties">
        <?php
        $sjProperties = file_get_contents(__DIR__ . '/data/data.json');
        $jProperties = json_decode($sjProperties);

        foreach ($jProperties->properties as $id => $jProperty) {
            echo '
            <div class="propertyDiv">
                <img src="' . $jProperty->imageUrl . '">
                <div class="propertyRow">
                    <div>$' . $jProperty->price . '</div>
                    <div>' . $jProperty->beds . 'bds</div>
                    <div>' . $jProperty->bath . 'bth</div>
                    <div>' . $jProperty->sqm . 'sqm</div>
                    <div>' . $jProperty->zip . 'zip</div>
                </div>
                </div>
            ';
        }
        ?>

    </div>
</div>

<?php
require_once(__DIR__ . '/components/bottom.php');
