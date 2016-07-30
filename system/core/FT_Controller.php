<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:32 CH
 */


if (!defined("PATH_SYSTEM")) die("Bad Request");


class FT_Controller
{
    protected $view;// Doi tuong view
    protected $model; // doi tuong model
    protected $library;// doi tuong library
    protected $helper; // doi tuong helper
    protected $config; // doi tuong config
//    protected $param = array();

    public function __construct() // ham khoi tao
    {
//        $this->param = $param;

        require_once PATH_SYSTEM . "/core/loader/FT_Config_Loader.php";
        $this->config = new FT_Config_Loader();
        $this->config->load('config');
        //  load library loader
        require_once PATH_SYSTEM . "/core/loader/FT_Library_Loader.php";
        $this->library = new FT_Library_Loader();
        //  load helper loader

        require PATH_SYSTEM . "/core/loader/FT_Helper_Loader.php";
        $this->helper = new FT_Helper_Loader();

        //load view loader
        require PATH_SYSTEM . "/core/loader/FT_View_Loader.php";
        $this->view = new FT_View_Loader();

        require PATH_SYSTEM. "/core/loader/FT_Model_Loader.php";
        $this->model = new FT_Model_Loader();
    }



}