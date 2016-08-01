<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 7:39 CH
 */

if (!defined('PATH_SYSTEM')) die("Bad request");


class Login_Controller extends Base_Controller
{
    public function indexAction()
    {
        $this->view->load('login');
        $this->model->load('login');

        if(isset($_POST['username']) && isset($_POST['password'])){
              if($this->model->login->checkUser($_POST['username'],$_POST['password'])){
                  session_start();

                  $_SESSION['name'] = "ahihi";

                  header('Location:http://localhost/mvc-project');
              }
        }
    }
    public function verifyAction(){
        $this->library->load('login');

    }


}