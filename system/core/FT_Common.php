<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:32 CH
 */

if (!defined('PATH_SYSTEM')) die('Bad request');

function FT_load()
{
    $config = include_once PATH_APPLICATION . '/config/init.php';
    // Neu khong co controller truyen vao thi lay controller mac dinh
    $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];
    $controller = ucfirst(strtolower($controller)) . "_Controller";
    //    Tuong tu ta load action mac dinh

    $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];
    $action = strtolower($action) . "Action";

    //Load cac model mac dinh

    //load controller

    if (!file_exists(PATH_APPLICATION . "/controller/" . $controller . ".php"))
    {
        die("Controller not found");
    }

    require_once PATH_SYSTEM . "/core/FT_Controller.php";

    if (!file_exists(PATH_APPLICATION . "/core/Base_Controller.php"))
    {
        die('Base Controller not found!');
    }
    require_once PATH_APPLICATION . "/core/Base_Controller.php";

    require_once PATH_APPLICATION . "/controller/" . $controller . ".php";

    //Kiem tra xem co ton tai class khogn

    if (!class_exists($controller))
    {
        die("Class not found");
    }


    $controllerObj = new $controller();

    //Kiem tra xem cos method action khong?


    if (!method_exists($controller, $action)) {
        die("Method not found");
    }

    $controllerObj->{$action}();

}