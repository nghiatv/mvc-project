<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 7:39 CH
 */

if(!defined('PATH_SYSTEM')) die("Bad request");


class Login_Controller extends Base_Controller{
    public function indexAction(){
        $this->view->load('login');
    }
}