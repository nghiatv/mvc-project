<?php
if(!defined('PATH_SYSTEM')) die("Bad request");
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 5:41 CH
 */
require PATH_SYSTEM . "/core/FT_Controller.php";
class Base_Controller extends FT_Controller
{
    /**
     * Base_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }



    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->view->show();
    }
}