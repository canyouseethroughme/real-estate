<?php

function sendErrorMessage($errorMessage, $lineErrorMessage)
{
    echo '{"status: 0, "message": ' . $errorMessage . ', "line": ' . $lineErrorMessage . '}';
}
