<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 7/29/16
 * Time: 9:08 AM
 */
class Application
{
    private $url_controller = null;
    private $url_action = null;
    private $url_param = array();

    /**
     * Application constructor.
     * @param $url_controller
     */
    public function __construct()
    {

        $config = include_once PATH_APPLICATION . '/config/init.php';
        $this->splitUrl();

        // Neu ton tai url controller thi load controlller

        $controller = empty($this->url_controller) ? $config['default_controller'] : $this->url_controller;
        $controller = ucfirst(strtolower($controller)) . "_Controller";

        $action = empty($this->url_action) ? $config['default_action'] : $this->url_action;
        $action = strtolower($action)."Action";


        if (!file_exists(PATH_APPLICATION . "/controller/" . $controller . ".php")) {
            die("Controller Not Found");
        }

        require PATH_SYSTEM . "/core/FT_Controller.php";

        if (!file_exists(PATH_APPLICATION . "/core/Base_Controller.php")) {
            die("Base Controller Not Found");
        }

        require PATH_APPLICATION . "/core/Base_Controller.php";


        require PATH_APPLICATION . "/controller/" . $controller . ".php";

        $controllerObj = new $controller();

        if (!class_exists($controller)) {
            die("Controller Not Found");
        }

        if (method_exists($controller, $action)) {
            if (!empty($this->url_param)) {
                call_user_func_array(array($controller, $action), $this->url_param);
            } else {
                $controllerObj->{$action}();
            }
        }


    }

    function splitURL()
    {
        // splitURL



        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);


            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);

            $this->url_param = array_values($url);


        }
        else{
            $this->url_controller = null;
            $this->url_action = null;
        }
    }





}