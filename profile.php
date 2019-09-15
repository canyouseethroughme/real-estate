<?php

$active = 'signup';

require_once(__DIR__ . '/components/top.php');
?>




<?php
session_start();


if ($_SESSION['jUser']->email) { ?>
    <div class="containerProfile">
        <div class="profileDiv">
            <h2 style="margin-bottom: 20px;">Welcome, <?= $_SESSION['jUser']->name ?>.</h2>

            <h3 style="margin-bottom: 10px">
                If you want to edit your profile, click on the button bellow.
            </h3>
            <a href="edit-profile.php"><Button>Edit profile</Button></a>
        </div>
    </div>






<?php } else {
    header('Location: ./login.php');
}
?>

<?php
if ($_SESSION['jUser']->isAgent) :
    ?>
    <div id="propertyForm" style="margin-bottom: 50px;">
        <form id="frmLogin">
            <h2 class="uploadPropsLabel"> Upload properties</h2>
            <h3 style="margin-bottom: 15px;">Use the form bellow to upload properties.</h3>
            <label for=" priceInput">Price</label>
            <input name="price" id="priceInput" type="text" placeholder="Property price" maxlength="9" data-type="integer" data-min="50000" data-max="999999999">
            <label for="bedsInput">Bedrooms</label>
            <input name="bedrooms" id="bedsInput" type="text" placeholder="Property no. of bedrooms" maxlength="3" data-type="integer" data-min="1" data-max="15">
            <label for="bthInput">Bathrooms</label>
            <input name="bathrooms" id="bthInput" type="text" placeholder="Property no. of bathrooms" maxlength="3" data-type="integer" data-min="1" data-max="10">
            <label for="sqmInput">Square meters</label>
            <input name="sqm" id="sqmInput" type="text" placeholder="Property sqm" maxlength="20" data-type="integer" data-min="40" data-max="9999">
            <label for="zipInput">ZIP code</label>
            <input name="zip" id="zipInput" type="text" placeholder="Property ZIP code" maxlength="5" data-type="integer" data-min="3" data-max="99999">
            <label for="imageInput"></label>
            <input name="image" type="file" id="imageInput">
            <button type="button" id="btnAddProperty">Upload property</button>

        </form>
    </div>
    <h2 class="uploadPropsLabel" style="text-align:center;">Update properties</h2>
    <div id="properties">
        <?php
            $sjData = file_get_contents(__DIR__ . '/data/data.json');
            $jData = json_decode($sjData);
            $jDataProperties = $jData->properties;

            foreach ($jDataProperties as $propertyId => $property) {
                ?>


            <div id="<?= $propertyId ?>" class="newProperty">
                <img src="<?= $property->imageUrl ?>">
                <input name="image" type="file">
                <label>Price</label>
                <input data-type="propertyPrice" type="text" value="<?= $property->price ?>">
                <label>Bedrooms</label>
                <input data-type="propertyBeds" type="text" value="<?= $property->beds ?>">
                <label>Bathrooms</label>
                <input data-type="propertyBth" type="text" value="<?= $property->bath ?>">
                <label>Square meters</label>
                <input data-type="propertySqm" type="text" value="<?= $property->sqm ?>">
                <label>ZIP code</label>
                <input data-type="propertyZip" type="text" value="<?= $property->zip ?>">
                <button type="button" class="edit-property-btn" data-target="<?= $propertyId ?>">Update property</button>
                <button type="button" class="delete-property-btn" data-target="<?= $propertyId ?>">Delete property</button>
            </div>


        <?php } ?>

    </div>

<?php
endif;
?>

<?php
require_once(__DIR__ . '/components/bottom.php');
