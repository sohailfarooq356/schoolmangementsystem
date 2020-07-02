<?php


/**
 * Class Controller
 */
class Controller extends Database
{
    use Messages;

    /**
     * creates a view for a requested URL
     * @param $viewName = name of View to display
     */
    public static function CreateView($viewName)
    {
        require_once 'Views/' . $viewName . '.php';
    }
}