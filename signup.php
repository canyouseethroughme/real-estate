<?php

$active = 'signup';

require_once(__DIR__ . '/components/top.php');
?>

<div class="signUp">
    <div class="userSignUp">
        <h2>Be 1 step closer to your future home by creating an user account!</h2>
        <a href="user-signup.php"><button>Sign up as user</button></a>
    </div>
    <div class="agentSignUp">
        <h2>If you are an real estate agent, you can post properties that are on sale!</h2>
        <a href="agent-signup.php"><button>Sign up as agent</button></a>
    </div>
</div>


<?php
require_once(__DIR__ . '/components/bottom.php');
