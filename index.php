<?php
$homePage = 'homePage';
require_once(__DIR__ . '/components/top.php');
?>
<div id="home">
    <div class=homeSearch>
        <h3>Find homes <br>from all over the world!</h3>
        <form id="searchForm">
            <input type="text" name="search" id="txtSearch" placeholder="Search using ZIP code" maxlength="5">
            <button id="btnSearch" onclick="checkSearch()">Search</button>
        </form>
        <div id="results"></div>
    </div>
</div>

<?php
require_once(__DIR__ . '/components/bottom.php');
