<?php



//VERIFICATION CONNEXION
function isConnected()
{
    return (bool)(isset($_SESSION['id']) && !empty($_SESSION['id']) && is_numeric($_SESSION['id']));
}

//FONCTION DE REDIRECTION VERS PHP
function pathPhp()
{
    return realpath(true) . 'php/';
}

//FONCTION DE REDIRECTION VERS VUES
function pathViews()
{
    return realpath(true) . 'views/';
}

//FONCTION DE REDIRECTION VERS CSS
function pathCss()
{
    return realpath(true) . 'css&js/';
}

//FONCTION DE REDIRECTION VERS INCLUDES
function pathIncludes()
{
    return realpath(true) . 'includes/';
}

//FONCTION DE REDIRECTION VERS INCLUDES
function pathImg()
{
    return realpath(true) . '/img/uploadImages/';
}


//VERIFICATION DE DATE
function isValid($date, $format = 'Y-m-d')
{
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
}
