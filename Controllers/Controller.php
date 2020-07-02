<?php


class Controller extends Database
{
    use Messages;
    
    public static function CreateView($viewName)
    {
        require_once 'Views/' . $viewName . '.php';
    }
}