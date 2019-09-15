<?php
$homePage = 'homePage';
require_once(__DIR__ . '/components/top.php');
?>
<div id="home">
    <h3>Search homes from all over the world</h3>
    <form id="frmSearch">
        <input type="text" name="search" id="txtSearch" placeholder="search" maxlength="5">
    </form>
    <div id="results"></div>
    <button onclick="checkSearch()">Search</button>
</div>

<?php
require_once(__DIR__ . '/components/bottom.php');
