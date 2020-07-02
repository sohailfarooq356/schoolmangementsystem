<?php
require 'Routes.php';
require 'AdminRoutes.php';
require 'TecaherRoutes.php';
require 'StudentRoutes.php';

function __autoload($classname)
{
    if (file_exists('./classes/' . $classname . '.php')) {
        require_once './classes/' . $classname . '.php';
    } elseif (file_exists('./controllers/' . $classname . '.php')) {
        require_once './controllers/' . $classname . '.php';
    }

}