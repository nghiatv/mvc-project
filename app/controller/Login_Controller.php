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
        session_start();

        if (isset($_SESSION['username'])) {
            header("Location:http://localhost/mvc-project");
        } else {
            $this->view->load('login'); // load view

            unset($_SESSION['error'], $_SESSION['info']); // xoa cac bien gui loi

            if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

                // load cac thu vien can thiet
                $this->library->load('login');
                $check = $this->library->login;

                $flag = true;// tao co`
                if ($check->checkInput($_POST['username']) !== true) { // kiem tra thong tin cua user
                    $_SESSION['error']['username'] = $check->checkInput($_POST['username']);
                    $flag = false;
                }

                if ($check->checkInput($_POST['password']) !== true) { // kiem tra thong tin cua password

                    $_SESSION['error']['password'] = $check->checkInput($_POST['password']);
                    $flag = false;
                }
                if (!$flag) { // kiem tra co`
                    $_SESSION['info']['username'] = $_POST['username'];
                    $_SESSION['info']['password'] = $_POST['password'];
                    header("Location:http://localhost/mvc-project/login");
                } else {
                    $this->model->load('login');

                    if ($this->model->login->checkUser($_POST['username'], $_POST['password'])) {

                        unset($_SESSION['error']);
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = $_POST['username'];
                        header("Location:http://localhost/mvc-project");
                    } else {

                        // tra ve thong tin input va chuyen trang
                        $_SESSION['info']['username'] = $_POST['username'];
                        $_SESSION['info']['password'] = $_POST['password'];
                        $_SESSION['error']['mes'] = "Tài khoản hoặc mật khẩu không đúng!";
                        header("Location:http://localhost/mvc-project/login");
                    }
                }


            }
        }
    }

    public function logoutAction()
    {
        session_start();
        unset($_SESSION['username'], $_SESSION['valid'], $_SESSION['timeout']);

        header("Location:http://localhost/mvc-project/login");
    }

}