<?php

/* Return Base Url for example => http://localhost */
function getBaseUrl()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return $protocol.'://'.$_SERVER['SERVER_NAME'].'/';
}

function asset($path)
{

    return getBaseUrl()."public/".$path;

}