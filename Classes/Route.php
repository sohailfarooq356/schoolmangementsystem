<?php


/**
 * Class Route
 * Define routes for every url
 */
class Route
{
    public static $validRoutes = array();

    /**
     * set routes for every URL
     * @param $route = route url name
     * @param $function = to load for route
     */
    public static function set($route, $function)
    {
        self::$validRoutes[] = $route;
        //echo $_GET['url'];
        //var_dump($_GET);
        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}