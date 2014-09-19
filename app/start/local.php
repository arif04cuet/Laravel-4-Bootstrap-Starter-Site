<?php

function pr($msg, $exit = false)
{
    echo '<pre>';
    print_r($msg);
    echo '</pre>';
    if ($exit)
        exit;
}

return array();